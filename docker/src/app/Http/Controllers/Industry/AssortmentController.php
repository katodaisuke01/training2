<?php

namespace App\Http\Controllers\Industry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessPacking;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Package;
use App\Models\Stock;
use App\Models\OrderPackage;
use App\Models\OrderGroup;
use App\Models\OrderStock;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use App\Models\MCategory;
use App\Models\DeliveryUser;
use App\Models\MFishCategory;
use App\Models\MBusiness;
use App\Models\MProcess;
use App\Models\MUnit;
use App\Http\Requests\StoreWorkFlow;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use Storage;
use DB;

class AssortmentController extends Controller
{
    public function workflow(Request $request)
    {
        $worker_check = Order::where('simultaneous_order_code', $request->get('order'))->first();
        $worker_check['user_id'] = auth()->user()->id;
        $worker_check->save();

        // 作業ログの作成
        $check_log = WorkLog::where('order_simultaneous_order_code', $request->get('order'))
            ->where('user_id', '!=', auth()->user()->id)
            ->whereNull('end_at')
            ->first();

        $dt = Carbon::now();
        if (!empty($check_log)) {
            $check_log->end_at = $dt->format('Y-m-d H:i:s');
            $check_log->update();
        }

        $work_log = WorkLog::create([
            'user_id' => \Auth::user()->id,
            'order_simultaneous_order_code' => $request->get('order'),
            'start_at' => $dt->format('Y-m-d H:i:s'),
            'end_at' => null
        ]);

        //　既に箱に入っている商品
        $pack_orders = Order::query()
            ->select(['*', 'order_packages.id'])
            // ->where('order_product_id', $request->get('product_id'))
            ->where('order_business_group_id', $request->get('businessGroup'))
            ->whereNotNull('order_package_id')
            ->where(function ($query) {
                $query->where('shipping_status', Order::TYPE_PACKING); // 一時保存中
                // $query->orWhere('shipping_status', Order::TYPE_PROCESS_DONE);　//梱包済み
            })
            ->leftjoin('order_packages', 'order_packages.id', '=', 'orders.order_package_id')
            ->get()
            ->groupBy('order_package_id');

        // 作業中の商品のグループ
        $order_group = Order::query()
            ->where('simultaneous_order_code', $request->get('order'))
            ->get();

        // 作業中の商品
        $order = Order::query()
            ->where('simultaneous_order_code', $request->get('order'))
            ->where('page_number', $request->get('page'))
            ->whereNull('package_id')
            ->whereNull('order_package_id')
            ->first();

        // 梱包済みの商品
        $worked_order = Order::query()
            ->where('simultaneous_order_code', $request->get('order'))
            ->where('page_number', $request->get('page'))
            ->first();

        // 計量許容値(%)
        $tolerance = $order_group[0]->order_product->tolerance / 100;
        // 計量許容値(グラム)
        $permit_tolerance = $order_group[0]->order_product->base_weight * $tolerance;

        // 梱包完了個数
        $complete_order = 0;
        foreach ($order_group as $val) {
            if ($val->shipping_status == Order::TYPE_PACKING ||
                $val->shipping_status == Order::TYPE_PROCESS_DONE ||
                $val->shipping_status == Order::TYPE_COMPLETE
            ) {
                $complete_order += 1;
            }
        }

        return view('market/home/workflow', [
            'pack_orders' => $pack_orders,
            'order' => $order_group,
            'target_order' => $order,
            'worked_order' => $worked_order,
            'permit_tolerance' => $permit_tolerance,
            'complete_order' => $complete_order,
        ]);
    }

    public function workflowStore(StoreWorkFlow $request)
    {
        if (!is_numeric($request->get('qr_code'))) {
            $qr_numeric = mb_convert_kana($request->get('qr_code'), 'n');
        } else {
            $qr_numeric = $request->get('qr_code');
        }

        // 作業一時終了
        if ($request->get('pending_task') == 'on') {
            if ($request->get('new_packing_target')) {
                $new_packs = Order::find($request->get('new_packing_target'));
                $new_packs->weight = null;
                $new_packs->image_path = null;
                $new_packs->update();
            }
            // 作業中のユーザーを削除
            $worker_check = Order::where('user_id', auth()->user()->id)->first();
            if ($worker_check) {
                $worker_check['user_id'] = null;
                $worker_check->save();
            }
            // 作業ログ
            $check_log = WorkLog::where('user_id', auth()->user()->id)->whereNull('end_at')->first();
            $dt = Carbon::now();
            if ($check_log) {
                $check_log->end_at = $dt->format('Y-m-d H:i:s');
                $check_log->update();
            }
            return redirect()
                ->to(route('industry.market.detail', [
                    'business_group' => OrderBusinessGroup::find($request->get('business_group_id'))
                ]))
                ->with('flash_message', '作業を一時終了しました。');
        }

        $worker_check = Order::where('simultaneous_order_code', $request->get('order_group_id'))->first();
        if ($worker_check['user_id'] != auth()->user()->id) {
            $user_name = $worker_check->getWorkingUserAttribute();
            $request->session()->flash('booking_work', $user_name);
            return redirect()
                ->to(route('industry.market.detail', [
                    'business_group' => OrderBusinessGroup::find($request->get('business_group_id'))
                ]))
                ->with('flash_message', '他の作業者が作業中です。');
        }

        // 既存パッケージID
        if ($qr_numeric) {
            $qr_validator = Package::where('pack_code', $qr_numeric)->first();
            $id = $qr_validator->pack_status ?? null;


            if ($id == 2) {
                return redirect()
                    ->to(route('industry.market.workflow', [
                        'product_id' => $request->get('order_product_id'),
                        'order' => $request->get('order_group_id'),
                        'businessGroup' => $request->get('business_group_id'),
                        'page' => $request->get('page_id'),
                        'qr' => 'booking'
                    ]))
                    ->with('flash_message', 'QRコードは既に使用済みです。');
            }
        }

        DB::beginTransaction();
        try {
            if ($request->get('add_new_order_package') == 'on') {
                $order_package = new OrderPackage();
                $order_package->save();

                // 一時保存処理
                if (!empty($request->get('new_packing_target'))) {
                    // 商品
                    $order = Order::find($request->get('new_packing_target'));
                    $order->fill([
                        'order_package_id' => $order_package->id,
                        'shipping_status' => 1
                    ])->save();

                }

                if (!empty($qr_numeric)) {
                    $package = Package::where('pack_code', $qr_numeric)->first();
                    $order_package->fill(['package_id' => $package->id])->save();
                    $pack_order = Order::where('order_package_id', $order_package->id)->get();
                    $business = Order::where('order_package_id', $order_package->id)->first();

                    foreach ($pack_order as $value) {
                        $value->fill([
                            'package_id' => $package->id,
                            'shipping_status' => Order::TYPE_PROCESS_DONE,
                        ])->save();

                        if ($value === end($pack_order)) {
                            // 最後
                            $m_business_id = data_get($value, 'order_business_group.m_business_id');
                        }
                    }
                    $package->pack_status = Package::TYPE_CONFIRMED;
                    $package->m_business_id = $business->m_business_id;
                    $package->shipping_date = date('Y-m-d', strtotime($business->shipping_date));
                    $package->update();
                }

            } else {
                // 一時保存テーブル作成・検索
                if ($request->get('order_package') == 'new') {
                    $order_package = new OrderPackage();
                    $order_package->save();
                } elseif (!empty($request->get('order_package'))) {
                    $order_package = OrderPackage::find($request->get('order_package'));
                }

                // 一時保存処理
                if (!empty($request->get('new_packing_target'))) {
                    // 商品
                    $order = Order::find($request->get('new_packing_target'));
                    $order->fill([
                        'order_package_id' => $order_package->id,
                        'shipping_status' => 1
                    ])->save();

                }

                // パッキング処理
                if (!empty($qr_numeric)) {
                    $package = Package::where('pack_code', $qr_numeric)->first();
                    $order_package->fill(['package_id' => $package->id])->save();
                    $pack_order = Order::where('order_package_id', $order_package->id)->get();
                    $business = Order::where('order_package_id', $order_package->id)->first();

                    foreach ($pack_order as $value) {
                        $value->fill([
                            'package_id' => $package->id,
                            'shipping_status' => Order::TYPE_PROCESS_DONE,
                        ])->save();
                    }

                    $package->pack_status = Package::TYPE_CONFIRMED;
                    $package->m_business_id = $business->m_business_id;
                    $package->shipping_date = date('Y-m-d', strtotime($business->shipping_date));
                    $package->update();
                }
            }
            DB::commit();

            $contentOfOrder = Order::where('simultaneous_order_code', $request->get('order_group_id'))
                ->where(function ($query) {
                    $query->where('shipping_status', 0);
                    $query->orWhere('shipping_status', 1);
                })
                ->where('page_number', '>=', $request->get('page_id') + 1)
                ->count();

            // 作業完了
            if ($request->get('complete_task') == 'on') {
                // 作業中のユーザーを削除
                $worker_check = Order::where('user_id', auth()->user()->id)->first();
                if ($worker_check) {
                    $worker_check['user_id'] = null;
                    $worker_check->save();
                }
                // 作業ログ
                $check_log = WorkLog::where('user_id', auth()->user()->id)->whereNull('end_at')->first();
                $dt = Carbon::now();
                if ($check_log) {
                    $check_log->end_at = $dt->format('Y-m-d H:i:s');
                    $check_log->update();
                }

                return redirect()
                    ->to(route('industry.market.detail', [
                        'business_group' => OrderBusinessGroup::find($request->get('business_group_id'))
                    ]))
                    ->with('flash_message', '作業を完了しました。');
            }

            if (!empty($contentOfOrder) && $contentOfOrder > 0) { // 商品グループに未処理の商品がある場合
                return redirect()
                    ->to(route('industry.market.workflow', [
                        'product_id' => $request->get('order_product_id'),
                        'order' => $request->get('order_group_id'),
                        'businessGroup' => $request->get('business_group_id'),
                        'page' => $request->get('page_id') + 1
                    ]))
                    ->with('flash_message', '梱包しました。');

            } else { // 発注個数が一つ、もしくは全て処理済みの場合
                // 作業中のユーザーを削除
                $worker_check = Order::where('user_id', auth()->user()->id)->first();
                if ($worker_check) {
                    $worker_check['user_id'] = null;
                    $worker_check->save();
                }
                // 作業ログ
                $check_log = WorkLog::where('user_id', auth()->user()->id)->whereNull('end_at')->first();
                $dt = Carbon::now();
                if ($check_log) {
                    $check_log->end_at = $dt->format('Y-m-d H:i:s');
                    $check_log->update();
                }

                return redirect()
                    ->to(route('industry.market.detail', [
                        'business_group' => OrderBusinessGroup::find($request->get('business_group_id'))
                    ]))
                    ->with('flash_message', '登録しました。');

            }

        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->with('flash_message', '読み取りに失敗しました。');
        }
    }

    public function imageStore(Request $request)
    {
        $imageData = base64_decode($request->get('image_path'));

        // 対象の注文商品
        $order = Order::find($request->get('order_id'));

        $request->offsetUnset('order_id');
        $params = $request->all();

        if (isset($params['image_path'])) {
            $fileName = \Str::random(40) . '.png';
            $path = 'orders/' . $fileName;
            Storage::disk('s3')->put($path, $imageData);
            $params['image_path'] = $path;
            $order->fill($params)->save();
        }
    }

    public function weightStore(Request $request)
    {
        if (!empty($request->get('weight')) || $request->get('weight') != null || $request->get('weight') != '') {
            // 対象の注文商品
            $order = Order::find($request->get('order_id'));
            $request->offsetUnset('order_id');
            $params = $request->all();
            $order->fill($params)->save();
            return response()->json($params);
        }
    }

    public function deleteProduct(Request $request)
    {
        $order = Order::where('page_number', $request->get('delete_page_id'))
            ->where('simultaneous_order_code', $request->get('group_id'))
            ->first();
        $judge = Order::where('page_number', '>', $request->get('delete_page_id'))
            ->where('simultaneous_order_code', $request->get('group_id'))
            ->count();
        $target_orders = Order::where('page_number', '>', $request->get('delete_page_id'))
            ->where('simultaneous_order_code', $request->get('group_id'))
            ->get();
        $array_total = Order::where('simultaneous_order_code', $request->get('group_id'))->count();

        DB::beginTransaction();
        try {
            if ($judge != 0) {
                // ページNoと一時保存履歴をクリア
                $order->page_number = null;
                $order->order_package_id = null;
                $order->update();
                // ページNoの張り替え
                foreach ($target_orders as $target) {
                    $target->page_number = ($target->page_number) - 1;
                    $target->update();

                    if (($array_total - 1) == $target->page_number) {
                        $last_page_num = $target->page_number;
                        // 空のorderにページNo再振り分け
                        $order->page_number = $last_page_num + 1;
                        $order->order_package_id = null;
                        $order->shipping_status = 0;
                        $order->image_path = null;
                        $order->weight = null;
                        $order->update();
                    }
                }
            } else { // 最後のページだったら
                $order->order_package_id = null;
                $order->shipping_status = 0;
                $order->image_path = null;
                $order->weight = null;
                $order->update();
            }

            DB::commit();

            $page = Order::where('simultaneous_order_code', $request->get('order_group_id'))
                ->whereNotNull('order_package_id')
                ->count();

            if (!empty($request->get('xhr_post'))) {
                return response()->json([
                    'product_id' => $request->get('order_product_id'),
                    'order' => $request->get('order_group_id'),
                    'businessGroup' => $request->get('business_group_id'),
                    'page' => $page + 1]);
            }
            return redirect()
                ->to(route('industry.market.workflow', [
                    'product_id' => $request->get('order_product_id'),
                    'order' => $request->get('order_group_id'),
                    'businessGroup' => $request->get('business_group_id'),
                    'page' => $page + 1,
                ]))
                ->with('flash_message', '梱包済みの箱から１件削除しました。');

        } catch (\Exception $e) {
            DB::rollback();
            return back()
                ->withInput()
                ->with('flash_message', '削除に失敗しました。');
        }
    }

    public function addProduct(Request $request)
    {
        $order = Order::where('simultaneous_order_code', $request->get('product_code'))->first();
        $order_count = Order::where('simultaneous_order_code', $request->get('product_code'))->count();
        if ($order) {
            // 追加注文を作成
            Order::create([
                'm_business_id' => $order->m_business_id,
                'order_product_id' => $order->order_product_id,
                'client_id' => $order->client_id,
                'delivery_partnar_id' => $order->delivery_partnar_id,
                'quantity' => $order->quantity,
                'shipping_date' => $order->shipping_date,
                'simultaneous_order_code' => $order->simultaneous_order_code,
                'shipping_status' => 0,
                'page_number' => $order_count + 1,
                'additional_order_flg_2' => 1,
                'order_group_id' => $order->order_group_id,
                'order_business_group_id' => $order->order_business_group_id,
            ]);
        }

        // グループの合計注文数を更新
        $order_group = OrderGroup::where('id', $order->order_group_id)->first();
        $order_group->additional_total_count = $order_group->additional_total_count + 1;
        $order_group->update();

        // 事業者グループの合計注文数を更新
        $order_business_group = OrderBusinessGroup::where('id', $order->order_business_group_id)->first();
        $order_business_group->additional_total_count = $order_business_group->additional_total_count + 1;
        $order_business_group->update();

        return;

    }

    public function resetCount(Request $request)
    {
        $orders = Order::where('simultaneous_order_code', $request->get('product_code'))
            ->where('additional_order_flg_2', 1)
            ->get();

        $sub_count = Order::where('simultaneous_order_code', $request->get('product_code'))
            ->where('additional_order_flg_2', 1)->count();

        $order = Order::where('simultaneous_order_code', $request->get('product_code'))->first();

        // グループの合計注文数を更新
        $order_group = OrderGroup::where('id', $order->order_group_id)->first();
        $order_group->additional_total_count = $order_group->additional_total_count - $sub_count;
        $order_group->update();

        // 事業者グループの合計注文数を更新
        $order_business_group = OrderBusinessGroup::where('id', $order->order_business_group_id)->first();
        $order_business_group->additional_total_count = $order_business_group->additional_total_count - $sub_count;
        $order_business_group->update();

        foreach ($orders as $order) {
            $order->delete();
        }
        return;

    }

    private function generateCode($length = 6)
    {
        $max = pow(10, $length) - 1;                    // コードの最大値算出
        $rand = random_int(0, $max);                    // 乱数生成
        $code = sprintf('%0' . $length . 'd', $rand);     // 乱数の頭0埋め

        return $code;
    }

    public function packing()
    {
        $user = Auth::user();
        // 注文された順に取得
        $orders = Order::select('orders.*')
            ->join('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->where('orders.shipping_date', date('Y-m-d') . ' 00:00:00')
            ->where('orders.shipping_status', Order::TYPE_NOT_START)
            ->where('order_products.industry_group_id', '=', $user->industry_group_id)
            ->get();

        // 紐付けをする箱
        $package = Package::where('pack_status', Package::TYPE_NOT_CONFIRMED)
            ->orderBy('id', 'asc')
            ->first();

        return view('market/home/packing', [
            'orders' => $orders,
            'package' => $package,
        ]);
    }

    public function getPackagelabel(Request $request)
    {
        $business = MBusiness::find($request->get('m_business_id'));
        $params = [];
        $params['business_id'] = data_get($business, 'id');
        $params['business_name'] = data_get($business, 'name');
        $params['address'] = data_get($business, 'delivery_address');
        $params['tel'] = data_get($business, 'tel');
        $params['name'] = data_get($business, 'responsible_name');

        return response()->json($params);
    }

    public function store(Request $request, Package $package)
    {
        ProcessPacking::dispatch($request,$package)->afterResponse();

        return redirect()->route('industry.market.packing')->with('梱包しました。');
    }

    public function packageImageStore(Request $request)
    {
        $imageData = base64_decode($request->get('image_path'));

        // 対象の注文商品
        $package = Package::find($request->get('package_id'));

        $request->offsetUnset('package_id');
        $params = $request->all();

        if (isset($params['image_path'])) {
            $fileName = \Str::random(40) . '.png';
            $path = 'packages/' . $fileName;
            Storage::disk('s3')->put($path, $imageData);
            $params['image_path'] = $path;
            $package->fill($params)->save();
        }

        return response()->json($params);
    }

    public function box()
    {
        $packages = Package::where('shipping_date', date('Y-m-d'))->get();

        return view('market.home.box', [
            'packages' => $packages
        ]);
    }

    public function temporaryWeightStore(Request $request)
    {
        DB::beginTransaction();
        try {
            // 重量登録
            foreach ($request->get('package') as $k => $v) {
                $package = package::find($k);
                $package->temporary_weight = $v['temporary_weight'];
                $package->update();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '失敗しました。');
        }
        DB::commit();


        return redirect()
            ->route('industry.market.box')
            ->with('登録しました。');
    }
}
