<?php

namespace App\Http\Controllers\Industry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{
    // 管理画面
    public function admin()
    {
        return view('admin/home/index');
    }

    public function login()
    {
        return view('admin/login/index');
    }

    public function forget()
    {
        return view('admin/login/forget');
    }

    public function complete()
    {
        return view('admin/login/complete');
    }


    public function index()
    {
        return view('market/home/index');
    }

    public function auth()
    {
        return view('market/auth/index');
    }

    public function reset()
    {
        return view('market/auth/reset');
    }

    public function resetComplete()
    {
        return view('market/auth/resetComplete');
    }

    public function detailFish()
    {
        return view('market/home/detailFish');
    }

    public function detailCompany()
    {
        return view('market/home/detailCompany');
    }

    public function workflow()
    {
        return view('market/home/workflow');
    }

//産地管理画面 ————————————————————————————————————————————————————
    public function management()
    {
        return view('market/management/index');
    }

    public function order()
    {
        return view('market/management/order/index');
    }

    public function detail()
    {
        return view('market/management/order/detail');
    }

    public function master()
    {
        return view('market/management/master/index');
    }

    public function item()
    {
        return view('market/management/item/index');
    }

    public function create()
    {
        return view('market/management/item/create');
    }

    public function edit()
    {
        return view('market/management/item/edit');
    }

    public function staff()
    {
        return view('market/management/staff/index');
    }

    public function staffCreate()
    {
        return view('market/management/staff/staffCreate');
    }

    public function staffDetail()
    {
        return view('market/management/staff/staffDetail');
    }

    public function staffEdit()
    {
        return view('market/management/staff/staffEdit');
    }

    public function pwEdit()
    {
        return view('market/management/staff/pwEdit');
    }

    public function manager()
    {
        return view('market/management/manager/index');
    }

    public function managerCreate()
    {
        return view('market/management/manager/create');
    }

    public function managerEdit()
    {
        return view('market/management/manager/edit');
    }

    public function managerPwEdit()
    {
        return view('market/management/manager/pwEdit');
    }


}
