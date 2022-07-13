<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryGroup;
use App\Models\Prooduct;
use App\Models\Package;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::select(['orders.*', 'order_products.industry_group_id as industry_id'])
            ->with(['m_business', 'order_product.m_category', 'order_product.m_fish_category'])
            ->whereDate('shipping_date', date('Y-m-d'))
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->leftJoin('industry_groups', 'industry_groups.id', '=', 'order_products.industry_group_id')
            ->get();

        return view('solaseed/order/index', [
            'industries' => IndustryGroup::all(),
            'orders' => $orders,
        ]);
    }

    public function orderList(IndustryGroup $industry)
    {
        $query = Order::select(['orders.*', 'order_products.id as product_id'])
            ->where('shipping_date', date('Y-m-d'))
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->where('order_products.industry_group_id', $industry->id);

        $count = $query->count();
        $orders = $query
            ->get()
            ->groupBy('product_id');

        return view('solaseed/order/list', [
            'industry' => $industry,
            'count' => $count,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
