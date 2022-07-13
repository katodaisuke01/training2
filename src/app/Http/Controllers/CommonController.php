<?php

namespace App\Http\Controllers;

class CommonController extends Controller
{
  public function index(){return view('index');}
  public function about(){return view('common/about');}
  public function privacy(){return view('common/privacy');}
  public function security(){return view('common/security');}
  public function terms(){return view('common/terms');}
  public function faq(){return view('common/faq');}
  public function sitemap(){return view('common/sitemap');}
  // 診断ページ
  public function diagnose(){return view('common/diagnose/index');}
  public function question(){return view('common/diagnose/question');}
  public function result(){return view('common/diagnose/result');}
  // コンテンツページ
  // 公式からのコンテンツ
  public function content(){return view('common/content/index');}
  public function contentDetail(){return view('common/content/detail');}
  // ヘッダーの検索結果のペーじ
  public function searchResult(){return view('common/search');}
}