<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderProduct;
use App\Http\Requests\UpdateOrderProduct;
use App\Models\MCategory;
use App\Models\MFishCategory;
use App\Models\MBusiness;
use App\Models\MProcess;
use App\Models\MUnit;
use App\Models\OrderProduct;
use DB;
use Storage;

class ItemController extends Controller
{
    // public function __construct(
    //     ItemSearch $item_search,
    //     ItemRepositoryInterface $item_repository
    // ) {
    //     $this->item_search = $item_search;
    //     $this->item_repository = $item_repository;
    // }

    public function index(Request $request)
    {
        $categoryList = MCategory::select('id', 'name')->get();
        $products = OrderProduct::query()
            ->whereNull('deleted_at')
            ->where('status', 1)
            ->categorySort($request->get('category'))
            ->keywordSearch($request->get('keyword'))
            ->get();

        return view('market/management/item/index', [
            'categoryList' => $categoryList,
            'query' => $products,
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('market/management/item/create', [
            'categoryList' => MCategory::select('id', 'name')->whereNull('deleted_at')->get(),
            'FishCategoryList' => MFishCategory::all(),
            'BusinessCategoryList' => MBusiness::select('id', 'name')->whereNull('deleted_at')->get(),
            'ProcessCategoryList' => MProcess::select('id', 'name')->whereNull('deleted_at')->get(),
            'unitCategoryList' => MUnit::select('id', 'name')->whereNull('deleted_at')->get(),
            'colorList' => ["ffffff","ffeeee","ffffee","eeffee","eeffff","eeeeff","ffeeff","eeeeee","ffdddd","ffffdd","ddffdd","ddffff","ddddff","ffddff","dddddd","ffcccc","ffffcc","ccffcc","ccffff","ccccff","ffccff","cccccc","ffbbbb","ffffbb","bbffbb","bbffff","bbbbff","ffbbff","bbbbbb","ff9999","ffff99","99ff99","99ffff","9999ff","ff99ff","aaaaaa","ff7777","ffff77","77ff77","77ffff","7777ff","ff77ff","999999","ff5555","ffff55","55ff55","55ffff","5555ff","ff55ff","888888","ff3333","ffff33","33ff33","33ffff","3333ff","ff33ff","777777","ff2222","ffff22","22ff22","22ffff","2222ff","ff22ff","666666","ff1111","ffff11","11ff11","11ffff","1111ff","ff11ff","555555","ff0000","ffff00","00ff00","00ffff","0000ff","ff00ff","333333","ee0000","eeee00","00ee00","00eeee","0000ee","ee00ee","000000","dd0000","dddd00","00dd00","00dddd","0000dd","dd00dd","FFF2F2","FFFAD7","FCFFFA","FAFFFD","F5FAFF","FFF3FF","FFF5F9","FFE5E5","FFF0BC","F6FFE5","E5FFF7","E6EFFF","F8E4FF","FFEBF3","FFD8D8","FFE6A1","F2FFD5","D0FFF1","D7E4FF","F1D5FF","FFE1ED","FFCBCB","FFDC86","EEFFC5","BBFFEB","C8D9FF","EAC6FF","FFD7E7","FFBEBE","FFD26B","EAFFB5","A6FFE5","B9CEFF","E3B7FF","FFCDE1","FFB1B1","FFC850","E6FFA5","91FFDF","AAC3FF","DCA8FF","FFC3DB","FFA3A3","FFBE35","E2FF95","7AFFD8","99BAFF","D799FF","FFB9D5","E58F8F","FFB800","E1FF85","38F9D1","84A2E6","CC98E7","FFAECC","CB7B7B","E29B00","BDDD77","2DD8B4","6E8CCF","BB7DD4","E091B1","B16767","C38000","99BB5F","24B996","5876B8","A864BE","C17496","975353","A46500","759947","1B9A78","4260A1","954BA8","A2577B","7D3F3F","854A00","51772F","127B5A","2C4A8A","823292","833A60","632B2B","662F00","2D5517","095C3C","163473","6F197C","641D45","491717","471400","0A3300","003D1E","001E5C","5C0066","470028"],
        ]);
    }

    public function store(StoreOrderProduct $request)
    {
        $params = $request->all();

        try {
            OrderProduct::create([
                'm_category_id' => $params['category_id'],
                'm_fish_category_id' => $params['fish_category'],
                'm_process_id' => $params['process_id'] ?? 1,
                'm_unit_id' => $params['unit_id'],
                'base_weight' => $params['base_weight'],
                'tolerance' => $params['tolerance'] ?? '',
                'landing_configuration' => $params['landing_configuration'] ?? '',
                'purification_configuration' => $params['purification_configuration'] ?? '',
                'title' => $params['title'],
                'article' => $params['article'],
                'max_quantity' => $params['max_quantity'],
                'dealing_type' => $params['dealing_type'],
                'natural_type' => $params['natural_type'],
                'status' => '1',
                'image_path' => isset($params['image']) ? Storage::disk('s3')->putFile('order_products', $params['image']) : null,
                'price' => $params['price'],
                'industry_group_id' => \Auth::user()->industry_group_id,
                // 入力がない場合はグレー
                'color' => $params['color'] ?? 'eeeeee',
            ]);

            return redirect(route('admin.management.item.index'))->with('flash_message', '登録が完了しました。');
        } catch (\Exception $e) {
            dd($e);

            return back()->withInput()->with('flash_message', '登録に失敗しました。');
        }
    }

    public function edit(Request $request, OrderProduct $product)
    {
        return view('market/management/item/edit', [
            'categoryList' => MCategory::select('id', 'name')->get(),
            'FishCategoryList' => MFishCategory::select('id', 'name')->get(),
            'BusinessCategoryList' => MBusiness::select('id', 'name')->get(),
            'ProcessCategoryList' => MProcess::select('id', 'name')->get(),
            'unitCategoryList' => MUnit::select('id', 'name')->get(),
            'product' => $product,
            'colorList' => ["ffffff","ffeeee","ffffee","eeffee","eeffff","eeeeff","ffeeff","eeeeee","ffdddd","ffffdd","ddffdd","ddffff","ddddff","ffddff","dddddd","ffcccc","ffffcc","ccffcc","ccffff","ccccff","ffccff","cccccc","ffbbbb","ffffbb","bbffbb","bbffff","bbbbff","ffbbff","bbbbbb","ff9999","ffff99","99ff99","99ffff","9999ff","ff99ff","aaaaaa","ff7777","ffff77","77ff77","77ffff","7777ff","ff77ff","999999","ff5555","ffff55","55ff55","55ffff","5555ff","ff55ff","888888","ff3333","ffff33","33ff33","33ffff","3333ff","ff33ff","777777","ff2222","ffff22","22ff22","22ffff","2222ff","ff22ff","666666","ff1111","ffff11","11ff11","11ffff","1111ff","ff11ff","555555","ff0000","ffff00","00ff00","00ffff","0000ff","ff00ff","333333","ee0000","eeee00","00ee00","00eeee","0000ee","ee00ee","000000","dd0000","dddd00","00dd00","00dddd","0000dd","dd00dd","FFF2F2","FFFAD7","FCFFFA","FAFFFD","F5FAFF","FFF3FF","FFF5F9","FFE5E5","FFF0BC","F6FFE5","E5FFF7","E6EFFF","F8E4FF","FFEBF3","FFD8D8","FFE6A1","F2FFD5","D0FFF1","D7E4FF","F1D5FF","FFE1ED","FFCBCB","FFDC86","EEFFC5","BBFFEB","C8D9FF","EAC6FF","FFD7E7","FFBEBE","FFD26B","EAFFB5","A6FFE5","B9CEFF","E3B7FF","FFCDE1","FFB1B1","FFC850","E6FFA5","91FFDF","AAC3FF","DCA8FF","FFC3DB","FFA3A3","FFBE35","E2FF95","7AFFD8","99BAFF","D799FF","FFB9D5","E58F8F","FFB800","E1FF85","38F9D1","84A2E6","CC98E7","FFAECC","CB7B7B","E29B00","BDDD77","2DD8B4","6E8CCF","BB7DD4","E091B1","B16767","C38000","99BB5F","24B996","5876B8","A864BE","C17496","975353","A46500","759947","1B9A78","4260A1","954BA8","A2577B","7D3F3F","854A00","51772F","127B5A","2C4A8A","823292","833A60","632B2B","662F00","2D5517","095C3C","163473","6F197C","641D45","491717","471400","0A3300","003D1E","001E5C","5C0066","470028"],
        ]);
    }

    public function update(UpdateOrderProduct $request, OrderProduct $product)
    {
        $params = $request->all();
        unset($params['_token']);

        DB::beginTransaction();
        try {
            if (isset($params['image'])) {
                // バケットの`order_products`フォルダへアップロード
                $path = Storage::disk('s3')->putFile('order_products', $params['image']);
                $params['image_path'] = $path;
            }

            $product->fill($params)->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '更新に失敗しました。');
        }
        DB::commit();

        return redirect()->to(route('admin.item.index'))->with('flash_message', '更新に成功しました。');
    }

    public function destroy(Request $request, OrderProduct $product)
    {
        DB::beginTransaction();
        try {
            $product->fill(['deleted_at' => \Carbon::now()->format('Y-m-d H:i:s')])->save();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '更新に失敗しました。');
        }
        DB::commit();

        return redirect()->to(route('admin.item.index'))->with('flash_message', '更新に成功しました。');
    }
}
