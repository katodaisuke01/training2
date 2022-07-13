<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:worker');
    }

    public function mypage()
    {
        return view('worker/account/index');
    }

    public function edit()
    {
        return view('worker/account/edit');
    }

    public function editPassword()
    {
        return view('worker/account/password');
    }

}
