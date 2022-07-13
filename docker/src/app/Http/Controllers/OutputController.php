<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use Carbon\Carbon;
use DB;

class OutputController extends Controller
{
    public function invoice(Request $request, $business,$industryGroupId)
    {
        // 注文詳細データ
        $orders = Order::select('*')->selectRaw('sum(orders.weight) as total_weight')->whereHas('order_product', function ($query) use ($industryGroupId) {
            $query->where('industry_group_id', $industryGroupId);
        })
            ->where('orders.order_business_group_id', $business)
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->leftJoin('packages', 'packages.id', '=', 'orders.package_id');

        $industry = data_get((clone $orders)->first(), 'order_product.industry_group');
        $packages = (clone $orders)->groupBy('package_id')->get();
        return view('market.management.output._invoice', [
            'orders' => $orders->selectRaw('count(*) as product_count')->groupBy('orders.order_product_id')->get(),
            'industry' => $industry,
            'packages' => $packages,
            'business_group' => OrderBusinessGroup::find($business),
            'industryGroupId' => $industryGroupId
        ]);
    }

    public function supply(Request $request, $business,$industryGroupId)
    {
        $business_group = OrderBusinessGroup::where('industry_group_id', $industryGroupId)
            ->find($business);
        $orders = Order::select('*')->selectRaw('sum(orders.weight) as total_weight')->whereHas('order_product', function ($query) use ($industryGroupId) {
            $query->where('industry_group_id', $industryGroupId);
        })
            ->where('orders.m_business_id', $business_group->m_business_id)
            ->where('orders.shipping_status', '>=', 2)
            ->where('orders.shipping_date', $business_group->shipping_date);
        $industry = data_get((clone $orders)->first(), 'order_product.industry_group');

        $total_price = (clone $orders)
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->sum('order_products.price');

        return view('market/management/output/_supply', [
            'business_group' => $business_group,
            'orders' => $orders->selectRaw('count(*) as product_count')->groupBy('orders.order_product_id')->get(),
            'industry' => $industry,
            'total_price' => $total_price,
            'packages' => $orders->groupBy('package_id')->select('package_id')->distinct()->get(),
            'industryGroupId' => $industryGroupId
        ]);
    }

    public function download($business,$industryGroupId)
    {
        // タイムアウト対策
        ini_set('max_execution_time', '-1');

        $orders = Order::whereHas('order_product', function ($query) use ($industryGroupId) {
            $query->where('industry_group_id', $industryGroupId);
        })
            ->where('order_business_group_id', $business);

        $business_group = OrderBusinessGroup::where('industry_group_id', $industryGroupId)
            ->find($business);

        $industry = data_get((clone $orders)->first(), 'order_product.industry_group');

        $packages = (clone $orders)->groupBy('package_id')->get();
        if (str_contains(url()->previous(), 'invoice')) {
            $total_price = (clone $orders)->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')->sum('order_products.price');
            $pdf = \PDF::loadView('market/management/document/generatePdf', [
                'orders' => $orders->get()->groupBy('order_product_id'),
                'business_group' => $business_group,
                'industry' => $industry,
                'total_price' => $total_price,
                'packages' => $packages
            ]);
            return $pdf->download('販売代金請求書.pdf');
        } else {
            $orders = Order::select('*')->selectRaw('sum(orders.weight) as total_weight')->whereHas('order_product', function ($query) use ($industryGroupId) {
                $query->where('industry_group_id', $industryGroupId);
            })
                ->where('orders.m_business_id', $business_group->m_business_id)
                ->where('orders.shipping_status', '>=', 2)
                ->where('orders.shipping_date', $business_group->shipping_date);

                $total_price = (clone $orders)->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')->sum('order_products.price');
                $pdf = \PDF::loadView('market/management/document/generateSupplyPdf', [
                'business_group' => $business_group,
                'orders' => $orders->selectRaw('count(*) as product_count')->groupBy('orders.order_product_id')->get(),
                'packages' => $orders->groupBy('package_id')->select('package_id')->distinct()->get(),
                'total_price' => $total_price,
            ]);
            return $pdf->download('納品書.pdf');
        }
    }
}
