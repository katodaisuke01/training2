<?php

namespace App\Http\Controllers\Industry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Package;
use App\Models\Stock;
use App\Models\OrderPackage;
use App\Models\OrderGroup;
use App\Models\OrderStock;
use App\Models\OrderBusinessGroup;
use App\Models\WorkLog;
use App\Models\MCategory;
use App\Models\MFishCategory;
use App\Models\MBusiness;
use App\Models\MProcess;
use App\Models\MUnit;
use App\Http\Requests\StoreWorkFlow;
use Carbon\Carbon;
use Storage;
use DB;

class ProductRegisterController extends Controller
{
    public function imageRegister(Request $request)
    {
        $imageData = base64_decode($request->get('image_path'));

        // 対象の在庫
        $order = OrderStock::find($request->get('order_stock_id'));
        $request->offsetUnset('order_stock_id');
        $params = $request->all();
        $fileName = \Str::random(40) . '.png';
        $path = 'orders/' . $fileName;
        Storage::disk('s3')->put($path, $imageData);

        $order->image_path = $path;
        $order->update();

        return response()->json($params);
    }

    public function weightRegister(Request $request)
    {
        if (!empty($request->get('weight')) || $request->get('weight') != null || $request->get('weight') != '') {
            // 対象の注文商品
            $order = OrderStock::find($request->get('order_stock_id'));
            $request->offsetUnset('order_stock_id');
            $params = $request->all();
            $order->weight = $request->get('weight') * 1000; // g単位
            $order->update();

            return response()->json($params);
        }
    }

    public function register()
    {
        // 空の在庫を作成
        $order_stock = OrderStock::create();

        return view('market/home/register', [
            'order_stock' => $order_stock,
            'categoryList' => MCategory::select('id', 'name')->whereNull('deleted_at')->get(),
            'FishCategoryList' => MFishCategory::all(),
            'BusinessCategoryList' => MBusiness::select('id', 'name')->whereNull('deleted_at')->get(),
            'ProcessCategoryList' => MProcess::select('id', 'name')->whereNull('deleted_at')->get(),
            'unitCategoryList' => MUnit::select('id', 'name')->whereNull('deleted_at')->get(),
            'orderProductList' => OrderProduct::all(),
        ]);
    }

    public function getProductInfo(Request $request)
    {
        $order_stock = OrderStock::find($request->get('order_stock_id'));
        DB::beginTransaction();
        try {
            // その日の最初の作業でStockのレコードを作成
            if ($stock = Stock::where('landing_date', date('Y-m-d'))->where('order_product_id', $request->get('order_product_id'))->first()):
                $stock->total_quantity += 1;
                $stock->update();
            else:
                $stock = $stock = Stock::where('landing_date', date('Y-m-d'))->where('order_product_id', $request->get('order_product_id'))->first();
                $stock = Stock::create([
                    'order_product_id' => $request->get('order_product_id'),
                    'landing_date' => date('Y-m-d'),
                    'total_quantity' => 1,
                ]);
            endif;
            $order_stock->order_product_id = $request->get('order_product_id');
            $order_stock->stock_id = $stock->id;
            $order_stock->update();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => '取得失敗']);
        }
        DB::commit();

        $params = [];
        $params['product_image'] = data_get($order_stock, 'order_product.image_path');
        $params['industry_address'] = data_get($order_stock, 'order_product.industry_group.display_address') . '' . data_get($order_stock, 'order_product.industry_group.display_address2');
        $params['industry_name'] = data_get($order_stock, 'order_product.industry_group.name');
        $params['prefecture'] = data_get($order_stock, 'order_product.industry_group.prefecture_name');
        $params['toleranse'] = data_get($order_stock, 'order_product.tolerance');

        return response()->json($params);
    }
}
