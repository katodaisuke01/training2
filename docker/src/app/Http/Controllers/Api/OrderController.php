<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderBusinessGroup;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateInterval;
use Datetime;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showOrderDetail(Request $request)
    {
        $result = false;
        $messages = "取得に失敗しました。";
        // URLのdata=以降を取得
        $data = $request->input('pack_code');
        // 文字列を/で区切って配列を作成
        $target = explode('/', $data);
        // 区切った配列の最後の値を取得
        $_package = end($target);
        $package = Package::find($_package);
        if ($package) {
            $result = true;
            $orders = Order::select(['orders.delivery_partnar_id', 'orders.image_path', 'orders.order_product_id', 'order_products.industry_group_id', 'orders.client_id', 'orders.weight'])
                ->where('package_id', data_get($package, 'id'))
                ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
                ->leftJoin('industry_groups', 'industry_groups.id', '=', 'order_products.industry_group_id')
                ->leftJoin('delivery_partnars', 'delivery_partnars.id', '=', 'orders.delivery_partnar_id')
                ->leftJoin('clients', 'clients.id', '=', 'orders.client_id')
                ->get()
                ->map(function ($order) {
                    return $order->setVisible([
                        'api_response_weight',
                        'delivery_partnar_name',
                        'image',
                        'title',
                        'industry_name',
                        'shelf_number',
                    ]);
                }); // 対象の商品
            $messages = "取得に成功しました。";
        }

        return response()->json([
            'result' => $result,
            'data' => [
                'orders' => $orders,
                'message' => $messages,
            ]
        ]);
    }
}
