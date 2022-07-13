<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessOrder;
use App\Mail\NoticeOrder;
use Illuminate\Http\Request;
use App\Models\OrderGroup;
use App\Models\OrderBusinessGroup;
use App\Models\Order;
use App\Models\User;
use App\Models\MCategory;
use App\Models\MFishCategory;
use App\Models\MBusiness;
use App\Models\MProcess;
use App\Models\OrderProduct;
use App\Models\OrderStock;
use App\Models\Client;
use App\Models\DeliveryPartnar;
use App\Models\OrderSearch;
use App\Http\Requests\StoreOrderCreate;
use App\Http\Requests\StoreCatalogOrderCreate;
use App\Http\Requests\StoreOrderUpdate;
use App\Repositories\OrderRepositoryInterface;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __constract(
        OrderSearch              $order_search,
        OrderRepositoryInterface $order_repository
    )
    {
        $this->order_search = $order_search;
        $this->order_repository = $order_repository;
    }

    // 注文管理
    public function index(Request $request)
    {
        $user = Auth::user();
        // セッションがあれば削除
        session()->forget('products');
        $today = new Carbon('today');
        $start_line = $today->format('Y-m-d H:i:s');
        $end_line = $today->addDay()->subSecond()->format('Y-m-d H:i:s');

        if ($request->get('select_date') != null) {
            $select_date = \Carbon::parse($request->get('select_date'));
            $start_line = $select_date->format('Y-m-d H:i:s');
            $end_line = $select_date->addDay()->subSecond()->format('Y-m-d H:i:s');
        }

        $orders = OrderGroup::query()
            ->where('m_business_id', $user->m_business_id)
            ->where('total_quantity', '>', 0)
            ->keywordSearch($request->get('keyword'))
            ->whereBetween('created_at', [$start_line, $end_line])
            ->sortByDates($request->get('sort_created_at'), $request->get('sort_shipping_date'))
            ->get();

        $stocks = OrderStock::query()
            ->select('order_stocks.*')
            ->selectRaw('COUNT(*) as count')
            ->whereHas('stock', function ($query) use ($user) {
                $query->whereHas('order_product', function ($query) use ($user) {
                    $query->where('m_business_id', $user->m_business_id);
                });
            })
            ->leftjoin('stocks', 'stocks.id', '=', 'order_stocks.stock_id')
            ->whereNull('disposal_time')
            ->whereNotNull('order_stocks.stock_id')
            ->whereNotNull('order_stocks.order_product_id')
            ->where('status', OrderStock::STATUS_TYPE_EXSIST)
            ->groupBy('stocks.order_product_id')
            ->get();


        return view('warehouse/order/index', [
            'categoryList' => MCategory::select('id', 'name')->get(),
            'fishCategories' => MFishCategory::all(),
            'processCategoryList' => MProcess::select('id', 'name')->get(),
            'products' => OrderProduct::where('m_business_id', $user->m_business_id)->get(),
            'today' => $today,
            'orders' => $orders,
            'stocks' => $stocks,
        ]);
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $group_order = OrderGroup::with('orders')
            ->where('m_business_id', $user->m_business_id)
            ->find($request->get('order'));

        if (!$group_order) {
            abort(404);
        }

        // 値引き依頼商品差し戻し
        $request_orders = Order::query()
            ->where('m_business_id', $user->m_business_id)
            ->where('order_group_id', $request->get('order'))
            ->whereNotNull('limit_price')
            ->where('approval_flg', 0)
            ->where('reply_status', Order::TYPE_NOT_APPLOVAL)
            ->groupBy('simultaneous_order_code')
            ->get();

        // 注文確定商品
        $approvaled_orders = Order::query()
            ->where('m_business_id', $user->m_business_id)
            ->where('order_group_id', $request->get('order'))
            ->where('approval_flg', 1)
            ->where('reply_status', Order::TYPE_APPLOVAL)
            ->groupBy('simultaneous_order_code')
            ->get();

        return view('warehouse/order/detail', [
            'group_order' => $group_order,
            'request_orders' => $request_orders,
            'approvaled_orders' => $approvaled_orders,
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $client_id = request('client_id');
        return view('warehouse/order/create', [
            'categoryList' => MCategory::select('id', 'name')->get(),
            'fishCategories' => MFishCategory::all(),
            'processCategoryList' => MProcess::select('id', 'name')->get(),
            'products' => OrderProduct::where('m_business_id', $user->m_business_id)->get(),
            'clients' => Client::all(),
            'delivery_partnars' => DeliveryPartnar::select('id', 'name')->get(),
            'prefs' => config('prefecture'),
            'client_id' => $client_id,
            'request_orders' => $request_orders ?? null,
        ]);
    }

    public function store(StoreOrderCreate $request)
    {
        $user = Auth::user();
        $params = $request->all();
        $code = Order::generateCode();
        // 既に「同顧客」且つ「同じ日付」の発注履歴が存在する場合
        $today = new Carbon('today');
        $start_line = $today->format('Y-m-d H:i:s');
        $end_line = $today->addDay()->subSecond()->format('Y-m-d H:i:s');
        // グルーピング用

        $client_id = $params['client_id'];
        if ($client_id == 'new_client') {
            $new_client = Client::create([
                'name' => $params['client_name'],
                'tel' => $params['tel'],
                'email' => $params['email'],
                'zip_code' => $params['zipcode'],
                'prefecture_name' => $params['prefecture_name'],
                'address1' => $params['address1'],
                'address2' => $params['address2'],
                'address3' => $params['address3'],
            ]);
            $client_name = $new_client->name;
            $client_id = $new_client->id;
        } else {
            $client_name = Client::find($client_id)->name;
        }

        $addition = Order::where('client_id', $client_id)
            ->where('m_business_id', $user->m_business_id)->where('m_business_id', $user->m_business_id)
            ->where('shipping_date', $params['shipping_date'])
            ->whereBetween("created_at", [$start_line, $end_line])
            ->first();

        $business_name = MBusiness::find($user->m_business_id)->name;
        $group_name = Carbon::parse($params['shipping_date'])->format('Ymd') . '_' . $client_name . '_' . $business_name . '_' . Carbon::now()->format('Ymd');
        $business_group_name = Carbon::parse($params['shipping_date'])->format('Ymd') . '_' . $business_name . '_' . Carbon::now()->format('Ymd');

        $business_addition = Order::where('m_business_id', $user->m_business_id)
            ->where('shipping_date', $params['shipping_date'])
            ->whereBetween("created_at", [$start_line, $end_line])
            ->first();

        DB::beginTransaction();

        try {
            if ($addition == null) {
                $order_group = OrderGroup::create([
                    'group_name' => $group_name,
                    'm_business_id' => $user->m_business_id,
                    'client_id' => $client_id,
                    'delivery_partnar_id' => $params['delivery_partnar'],
                    'shipping_date' => $params['shipping_date'],
                    'total_quantity' => $params['quantity'],
                ]);
            } else {
                // 顧客グループの合計注文数を更新
                $order_group = OrderGroup::where('group_name', $group_name)->first();
                $total_quantity = $order_group->total_quantity + $params['quantity'];
                $order_group->fill(['total_quantity' => $total_quantity])->save();
            }

            // 事業者グルーピングされていない場合
            if ($business_addition == null) {
                $order_business_group = OrderBusinessGroup::create([
                    'group_name' => $business_group_name,
                    'm_business_id' => $user->m_business_id,
                    'delivery_partnar_id' => $params['delivery_partnar'],
                    'shipping_date' => $params['shipping_date'],
                    'total_quantity' => $params['quantity'],
                    'shipping_schedule_time' => User::DEFAULT_SHIPPING_SCHEDULE_TIME,
                    'industry_group_id' => $user->industry_group_id
                ]);
            } else {
                // 事業者グループの合計注文数を更新
                $order_business_group = OrderBusinessGroup::where('group_name', $business_group_name)->first();
                $business_total_quantity = $order_business_group->total_quantity + $params['quantity'];
                $order_business_group->fill(['total_quantity' => $business_total_quantity])->save();
            }

            // 注文数の数だけレコード作成
            $repetition = $params['quantity'];

            $order_product = OrderProduct::find($params['product_id']);
            // 注文顧客新規追加の場合
            for ($i = 0; $i < $repetition; $i++) {
                Order::create([
                    'm_business_id' => $user->m_business_id,
                    'order_product_id' => $params['product_id'],
                    'client_id' => $client_id,
                    'delivery_partnar_id' => $params['delivery_partnar'],
                    'quantity' => $params['quantity'],
                    'shipping_date' => $params['shipping_date'],
                    'simultaneous_order_code' => $code,
                    'page_number' => $i + 1,
                    'shipping_status' => 0,
                    'order_group_id' => $order_group->id,
                    'order_business_group_id' => $order_business_group->id,
                    'landing_configuration_date' => \Carbon\Carbon::parse($params['shipping_date'])->subDays(data_get($order_product, 'landing_configuration', 0))->format('Y-m-d'),
                    'purification_configuration_date' => \Carbon\Carbon::parse($params['shipping_date'])->subDays(data_get($order_product, 'purification_configuration', 0))->format('Y-m-d'),
                ]);
            }
            DB::commit();

            // 産地管理者にお知らせメール送信
            $target = $order_product->AdminEmailAddress;

            foreach ($target as $val) {
                \Mail::send(new NoticeOrder([
                    'to' => $val,
                    'business_name' => $user->BusinessName,
                    'order_name' => $order_product->title,
                    'quantity' => $params['quantity'],
                    'from' => (config('mail.from.address')),
                    'subject' => ('【' . env('APP_NAME', '産地管理システム') . '】' . __('発注がありました。'))
                ]));
            }

            return redirect(route('warehouse.order.index'))->with('flash_message', '登録が完了しました。');
        } catch (\Exception $e) {
            DB::rollback();

            dd($e);

            return back()->withInput()->with('flash_message', '登録に失敗しました。');
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $order = Order::whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })->find($request->get('order'));

        return view('warehouse/order/edit', [
            'order' => $order
        ]);
    }

    public function update(StoreOrderUpdate $request)
    {
        $user = Auth::user();
        $order = Order::whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })->find($request->get('order_id'));

        $params = $request->all();
        $code = Order::generateCode();

        $client_name = Client::find($order->client_id)->name;
        $business_name = MBusiness::find($user->m_business_id)->name;
        $group_name = Carbon::parse($order->shipping_date)->format('Ymd') . '_' . $client_name . '_' . $business_name . '_' . Carbon::parse($order->created_at)->format('Ymd');
        $business_group_name = Carbon::parse($order->shipping_date)->format('Ymd') . '_' . $business_name . '_' . Carbon::parse($order->created_at)->format('Ymd');

        // グループの合計注文数を更新
        $order_group = OrderGroup::where('m_business_id', $user->m_business_id)
            ->where('group_name', $group_name)
            ->first();
        $total_quantity = $order_group->total_quantity + $params['quantity'];
        $order_group->fill(['total_quantity' => $total_quantity])->save();

        // 事業者グループの合計注文数を更新
        $order_business_group = OrderBusinessGroup::where('group_name', $business_group_name)->first();
        $business_total_quantity = $order_business_group->total_quantity + $params['quantity'];
        $order_business_group->fill(['total_quantity' => $business_total_quantity])->save();

        // 注文数の数だけレコード作成
        $repetition = $params['quantity'];

        if ($order) {
            // 追加注文を作成
            for ($i = 0; $i < $repetition; $i++) {
                Order::create([
                    'm_business_id' => \Auth::user()->m_business_id,
                    'order_product_id' => $order->order_product_id,
                    'client_id' => $order->client_id,
                    'delivery_partnar_id' => $order->delivery_partnar_id,
                    'quantity' => $request->get('quantity'),
                    'shipping_date' => $order->shipping_date,
                    'simultaneous_order_code' => $code,
                    'shipping_status' => 0,
                    'page_number' => $i + 1,
                    'additional_order_flg' => 1,
                    'order_group_id' => $order_group->id,
                    'order_business_group_id' => $order_business_group->id,
                    'landing_configuration_date' => \Carbon\Carbon::parse($order->shipping_date)->subDays(data_get($order, 'order_product.landing_configuration', 0))->format('Y-m-d'),
                    'purification_configuration_date' => \Carbon\Carbon::parse($order->shipping_date)->subDays(data_get($order, 'order_product.purification_configuration', 0))->format('Y-m-d'),
                ]);
            }
        }

        // 産地管理者にお知らせメール送信
        $order_product = OrderProduct::where('m_business_id', $user->m_business_id)
            ->where('id', $order->order_product_id)
            ->first();
        $target = $order_product->AdminEmailAddress;

        foreach ($target as $val) {
            \Mail::send(new NoticeOrder([
                'to' => $val,
                'business_name' => \Auth::user()->BusinessName,
                'order_name' => $order_product->title,
                'quantity' => $request->get('quantity'),
                'from' => (config('mail.from.address')),
                'subject' => ('【' . env('APP_NAME', '産地管理システム') . '】' . __('発注がありました。'))
            ]));
        }

        return redirect(route('warehouse.order.detail', ['order' => $order_group->id]))->with('flash_message', '追加発注登録が完了しました。');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where('m_business_id', $user->m_business_id)
            ->where('simultaneous_order_code', $request->get('id'))
            ->get();

        $check = $orders->whereNotNull('package_id')->count();
        if ($check != 0) {
            return back()->withInput()->with('flash_message', 'この商品は既に作業中の為、削除できません。');
        }

        $order_group = OrderGroup::where('m_business_id', $user->m_business_id)
            ->where('id', $orders->first()->order_group_id)
            ->first();
        $order_business_group = OrderBusinessGroup::where('id', $orders->first()->order_business_group_id)->first();

        DB::beginTransaction();
        try {
            // 削除対象のorderのidと紐づく在庫を取得、注文削除のタイミングで、在庫からorder_idを削除、在庫のステータスを無し→有りに変更
            $target_array = $orders->toArray();
            foreach ($target_array as $value) {
                $id = $value['id'];
                $target_stock = OrderStock::where('order_id', $id)->first();
                $target_stock->order_id = NULL;
                $target_stock->status = OrderStock::STATUS_TYPE_EXSIST;
                $target_stock->update();
            }

            foreach ($orders as $value) {
                $value->delete();
            }

            $order_group->total_quantity = ($order_group->total_quantity) - $orders->count();
            $order_group->update();

            $order_business_group->total_quantity = ($order_business_group->total_quantity) - $orders->count();
            $order_business_group->update();

            DB::commit();

            return redirect(route('warehouse.order.detail', ['order' => data_get($order_group, 'id')]))
                ->with('flash_message', '注文を削除しました。');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->with('flash_message', '削除に失敗しました。');
        }
    }

    public function productSelect(Request $request)
    {
        dd($request);
        return response()->json($data);
    }

    public function clientSelect(Request $request)
    {
        $data = Client::where('id', $request->get('client_id'))->get();

        return response()->json($data);
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();

        $request_params = $request->get('params')['order'];
        $params = [];
        foreach ($request_params as $key => $value) {
            if (array_key_exists('quantity', $value)) {
                $params[$key] = $value;
            }
        }

        return view('warehouse/order/confirm', [
            'orderList' => $params,
            'categoryList' => MCategory::select('id', 'name')->get(),
            'fishCategories' => MFishCategory::all(),
            'processCategoryList' => MProcess::select('id', 'name')->get(),
            'products' => OrderProduct::where('m_business_id', $user->m_business_id)->get(),
            'clients' => Client::all()->whereNull('deleted_at'),
            'delivery_partnars' => DeliveryPartnar::select('id', 'name')->get(),
            'prefs' => config('prefecture'),
        ]);
    }

    public function fix(Request $request)
    {
        // stockオブジェクトを取得
        $stocks = OrderStock::query()
            ->select('order_stocks.*')
            ->selectRaw('COUNT(*) as count')
            ->leftjoin('stocks', 'stocks.id', '=', 'order_stocks.stock_id')
            ->whereNull('disposal_time')
            ->whereNotNull('order_stocks.stock_id')
            ->whereNotNull('order_stocks.order_product_id')
            ->where('status', OrderStock::STATUS_TYPE_EXSIST)
            ->groupBy('stocks.order_product_id')
            ->get();

        // リクエストの注文情報を取得
        $order = $request->input('order');

        // リクエストの注文数とstockオブジェクトの在庫数を比較、注文数 > 在庫数　となる場合は前の画面にリダイレクト
        foreach ($order as $key => $value) {
            if ($value['quantity'] > $stocks->where('stock_id', $value['stock_id'])->pluck('count')[0]) {
                return back()->with('flash_message', $value['product_name'] . '：注文数は在庫数以下を指定してください。');
            }
        }

        $params = $request->all();
        foreach ($params as $key => $val) {
            if (empty($val) || $key == '_token') {
                unset($params[$key]);
            }
        }

        if ($params == null) {
            return redirect()->to(route('warehouse.order.index'))
                ->with('flash_message', '個数が選択されていません。');
        }

        session()->put('products', $params);

        return redirect()->route('warehouse.order.confirm', [
            'params' => $params,
        ]);
    }

    // 複数同時注文処理
    public function catalogStore(StoreCatalogOrderCreate $request)
    {
        ProcessOrder::dispatch($request)->afterResponse();
        $products = session('products');
        return redirect()->action('Warehouse\OrderController@complete', [
            'products' => $products,
        ]);

    }


    public function complete()
    {
        // セッションの削除
        session()->forget('products');

        return view('warehouse/order/complete');
    }

    public function getPrice(Request $request)
    {
        return OrderProduct::find($request->get('product_id'))->price;
    }

    public function tasks()
    {
        return view('tasks');
    }

    public function giveOrCancel(Request $request)
    {
        $user = Auth::user();
        $form = $request->all();
        unset($form['_token']);

        DB::begintransaction();
        try {
            foreach ($form as $key => $f) {
                $orders = Order::where('m_business_id', $user->m_business_id)
                    ->where('simultaneous_order_code', $key)
                    ->get();
                foreach ($orders as $order) {
                    if ($f == 1) {
                        $order->approval_flg = $f;
                        $order->update();
                    } else {
                        $order->delete();
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with('flash_message', '失敗しました。');
        }
        DB::commit();
        return redirect()->back()->withInput()->with('flash_message', '更新しました。');
    }
}
