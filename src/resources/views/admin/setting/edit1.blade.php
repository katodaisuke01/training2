@extends('layouts.admin.default')

@section('page_class', 'l-form')
@section('title', 'その他設定 編集')
@section('page_title', '運営会社')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="p-form__body c-concave">
          <ul class="p-list__wrap">
            <li class="c-full">
              <div class="head">
                <p>会社名</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" placeholder="例）株式会社MIKIWAME" value="株式会社スタープロジェクト">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>URL</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="例）http://www.mikiwame.jp/" value="http://www.starproject.jp/">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>代表者名</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" placeholder="例）山田 太郎" value="阿部 裕之">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>設立年月</p>
              </div>
              <div class="body">
                <div class="c-input__150">
                  <input type="text" placeholder="例）2020年1月" value="2020年1月">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>本社所在地</p>
              </div>
              <div class="body">
                <div class="c-input__100">
                  <input type="text" placeholder="東京都" value="千葉県">
                </div>
                <div class="c-input__300">
                  <input type="text" placeholder="中央区銀座1-1-1" value="松戸市松戸1834-15">
                </div>
              </div>
              <div class="foot">
                <div class="c-input__300">
                  <input type="text" placeholder="銀座ビル10F" value="キュービック松戸ビル6F-A">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>電話番号</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" placeholder="例）03-1234-5678" value="047-710-0304">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>FAX番号</p>
              </div>
              <div class="body">
                <div class="c-input__300">
                  <input type="text" placeholder="例）03-1234-5678" value="047-710-0305">
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>事業内容</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="例）人材派遣業" value="人材紹介業">
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{ route('adminSetting') }}" class="c-button__min c-button__gray">戻る</a>
            <a href="?flash=successSave" class="c-button">保存する</a>
            <!-- <input class="c-button" type="submit" value="保存する"> -->
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
