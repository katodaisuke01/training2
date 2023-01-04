@extends('admin.layouts.default')

@section('page_class', 'l-admin l-body')
@section('description', 'ダッシュボードです')
@section('title', 'ダッシュボード')

@section('content')
  @component('admin.layouts.frame._default')
    @slot('home')
    
    @endslot
    @slot('head')
      <div class="c-icon__w24 c-icon--layout"></div>
      <h2 class="c-text__lv3 c-text__weight--700">@yield('title')</h2>
    @endslot
    @slot('body')
      <div class="l-grid--3">
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">
              今月の売上
            </h3>
            <a href="" class="c-button__min c-right">売上管理へ</a>
          </div>
          <div class="l-grid--item__body">
            <div class="c-text__lv3 c-text__weight--700 c-border__bottom u-mgb8">¥1,240,180</div>
            <p>123</p>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">最新のお知らせ</h3>
          </div>
          <div class="l-grid--item__body">
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text c-right">お知らせ管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">カテゴリ別売上</h3>
          </div>
          <div class="l-grid--item__body">
            <h4>今月のカテゴリ別売上金額</h4>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text c-right" target="_blanc">カテゴリ管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">商品ランキング</h3>
          </div>
          <div class="l-grid--item__body">
            <p>過去30日間の売上ランキング</p>
            12311555<br>
            12311555<br>
            12311555
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text">商品管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">最新の売上</h3>
          </div>
          <div class="l-grid--item__body">
            <p>最新の購入情報</p>
            12311555<br>
            12311555<br>
            12311555
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text">売上管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">最新のお問合せ</h3>
          </div>
          <div class="l-grid--item__body">
            <p>お客様からの最新のお問合せ一覧</p>
            12311555<br>
            12311555<br>
            12311555
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text">お問合せ管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">カテゴリ別売上</h3>
          </div>
          <div class="l-grid--item__body">
            <h4>今月のカテゴリ別売上金額</h4>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
            <p>12311555</p>
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text c-right">お知らせ管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">商品ランキング</h3>
          </div>
          <div class="l-grid--item__body">
            <p>過去30日間の売上ランキング</p>
            12311555<br>
            12311555<br>
            12311555
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text">商品管理に移動</a>
          </div>
        </div>
        <div class="l-grid--item c-bulge">
          <div class="l-grid--item__head">
            <h3 class="title c-text__lv4 c-text__weight--700">最新の売上</h3>
          </div>
          <div class="l-grid--item__body">
            <p>最新の購入情報</p>
            12311555<br>
            12311555<br>
            12311555
          </div>
          <div class="l-grid--item__foot">
            <a href="" class="c-button__text">売上管理に移動</a>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent
@endsection
