@extends('layouts.admin.default')

@section('page_class', '')
@section('title', 'その他設定')

@section('content')
  @component('component.admin.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
    <!-- 一覧 -->
    <div class="l-12 l-12--gap16">
      <div class="l-6">
        <div class="c-box bg-fff">
          <div class="c-box__head">
            <p class="c-text__lv4 c-text__main c-text__weight--700">運営会社</p>
            <div class="c-buttonArea__end">
              <a href="{{ route('adminSettingEdit1') }}" class="c-button__min">編集</a>
            </div>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv6">{{ date('Y/m/d H:i') }}<span class="c-text__unit">更新<span></p>
          </div>
        </div>
      </div>
      <div class="l-6">
        <div class="c-box bg-fff">
          <div class="c-box__head">
            <p class="c-text__lv4 c-text__main c-text__weight--700">プライバシーポリシー</p>
            <div class="c-buttonArea__end">
              <a href="{{ route('adminSettingEdit2') }}" class="c-button__min">編集</a>
            </div>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv6">{{ date('Y/m/d H:i') }}<span class="c-text__unit">更新<span></p>
          </div>
        </div>
      </div>
      <div class="l-6">
        <div class="c-box bg-fff">
          <div class="c-box__head">
            <p class="c-text__lv4 c-text__main c-text__weight--700">セキュリティーポリシー</p>
            <div class="c-buttonArea__end">
              <a href="{{ route('adminSettingEdit3') }}" class="c-button__min">編集</a>
            </div>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv6">{{ date('Y/m/d H:i') }}<span class="c-text__unit">更新<span></p>
          </div>
        </div>
      </div>
      <div class="l-6">
        <div class="c-box bg-fff">
          <div class="c-box__head">
            <p class="c-text__lv4 c-text__main c-text__weight--700">利用規約</p>
            <div class="c-buttonArea__end">
              <a href="{{ route('adminSettingEdit4') }}" class="c-button__min">編集</a>
            </div>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv6">{{ date('Y/m/d H:i') }}<span class="c-text__unit">更新<span></p>
          </div>
        </div>
      </div>
      <div class="l-6">
        <div class="c-box bg-fff">
          <div class="c-box__head">
            <p class="c-text__lv4 c-text__main c-text__weight--700">よくある質問</p>
            <div class="c-buttonArea__end">
              <a href="{{ route('adminSettingEdit5') }}" class="c-button__min">編集</a>
            </div>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv6">{{ date('Y/m/d H:i') }}<span class="c-text__unit">更新<span></p>
          </div>
        </div>
      </div>
    </div>
      
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
