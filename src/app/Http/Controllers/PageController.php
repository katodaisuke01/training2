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
  public function admin()
  {
    return view('admin/index');
  }
}
