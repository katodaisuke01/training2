<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $day = new Carbon('today');
        $today = $day->format('Y/m/d');
        $start_line = $day->format('Y-m-d H:i:s');
        $end_line = $day->addDay()->subSecond()->format('Y-m-d H:i:s');

        // 日付ソート
        if (!empty($request->get('select_date'))) {
            $select_date = \Carbon::parse($request->get('select_date'));
            $start_line = $select_date->format('Y-m-d H:i:s');
            $end_line = $select_date->addDay()->subSecond()->format('Y-m-d H:i:s');
        }

        $order_business_groups = OrderBusinessGroup::with('orders.order_product:id,title', 'm_business')
            ->where('industry_group_id', $user->industry_group_id)
            ->where('total_quantity', '>', 0)
            ->whereBetween('shipping_date', [$start_line, $end_line])
            ->sortByDates($request->get('sort_created_at'), $request->get('sort_shipping_date'))
            ->get();

        return view('market/management/order/index', [
            'today' => $today,
            'order_business_groups' => $order_business_groups,
        ]);
    }

    public function detail(Request $request, OrderBusinessGroup $business_group)
    {
        $business_group->load('orders');

        // 値引き依頼商品
        $request_orders = Order::query()
            ->where('order_business_group_id', $business_group->id)
            ->whereNull('deleted_at')
            ->whereNotNull('limit_price')
            ->where('approval_flg', '!=', 1)
            ->groupBy('simultaneous_order_code')
            ->get();

        //　既に箱に入っている商品
        $pack_orders = Order::query()
            ->select(['*', 'order_packages.id'])
            ->where('order_business_group_id', $business_group->id)
            ->whereNotNull('order_package_id')
            ->whereNull('deleted_at')
            ->leftjoin('order_packages', 'order_packages.id', '=', 'orders.order_package_id')
            ->get()
            ->groupBy('order_package_id');

        return view('market/management/order/detail', [
            'business_group' => $business_group,
            'request_orders' => $request_orders,
            'pack_orders' => $pack_orders,
        ]);
    }

    public function workList(Request $request)
    {
        $user = Auth::user();
        $work_logs = WorkLog::select(['work_logs.*', 'users.last_name', 'users.first_name'])
            ->where('user_id', $user->id)
            ->where('order_simultaneous_order_code', $request->get('order_code'))
            ->leftJoin('users', 'users.id', '=', 'user_id')
            ->orderBy('end_at', 'asc')
            ->get();

        return response()->json($work_logs);
    }

    public function document(Request $request)
    {
        $business_group = OrderBusinessGroup::find($request->get('businessGroup'));
        $orders = Order::where('m_business_id', $business_group->m_business_id)
            ->where('shipping_status', Order::TYPE_PROCESS_DONE)
            ->where('shipping_date', $business_group->shipping_date);

        return view('market/management/order/document', [
            'business_group' => $business_group,
            'orders' => $orders->get(),
            'packages' => $orders->groupBy('package_id')->select('package_id')->get(),

        ]);
    }

    public function update(Request $request)
    {
        for ($i = 0; $i <= $request->get('check_last'); $i++) {
            // 強制的に処理済みにする
            $need = 'status_check' . $i;
            if (!empty($request->get($need))) {
                $order = Order::where('simultaneous_order_code', $request->get($need))->get();

                foreach ($order as $val) {
                    $val->shipping_status = Order::TYPE_PROCESS_DONE;
                    $val->update();
                }
            }
        }

        return redirect()->to(route('admin.order.detail', ['businessGroup' => $request->get('businessGroup')]))
            ->with('flash_message', 'ステータスを変更しました。');
    }

    public function deleteProduct(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where('simultaneous_order_code', $request->get('group_id'))
            ->whereHas('order_product', function ($query) use ($user) {
                $query->where('industry_group_id', $user->industry_group_id);
            })->get();
        $order = $orders
            ->where('page_number', $request->get('delete_page_id'))
            ->first();
        $target_orders = $orders->where('page_number', '>', $request->get('delete_page_id'));

        DB::beginTransaction();

        try {
            if (isset($target_orders)) {
                // ページNoと一時保存履歴をクリア
                $order->page_number = null;
                $order->order_package_id = null;
                if (!empty($request->get('package_id'))) {
                    $order->package_id = null;
                }
                $order->update();
                // ページNoの張り替え
                foreach ($target_orders as $target) {
                    $target->page_number = ($target->page_number) - 1;
                    $target->update();

                    if (($orders->count() - 1) == $target->page_number) {
                        $last_page_num = $target->page_number;
                        // 空のorderにページNo再振り分け
                        $order->page_number = $last_page_num + 1;
                        $order->order_package_id = null;
                        $order->shipping_status = 0;
                        $order->image_path = null;
                        $order->weight = null;
                        if (!empty($request->get('package_id'))) {
                            $order->package_id = null;
                        }
                        $order->update();
                    }
                }
            } else { // 最後のページだったら
                $order->order_package_id = null;
                $order->shipping_status = 0;
                $order->image_path = null;
                $order->weight = null;
                if (!empty($request->get('package_id'))) {
                    $order->package_id = null;
                }
                $order->update();
            }

            DB::commit();

            if (!empty($request->get('xhr_post'))) {
                return response()->json([
                    'businessGroup' => $request->get('business_group_id')]);
            }
            return redirect()
                ->to(route('admin.order.detail', [
                    'businessGroup' => $request->get('business_group_id')
                ]))
                ->with('flash_message', '梱包済みの箱から１件削除しました。');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->with('flash_message', '削除に失敗しました。');
        }
    }

    public function itemList(Request $request, $package)
    {
        $user = Auth::user();
        $orders = Order::query()
            ->select('*')
            ->whereHas('order_product', function ($query) use ($user) {
                $query->where('industry_group_id', $user->industry_group_id);
            })
            ->where('package_id', $package)
            ->groupBy('simultaneous_order_code')
            ->get();

        return view('market/management/order/itemList', [
            'orders' => $orders,
        ]);
    }

    public function itemDetail($detail)
    {
        $order = Order::find($detail);

        return view('market/management/order/itemDetail', [
            'order' => $order
        ]);
    }

    public function scheduleTimeUpdate(Request $request)
    {
        $request->offsetUnset('_token');
        if (!empty($request->get('select_date'))) {
            $back_url = route('admin.order.index', ['select_date' => $request->get('select_date')]);
        } else {
            $back_url = route('admin.order.index');
        }

        $request->offsetUnset('select_date');
        $group_array = $request->all();

        if ($group_array) {
            foreach ($group_array as $key => $_time) {
                $order_group = OrderBusinessGroup::where('id', $key)->first();
                $time = str_replace([' '], '', $_time);
                $order_group->shipping_schedule_time = $time;
                $order_group->update();
            }
        }
        return redirect()->to($back_url)->with('flash_message', '更新しました。');
    }

    public function scheduleTimeAllUpdate(Request $request)
    {
        $back_url = route('admin.order.index');
        $order_business_groups = OrderBusinessGroup::query()->where('total_quantity', '>', 0);

        $day = new Carbon('today');
        $start_line = $day->format('Y-m-d H:i:s');
        $end_line = $day->addDay()->subSecond()->format('Y-m-d H:i:s');

        // 日付ソート
        if (!empty($request->get('select_date'))) {
            $back_url = route('admin.order.index', ['select_date' => $request->get('select_date')]);
            $select_date = \Carbon::parse($request->get('select_date'));
            $start_line = $select_date->format('Y-m-d H:i:s');
            $end_line = $select_date->addDay(1)->subSecond(1)->format('Y-m-d H:i:s');
        }
        $order_business_groups->whereBetween('shipping_date', [$start_line, $end_line]);

        $time = str_replace([' '], '', $request->get('schedule_time'));
        foreach ($order_business_groups->get() as $order) {
            $order->shipping_schedule_time = $time;
            $order->update();
        }

        return redirect()->to($back_url)->with('flash_message', '更新しました。');
    }

    public function approvalLimitPrice(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $counter = 0;

        DB::begintransaction();
        try {
            foreach ($form as $key => $f) {
                // 偶数
                if ($counter % 2 == 0) {
                    $sell_down_price = $request->get($counter);
                    $orders = Order::where('simultaneous_order_code', $key)->get();
                    foreach ($orders as $order) {
                        $order->approval_flg = $f;
                        $order->sell_down_price = $sell_down_price;
                        if ($f == 1) {
                            $order->reply_status = Order::TYPE_APPLOVAL;
                            $order->sell_down_price = data_get($order, 'limit_price');
                        } else {
                            $order->reply_status = Order::TYPE_NOT_APPLOVAL;
                        }
                        $order->update();
                    }
                }
                $counter++;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('flash_message', '失敗しました。');
        }
        DB::commit();
        return redirect()->back()->withInput()->with('flash_message', '更新しました。');
    }
}
