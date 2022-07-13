<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateManagementCompany;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $industry_group = $user->industry_group()->first();

        return view('market/management/company/index', ['industry_group' => $industry_group]);
    }

    public function detail()
    {
        return view('market/management/company/detail');
    }

    public function create()
    {
        return view('market/management/company/create');
    }

    public function edit()
    {
        $user = Auth::user();
        $industry_group = $user->industry_group()->with('users')->first();

        return view('market/management/company/edit', ['industry_group' => $industry_group]);
    }

    public function update(UpdateManagementCompany $request)
    {
        $user = Auth::user();
        $params = $request->all();

        if (isset($params['image'])) {
            // バケットの`industry_groups`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('industry_groups', $params['image']);
            $params['image_path'] = $path;
        }
        $params['prefecture_name'] = config('prefecture')[$params['prefecture']];
        $params['pickup_prefecture_name'] = config('prefecture')[$params['pickup_prefecture']];

        if (isset($params['user_name'])) {
            $responsible_name = explode(' ', $params['user_name']);
            $params['responsible_last_name'] = $responsible_name[0];
            $params['responsible_first_name'] = $responsible_name[1];
        }

        $industry_group = $user->industry_group()->first();
        $industry_group->update($params);
        $industry_group->save();

        return redirect()
            ->route('admin.company.index')
            ->with('flash_message', '更新が完了しました。');
    }
}
