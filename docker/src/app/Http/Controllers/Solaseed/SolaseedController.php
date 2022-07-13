<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryGroup;
use App\Models\Prooduct;
use App\Models\Package;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SolaseedController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $package_count = Package::where('shipping_date', date('Y-m-d'))
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->where(function ($_q) {
                $_q->where('pack_status', Package::TYPE_CONFIRMED)
                    ->orwhere('pack_status', Package::TYPE_PICKUP);
            })
            ->count();

        $checkin_count = Package::where('shipping_date', date('Y-m-d'))
            ->where('delivery_partnar_id', $user->delivery_partnar_id)
            ->where(function ($_q) {
                $_q->where('pack_status', Package::TYPE_CHECKED_IN);
            })
            ->count();

        $order_count = Order::select(['orders.*', 'order_products.industry_group_id as industry_id'])
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->where('shipping_date', date('Y-m-d'))
            ->leftJoin('order_products', 'order_products.id', '=', 'orders.order_product_id')
            ->leftJoin('industry_groups', 'industry_groups.id', '=', 'order_products.industry_group_id')
            ->count();

        $not_pickuped_package_count = Package::where('shipping_date', date('Y-m-d'))
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->where(function ($_q) {
                $_q->where('pack_status', Package::TYPE_CONFIRMED);
            })
            ->count();

        return view('solaseed/index', [
            'user' => $user,
            'package_count' => $package_count,
            'checkin_count' => $checkin_count,
            'order_count' => $order_count,
            'not_pickuped_package_count' => $not_pickuped_package_count,
        ]);
    }
}
