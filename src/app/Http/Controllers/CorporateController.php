<?php

namespace App\Http\Controllers;

class CorporateController extends Controller
{
  public function corporate(){return view('user/corporate/index');}
  public function job(){return view('user/corporate/job/index');}
  public function apply(){return view('user/corporate/job/apply');}
  public function applied(){return view('user/corporate/job/applied');}
  public function post(){return view('user/corporate/post/index');}
  public function postDetail(){return view('user/corporate/post/detail');}
}
