@section('page_class', 'l-page p-setting')
@section('title', '運営会社')
@section('description', 'このページはミキワメ転職の運営会社についてのページです。')
@section('page_title', '運営会社 | ミキワメ転職')
@extends('layouts.user.default')

@section('content')
  @component('component.user.frame._default_short')
    @slot('body')
      <div class="c-box c-box__600 bg-fff">
        <div class="c-box__body">
          <ul class="p-list__border p-list__row">
            <li>
              <div class="head">
                <p class="">会社名</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">株式会社スタープロジェクト</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">URL</p>
              </div>
              <div class="body">
                <p class="c-text__lv5"><a href="http://www.starproject.jp/" target="_blanc" rel="noopener noreferrer">http://www.starproject.jp/</a></p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">代表者名</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">阿部 裕之</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">設立年月</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">2020年1月</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">本社所在地</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">千葉県</p>
                <p class="c-text__lv5">松戸市松戸1834-15</p>
                <p class="c-text__lv5">キュービック松戸ビル6F-A</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">電話番号</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">047-710-0304</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">FAX番号</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">047-710-0305</p>
              </div>              
            </li>
            <li>
              <div class="head">
                <p class="">事業内容</p>
              </div>
              <div class="body">
                <p class="c-text__lv5">人材紹介業</p>
              </div>              
            </li>
          </ul>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
