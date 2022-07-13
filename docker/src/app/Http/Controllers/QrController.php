<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientPackage;
use App\Models\Order;
use App\Models\OrderStock;
use App\Models\Package;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use Carbon\Carbon;
use DB;

class QrController extends Controller
{
    public function itemList(Request $request, $package)
    {
        $package = Package::find($package);

        $orders = Order::query()
            ->select('*')
            ->selectRaw('SUM(weight) as weight')
            ->selectRaw('count(*) as quantity')
            ->where('package_id', data_get($package, 'id'))
            ->groupBy('order_product_id')
            ->get();

        return view('market/management/order/itemList', [
            'package' => $package,
            'orders' => $orders,

        ]);
    }

    public function itemDetail($order)
    {
        $order = Order::find($order);

        return view('market/management/order/itemDetail', [
            'order' => $order,
            'stock_flg' => false
        ]);
    }

    public function stockDetail($order)
    {
        $order = OrderStock::find($order);

        return view('market/management/order/itemDetail', [
            'order' => $order,
            'stock_flg' => true
        ]);
    }

    public function pickList(Request $request, $clientPackage)
    {
        $package = ClientPackage::find($clientPackage);
        $client = (clone $package)->client()->first();
        $orders = Order::select('*')
            ->selectRaw('orders.image_path')
            ->join('client_packages','client_packages.id', '=', 'orders.client_package_id')
            ->where('orders.client_package_id', data_get($package, 'id'))
            ->get();

        return view('worker/picking/pickList', [
            'package'=> $package,
            'client' => $client,
            'orders' => $orders,

        ]);
    }
}
