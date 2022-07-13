@extends('layouts.admin.default')

@section('page_class', 'l-form')
@section('title', 'お問合せ管理 詳細')
@section('page_title', '株式会社インターコンチネンタル様からのお問い合わせ')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--mail"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="p-form__body c-concave">
          <div class="p-info">
            <div class="p-info__body">
              <div class="l">
                <div class="l-fix__150">
                  <div class="c-image__logo" style="background-image:url({{ asset('../image/sample/company/img_2.png') }})"></div>
                </div>
                <div class="l-auto">
                  <p class="c-text__main c-text__weight--700 c-text__lv4">株式会社インターコンチネンタル<span class="c-text__lv6">様からのお問い合わせです。</span></p>
                </div>
              </div>
            </div>
          </div>
          <ul class="p-list__wrap">
            <li>
              <div class="head">
                <p>対応ステータス</p>
              </div>
              <div class="body">
                <div class="c-radio c-switch">
                  <input type="radio" name="publish" id="1" >
                  <label for="1">対応済</label>
                  <input type="radio" name="publish" id="2" checked>
                  <label for="2">未対応</label>
                </div>
              </div>
            </li>
            <li>
              <div class="head">
                <p>お問合せ日時</p>
              </div>
              <div class="body">
                <p>
                {{ date('Y/m/d H:i') }}
                </p>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>お問合せジャンル</p>
              </div>
              <div class="body">
                <p class="c-text__lv4">利用方法について</p>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>お問合せタイトル</p>
              </div>
              <div class="body">
                <p class="c-text__lv4">利用方法について教えてください</p>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>お問合せ内容</p>
              </div>
              <div class="body">
                <p class="">利用方法について教えてください</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{ route('adminContact') }}" class="c-button__min c-button__gray">戻る</a>
            <input class="c-button" type="submit" value="保存する">
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
