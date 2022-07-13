<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\OrderBusinessGroup;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    //産地管理画面 ————————————————————————————————————————————————————
    public function management(Request $request)
    {
        $user = Auth::user();

        if (!empty($request->get('select_date'))) {
            $neutral_date = Carbon::parse($request->get('select_date'));
        } else {
            $neutral_date = new Carbon('today');
        }
        $_start = $neutral_date->format('Y-m-d H:i:s');
        $_end = $neutral_date->addDay()->subSecond()->format('Y-m-d H:i:s');

        $business_orders = OrderBusinessGroup::where('industry_group_id', $user->industry_group_id)
            ->where('total_quantity', '>', 0)
            ->whereBetween('created_at', [$_start, $_end]);

        $fish_category = Order::whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })
            ->whereBetween('created_at', [$_start, $_end])
            ->get()
            ->groupBy('order_product_id');

        $rankOfOrder = [];
        foreach ($fish_category as $key => $value) {
            $rankOfOrder[$key] = count($value);
        }

        $start_at = new Carbon('first day of last month');
        $end_at = new Carbon('first day of next month');
        $stop = $end_at->diffInDays($start_at) - 1;
        $to_graph = ['label' => '', 'achievement' => '', 'prediction' => ''];
        for ($i = 0; $stop >= $i; $i++) {
            $_dateIndex = new Carbon('first day of last month');
            $_dateIndex2 = $_dateIndex->addDays($i);
            $_dateIndex3 = $_dateIndex2->year . '-' . sprintf('%02d', $_dateIndex2->month) . '-' . sprintf('%02d', $_dateIndex2->day) . ' ' . '00:00:00';
            $_dateIndex4 = carbon::parse($_dateIndex3);
            $target_start_time = $_dateIndex4->format('Y-m-d H:i:s');
            $target_end_time = $_dateIndex4->addDay()->subSecond()->format('Y-m-d H:i:s');
            // 注文実績
            $_tmp = Order::whereHas('order_product', function ($query) use ($user) {
                $query->where('industry_group_id', $user->industry_group_id);
            })->whereBetween('created_at', [$target_start_time, $target_end_time])->count();

            $to_graph['label'] .= $start_at->year . '_' . sprintf('%02d', $start_at->month) . '_' . sprintf('%02d', $start_at->day) . ',';
            $to_graph['achievement'] .= '30' . ',';
            $to_graph['prediction'] .= $_tmp . ',';

            $start_at->addDay();
        }

        // 指値商品取得
        $request_orders = Order::whereHas('order_product', function ($query) use ($user) {
            $query->where('industry_group_id', $user->industry_group_id);
        })
            ->whereNotNull('limit_price')
            ->where('approval_flg', 0)
            ->whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
            ->whereNull('reply_status')
            ->groupBy('m_business_id')
            ->get();

        return view('market/management/index', [
            'orders' => $business_orders->get(),
            'total_business_orders' => $business_orders->count(),
            'fish_orders_count' => count($fish_category),
            'fish_orders' => $fish_category,
            'fish_category' => $fish_category,
            'rankOfOrder' => $rankOfOrder,
            'to_graph' => $to_graph,
            'request_orders' => $request_orders,
        ]);
    }

    public function printCode(Request $request)
    {
        if ($request->get('quantity') <= 0) {
            $codes = [];
            for ($i = 0; $i < $request->get('quantity'); $i++) {
                $code = Package::generateCode();
                $codes[] = $code;

                Package::create([
                    'pack_code' => $code,
                    'pack_status' => 1,
                    'user_id' => \Auth::user()->id,
                    'delivery_partnar_id' => 7, // TODO:配送事業者idを指定できるようにする
                ]);
            }

            $pdf = app('dompdf.wrapper');
            $pdf->loadView('market.management.pdf.index', [
                'codes' => $codes,
            ]);

            return $pdf->stream('sample.pdf');
        }

        return redirect()->to(route('admin'))->with('flash_message', 'QRコードを発行しました。');
    }

    // PDF印刷ページdev確認用
    public function pdf(Request $request)
    {
        if ($request->get('quantity') > 0) {
            $codes = [];
            for ($i = 0; $i < $request->get('quantity'); $i++) {
                $code = Package::generateCode();
                $codes[] = $code;

                Package::create([
                    'pack_code' => $code,
                    'pack_status' => 1,
                    'user_id' => \Auth::user()->id,
                    'industry_group_id' => \Auth::user()->industry_group_id,
                    'delivery_partnar_id' => 7, // TODO:配送事業者idを指定できるようにする
                ]);
            }

            return view('market/management/pdf/index', [
                'codes' => $codes,
            ]);
        }
    }

    /**
     * ファイルダウンロード処理
     */
    public function download()
    {
        $pathToFile = 'SetupSoftware.zip';
        $filename = 'SetupSoftware.zip';
        $headers = ['Content-Type' => 'application/zip'];
        return response()->download($pathToFile, $filename, $headers);
    }
}
