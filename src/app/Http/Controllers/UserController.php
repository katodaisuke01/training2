<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
  public function login(){return view('user/auth/login');}
  public function reset(){return view('user/auth/reset');}
  public function sent(){return view('user/auth/sent');}
  public function register(){return view('user/auth/register');}
  public function confirm(){return view('user/auth/confirm');}
  public function complete(){return view('user/auth/complete');}
  public function withdrawal(){return view('user/auth/withdrawal');}
  // マイページ
  public function mypage(){return view('user/index');}
  public function edit1(){return view('user/edit1');}
  public function edit2(){return view('user/edit2');}
  public function edit3(){return view('user/edit3');}
  public function pw(){return view('user/pw');}
  public function message(){return view('user/message/index');}
  public function messageDetail(){return view('user/message/detail');}
  public function information(){return view('user/information/index');}
  public function informationDetail(){return view('user/information/detail');}
  public function ban(){return view('user/ban');}
  public function favorite(){return view('user/favorite');}
  public function entry(){return view('user/entry');}
  public function curiosity(){return view('user/curiosity');}
  public function scout(){return view('user/scout');}
  
}