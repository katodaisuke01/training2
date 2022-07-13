<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Stock;
use App\Models\OrderStock;
use App\Models\OrderProduct;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function landing(Request $request)
    {
        $user = Auth::user();
        $query = $request->all();
        $products = OrderProduct::where('industry_group_id', $user->industry_group_id)
            ->get();

        return view('market/management/landing/index', [
            'query' => $query,
            'products' => $products,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$request->get('landing')) {
            return back()->withInput()->with('flash_message', '登録に失敗しました。');
        }

        foreach ($request->get('landing') as $k => $v) {
            if (!isset($v['quantity']) && !isset($v['weight'])) {
                continue;
            }

            $product = OrderProduct::where('industry_group_id', $user->industry_group_id)
                ->find($k);
            $stock = Stock::where('order_product_id', $k)
                ->whereHas('order_product', function ($query) use ($user) {
                    $query->where('industry_group_id', $user->industry_group_id);
                })
                ->where('landing_date', date('Y-m-d', strtotime($request->get('landing_date'))))
                ->first();

            DB::begintransaction();
            try {
                if ($stock) {
                    $stock->total_quantity = $v['quantity'] ?? null;
                    $stock->total_weight = $v['weight'] ?? null;
                    $stock->update();
                } else {
                    $stock = new Stock();
                    $stock->order_product_id = $k;
                    $stock->total_quantity = $v['quantity'] ?? null;
                    $stock->total_weight = $v['weight'] ?? null;
                    $stock->landing_date = date('Y-m-d', strtotime($request->get('landing_date')));
                    $stock->save();
                }
                OrderStock::createByProduct($product, $v, $stock->id);
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withInput()->with('flash_message', '登録に失敗しました。');
            }
            DB::commit();
        }

        return back()->withInput()->with('flash_message', '登録に成功しました。');
    }

    public function landingHistory(Request $request)
    {
        $user = Auth::user();
        $query = Stock::query()->order_product()->where('industry_group_id', $user->industry_group_id);

        if ($request->get('landing_from_date')) {
            $query->where('stocks.landing_date', '>=', date('Y-m-d', strtotime($request->get('landing_from_date'))));
        }
        if ($request->get('landing_to_date')) {
            $query->where('stocks.landing_date', '<=', date('Y-m-d', strtotime($request->get('landing_to_date'))));
        }

        $stocks = $query->orderBy('landing_date', 'desc')->get();

        return view('market/management/landing/history', [
            'request' => $request->all(),
            'stocks' => $stocks
        ]);
    }
}
