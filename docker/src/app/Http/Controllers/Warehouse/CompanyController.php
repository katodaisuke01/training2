<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Requests\UpdateWarehouseCompany;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $m_business = $user->m_business()->first();

        return view('warehouse/company/index', ['m_business' => $m_business]);
    }

    /**
     * @return Application|Factory|View
     */
    public function edit()
    {
        $user = Auth::user();
        $m_business = $user->m_business()->first();

        return view('warehouse/company/edit', ['m_business' => $m_business]);
    }

    /**
     * @param UpdateWarehouseCompany $request
     * @return RedirectResponse
     */
    public function update(UpdateWarehouseCompany $request)
    {
        $user = Auth::user();
        $params = $request->all();

        if (isset($params['image'])) {
            // バケットの`m_business`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('m_business', $params['image']);
            $params['image_path'] = $path;
        }
        $params['prefecture_name'] = config('prefecture')[$params['prefecture']];
        $params['delivery_prefecture_name'] = config('prefecture')[$params['delivery_prefecture']];

        $m_business = $user->m_business()->first();
        $m_business->update($params);
        $m_business->save();

        return redirect()
            ->route('warehouse.company.index')
            ->with('flash_message', '更新が完了しました。');
    }
}
