<?php

namespace App\Http\Controllers\Industry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Package;
use App\Models\OrderPackage;
use App\Models\OrderGroup;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use App\Http\Requests\StoreWorkFlow;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Storage;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $orders = OrderBusinessGroup::query()->where('total_quantity', '>', 0);

        $task_orders = Order::query()->whereNull('deleted_at');

        $query = $request->all();
        $today = new Carbon('today');
        $min_start_line = $today->format('Y-m-d H:i:s');
        $neutral = $today->addHours(23)->addMinutes(59)->format('Y-m-d H:i:s');
        $max_end_line = $today->addYear(1)->format('Y-m-d H:i:s');

        $start_date = \Carbon::parse($request->get('start_date'))->format('Y-m-d H:i:s');
        $end_date = \Carbon::parse($request->get('end_date'))->format('Y-m-d H:i:s');

        // 日付ソート
        if ($request->get('start_date') != null && $request->get('end_date') != null) {
            $orders->whereBetween('shipping_date', [$start_date, $end_date]);
            $task_orders->whereBetween('shipping_date', [$start_date, $end_date]);
            $productPath = 1;
        } elseif ($request->get('start_date') != null && $request->get('end_date') == null) {
            $orders->whereBetween('shipping_date', [$start_date, $max_end_line]);
            $task_orders->whereBetween('shipping_date', [$start_date, $max_end_line]);
            $productPath = 2;
        } elseif ($request->get('end_date') != null && $request->get('start_date') == null) {
            $orders->whereBetween('shipping_date', [$min_start_line, $end_date]);
            $task_orders->whereBetween('shipping_date', [$min_start_line, $end_date]);
            $productPath = 3;
        } else {
            $orders->whereBetween('shipping_date', [$min_start_line, $neutral]);
            $task_orders->whereBetween('shipping_date', [$min_start_line, $neutral]);
            $productPath = 4;
        }

        $rangeCount = $orders->count();

        $total_orders = 0;
        for ($i = 0; $i < $rangeCount; $i++) {
            $total_orders += $orders->get()[$i]->total_quantity;
        }

        // 当日作業母数
        $day = \Carbon::today();
        $today = $day->format('Y-m-d H:i:s');
        $todays_total_orders = Order::where('shipping_date', $today)->count();

        switch ($productPath) {
            case 1:
                // 未着手
                $notStarted = Order::whereBetween('shipping_date', [$start_date, $end_date])->where('shipping_status', 0)->count();
                // 梱包済み
                $alreadyPacking = Order::whereBetween('shipping_date', [$start_date, $end_date])->where('shipping_status', 2)->count();
                // 処理済み
                $done = Order::whereBetween('shipping_date', [$start_date, $end_date])->where('shipping_status', 1)->count();
                break;
            case 2:
                $notStarted = Order::whereBetween('shipping_date', [$start_date, $max_end_line])->where('shipping_status', 0)->count();
                $alreadyPacking = Order::whereBetween('shipping_date', [$start_date, $max_end_line])->where('shipping_status', 2)->count();
                $done = Order::whereBetween('shipping_date', [$start_date, $max_end_line])->where('shipping_status', 1)->count();
                break;
            case 3:
                $notStarted = Order::whereBetween('shipping_date', [$min_start_line, $end_date])->where('shipping_status', 0)->count();
                $alreadyPacking = Order::whereBetween('shipping_date', [$min_start_line, $end_date])->where('shipping_status', 2)->count();
                $done = Order::whereBetween('shipping_date', [$min_start_line, $end_date])->where('shipping_status', 1)->count();
                break;
            case 4:
                $notStarted = Order::whereBetween('shipping_date', [$min_start_line, $neutral])->where('shipping_status', 0)->count();
                $alreadyPacking = Order::whereBetween('shipping_date', [$min_start_line, $neutral])->where('shipping_status', 2)->count();
                $done = Order::whereBetween('shipping_date', [$min_start_line, $neutral])->where('shipping_status', 1)->count();
                break;
        }

        // 並び順
        if ($request->get('sort_created_at') == 'up') {
            $orders->orderBy('created_at', 'asc');
        } elseif ($request->get('sort_created_at') == 'down') {
            $orders->orderBy('created_at', 'desc');
        }
        if ($request->get('sort_shipping_date') == 'up') {
            $orders->orderBy('shipping_date', 'asc');
        } elseif ($request->get('sort_shipping_date') == 'down') {
            $orders->orderBy('shipping_date', 'desc');
        }

        // デフォルト降順
        if (empty($request->get('sort_shipping_date')) && empty($request->get('sort_created_at'))) {
            $orders->orderBy('shipping_date', 'desc');
        }

        $dateArray = [];
        foreach ($orders->get() as $val) {
            if (!in_array($val->shipping_date->format('Y-m-d H:i:s'), $dateArray)) {
                $dateArray[] = $val->shipping_date->format('Y-m-d H:i:s');
            }
        }

        return view('market/home/index', [
            'query' => $query,
            'day' => $day,
            'orders' => $orders->get(),
            'task_orders' => $task_orders,
            'dateArray' => $dateArray,
            'total_orders' => $total_orders,
            'notStarted' => $notStarted,
            'alreadyPacking' => $alreadyPacking,
            'done' => $done,
        ]);
    }

    public function cultivation(Request $request) {
        $user = Auth::user();

        $today = new Carbon('today');
        $min_start_line = $today->format('Y-m-d H:i:s');
        $max_end_line = $today->addYear()->format('Y-m-d H:i:s');

        $start_date = \Carbon::parse($request->get('start_date'))->format('Y-m-d H:i:s') ?? $min_start_line;
        $end_date = \Carbon::parse($request->get('end_date'))->format('Y-m-d H:i:s') ?? $max_end_line;
        if ($start_date === $min_start_line && $end_date === $max_end_line) {
            $neutral = $today->addHours(23)->addMinutes(59)->format('Y-m-d H:i:s');
            $end_date = $neutral;
        }
        $order_business_groups = OrderBusinessGroup::with('orders.order_product:id,title')
            ->where('industry_group_id', $user->industry_group_id)
            ->where('total_quantity', '>', 0)
            ->whereBetween('shipping_date', [$start_date, $end_date]);

        $task_orders = Order::whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })
            ->whereBetween('shipping_date', [$start_date, $end_date])
            ->get();

        $notStarted = Order::whereBetween('shipping_date', [$start_date, $end_date])->where('shipping_status', 0)->count();
        $alreadyPacking = Order::whereBetween('shipping_date', [$start_date, $end_date])->where('shipping_status', 2)->count();
        $done = Order::whereBetween('shipping_date', [$start_date, $end_date])->where('shipping_status', 1)->count();

        // 並び順
        $order_business_groups->sortByDates($request->get('sort_created_at'), $request->get('sort_shipping_date'));

        // デフォルト降順
        if (empty($request->get('sort_shipping_date')) && empty($request->get('sort_created_at'))) {
            $order_business_groups->orderBy('shipping_date', 'desc');
        }

        $order_business_groups = $order_business_groups->get();

        $rangeCount = $order_business_groups->count();
        $total_orders = 0;
        for ($i = 0; $i < $rangeCount; $i++) {
            $total_orders += $order_business_groups[$i]->total_quantity;
        }

        $dateArray = [];
        foreach ($order_business_groups as $val) {
            if (!in_array($val->shipping_date->format('Y-m-d H:i:s'), $dateArray)) {
                $dateArray[] = $val->shipping_date->format('Y-m-d H:i:s');
            }
        }

        return view('market.home.cultivation', [
            'query' => $request->all(),
            'order_business_groups' => $order_business_groups,
            'task_orders' => $task_orders,
            'day' => \Carbon::today(),
            'dateArray' => $dateArray,
            'total_orders' => $total_orders,
            'notStarted' => $notStarted,
            'alreadyPacking' => $alreadyPacking,
            'done' => $done,
        ]);
    }

    public function detail(Request $request, OrderBusinessGroup $business_group)
    {
        $orders = Order::query()
            ->where('order_business_group_id', $business_group->id)
            ->whereNull('deleted_at')
            ->get()
            ->groupBy('simultaneous_order_code');

        // 未着手
        $notStarted = Order::where('order_business_group_id', $business_group->id)->where('shipping_status', '0')->count();
        // 梱包済み
        $alreadyPacking = Order::where('order_business_group_id', $business_group->id)->where('shipping_status', '1')->count();
        // 処理済み
        $done = Order::where('order_business_group_id', $business_group->id)->where('shipping_status', '2')->count();
        // 発送済み
        $shippingDone = Order::where('order_business_group_id', $business_group->id)->where('shipping_status', '3')->count();

        return view('market/home/detailCompany', [
            'business_group' => $business_group,
            'orders' => $orders,
            'notStarted' => $notStarted,
            'alreadyPacking' => $alreadyPacking,
            'done' => $done,
            'shippingDone' => $shippingDone,
        ]);
    }

    public function taskCalender(Request $request)
    {
        $task_orders = Order::query()->whereNull('deleted_at');

        if ($request->get('task_date') != null) {
            $task_orders->where('shipping_date', $request->get('task_date'));
            $landing_count = Order::query()->where('landing_configuration_date', $request->get('task_date'))->count();
            $purification__count = Order::query()->where('purification_configuration_date', $request->get('task_date'))->count();
        } else {
            $task_orders->where('shipping_date', Carbon::today()->format('Y-m-d'));
            $landing_count = Order::query()->where('landing_configuration_date', Carbon::today()->format('Y-m-d'))->count();
            $purification__count = Order::query()->where('purification_configuration_date', Carbon::today()->format('Y-m-d'))->count();
        }

        $task_group = (clone $task_orders)->get()->groupBy('order_product_id');
        $task_count = (clone $task_orders)->count();

        return view('market/home/task_calender', [
            'task_group' => $task_group,
            'task_count' => $task_count,
            'request' => $request,
            'landing_count' => $landing_count,
            'purification__count' => $purification__count
        ]);
    }

    private function generateCode($length = 6)
    {
        $max = pow(10, $length) - 1;                    // コードの最大値算出
        $rand = random_int(0, $max);                    // 乱数生成
        $code = sprintf('%0' . $length . 'd', $rand);     // 乱数の頭0埋め

        return $code;
    }

}
