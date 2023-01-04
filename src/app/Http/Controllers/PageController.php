<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
  public function index()
  {
    return view('index');
  }
  public function oas()
  {
    return view('oas/index');
  }

  public function dashboard()
  {
    return view('admin/index');
  }
  public function user()
  {
    return view('admin/user/index');
  }
  public function userDetail()
  {
    return view('admin/user/detail');
  }
  public function company()
  {
    return view('admin/company/index');
  }
  public function message()
  {
    return view('admin/message/index');
  }
  public function contact()
  {
    return view('admin/contact/index');
  }
  public function post()
  {
    return view('admin/post/index');
  }
  public function master()
  {
    return view('admin/master/index');
  }
  public function setting()
  {
    return view('admin/setting/index');
  }
}
