<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StaffWork;
use App\Models\Wuser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{

    // 管理画面 ログイン
    public function admin(Request $request)
    {
        // monthly,weekly,dailyのどれかが入る
        $select_term = $request->get('select_term') ?? 'monthly';

        // 期間ごとの絞り込みロジック

        $today = Carbon::now();
        $year = $today->year;
        $month = $today->month;
        $day = $today->day;
        $start_of_month = Carbon::now()->startOfMonth();
        // 曜日番号 日：0,月：1...土：6
        $day_of_week = $today->dayOfWeek;
        // 土日を除いた今日までの日数
        $weekdays = $start_of_month->diffInWeekdays($today);

        if($select_term == 'monthly'){
            // 月別
            $searchedWork = StaffWork::select('staff_works.*')
            ->selectRaw('count(*) as count')
            ->selectRaw('wusers.image_path, last_name_kana, first_name_kana, concat(wusers.last_name, wusers.first_name) as name')
            ->selectRaw('DATE_FORMAT(staff_works.created_at, "%Y%m") AS date')
            ->leftjoin('wusers', 'wusers.id', '=', 'staff_works.wuser_id')
            ->whereYear('staff_works.created_at', $year)
            ->whereMonth('staff_works.created_at', $month)
            ->where('staff_works.completed_flg',StaffWork::TYPE_COMPLETE)
            ->orderBy('count','desc')
            ->orderBy('wuser_id','asc')
            ->groupBy('date','staff_works.wuser_id','staff_works.task_id')
            ->get();

        }elseif($select_term == 'weekly'){
            // 週別
            // 週の始まりを月曜日と仮定、当日と比較して月曜日を取得
            $monday = Carbon::today()->subDay($day_of_week -1);

            $searchedWork = StaffWork::select('staff_works.*')
            ->selectRaw('count(*) as count')
            ->selectRaw('wusers.image_path, last_name_kana, first_name_kana, concat(wusers.last_name, wusers.first_name) as name')
            ->selectRaw('DATE_FORMAT(staff_works.created_at, "%Y%m") AS date')
            ->leftjoin('wusers', 'wusers.id', '=', 'staff_works.wuser_id')
            ->whereDate('staff_works.created_at', '>=', $monday)
            ->where('staff_works.completed_flg',StaffWork::TYPE_COMPLETE)
            ->orderBy('count','desc')
            ->orderBy('wuser_id','asc')
            ->groupBy('date','staff_works.wuser_id','staff_works.task_id')
            ->get();
        }elseif($select_term == 'daily'){

            // 当日
            $searchedWork = StaffWork::select('staff_works.*')
            ->selectRaw('count(*) as count')
            ->selectRaw('wusers.image_path, last_name_kana, first_name_kana, concat(wusers.last_name, wusers.first_name) as name')
            ->selectRaw('DATE_FORMAT(staff_works.created_at, "%Y%m") AS date')
            ->leftjoin('wusers', 'wusers.id', '=', 'staff_works.wuser_id')
            ->whereDate('staff_works.created_at', '=', Carbon::today())
            ->where('staff_works.completed_flg',StaffWork::TYPE_COMPLETE)
            ->orderBy('count','desc')
            ->orderBy('wuser_id','asc')
            ->groupBy('date','staff_works.wuser_id','staff_works.task_id')
            ->get();

        }

        // 1か月以内に出荷された注文を取得、チャートの表示/非表示判定のために取得
        $lastMonth = Carbon::now()->subMonth()->startOfDay();
        $deliverd_orders = DB::table('orders')->selectRaw('count(*) as count,`order_products`.`title`,`orders`.`shipping_date`')
        ->join('order_products','orders.order_product_id', '=', 'order_products.id')
        ->whereDate('orders.shipping_date', '>=', $lastMonth)
        ->where('orders.instock_status', '=', Order::TYPE_SHIPPED)
        ->groupBy('orders.shipping_date','order_products.title')
        ->get();

        return view('warehouse/index',[
            'select_term' => $select_term,
            'workInfo' => $searchedWork,
            'weekdays' => $weekdays,
            'day_of_week' => $day_of_week,
            'deliverd_orders' => $deliverd_orders
        ]);
    }

    public function getChart(){

        // 1か月前
        $lastMonth = Carbon::now()->subMonth()->startOfDay();

        // チャート用に商品ごとの出荷完了数を取得
        $deliverd_orders = DB::table('orders')->selectRaw('count(*) as count,`order_products`.`title`,`orders`.`shipping_date`,`order_products`.`color`')
        ->join('order_products','orders.order_product_id', '=', 'order_products.id')
        ->whereDate('orders.shipping_date', '>=', $lastMonth)
        ->where('orders.instock_status', '=', Order::TYPE_SHIPPED)
        ->groupBy('orders.shipping_date','order_products.title')
        ->orderBy('shipping_date')
        ->get();

        $deliverd_orders_array = $deliverd_orders->all();
        $array = json_decode(json_encode($deliverd_orders_array), true);
        $order_list = [];
        $array_value = array_values($array);
        foreach($array_value as $value){
            if(!array_key_exists($value['shipping_date'],$order_list)){
              $order_list[$value['shipping_date']] = [['title' => $value['title'],'amount' => $value['count'],'color' => $value['color']]];
            }else{
                if(array_key_exists($value['shipping_date'],$order_list)){
                    array_push($order_list[$value['shipping_date']],['title' => $value['title'],'amount' => $value['count'],'color' => $value['color']]);
                }
            }
        }

        // 魚種のみの配列
        $species = [];
        foreach($order_list as $orders){
            foreach($orders as $order){
                if(!in_array($order['title'],$species)){
                    $species[] = $order['title'];
                }
            }
        }

        // チャートの色の配列
        $colors = [];
        foreach($order_list as $orders){
            foreach($orders as $order){
                if(!in_array('#' . $order['color'],$colors)){
                    $colors[] = '#' . $order['color'];
                }
            }
        }        

        // キーを魚種名に配列を作り換える
        $record_array = [];
        foreach($species as $specie){
            $record_array[$specie] = [];
        }
        // 魚種ごとの出荷数の配列
        foreach($order_list as $date => $orders){
            foreach($orders as $order){
                foreach($record_array as $key => $value){
                    if($order['title'] == $key){
                        $record_array[$key][$date] = $order['amount'];
                    }
                }
            }
        }
        // 日数のみの配列を作成
        $date_list = array_keys($order_list);

        // レコードがない日にちを0埋め
        foreach($record_array as $key => $record){
            foreach($date_list as $date){
                if(!array_key_exists($date,$record)){
                    $record_array[$key][$date] = 0;
                }
            }
        }
        // ソート
        foreach($record_array as $key => $value){
            ksort($record_array[$key]);
        }

        foreach($record_array as $key => $value){
            $values = array_values($value);
            $record_array[$key] = $values;
        }

        $datas = [];
        $count = 0;

        foreach($record_array as $key => $value){
            $datas[] = [
                'label' => $key,
                'data' => $value,
                'backgroundColor' => $colors[$count],
                'stack' => 'stack-1' 
            ];
            $count += 1;
        }

        // グラフのオプション
        $options = ['scales' => ['y' => ['beginsAtZero' => true]],
                    'responsive' => true,
                    'title' =>[
                      'display' => true,
                      'text' => '魚種ごとの出荷完了数'
                    ]
                   ];

        echo json_encode([$date_list,$datas,$options]);

        die();

    }

    public function forget()
    {
        return view('warehouse/login/forget');
    }

    public function complete()
    {
        return view('warehouse/login/complete');
    }

    // 実績データ
    public function adminResult()
    {
        return view('warehouse/result/index');
    }

    // 注文管理
    public function adminOrder()
    {
        return view('warehouse/order/index');
    }

    public function adminOrderDetail()
    {
        return view('warehouse/order/detail');
    }

    public function adminOrderCreate()
    {
        return view('warehouse/order/create');
    }

    public function adminOrderEdit()
    {
        return view('warehouse/order/edit');
    }

    // 市場スタッフ管理
    public function adminStaff()
    {
        return view('warehouse/staff/index');
    }

    // データインポート
    public function adminImport()
    {
        return view('warehouse/import/index');
    }

    // アカウント設定
    public function adminFunction()
    {
        return view('warehouse/function/index');
    }
}