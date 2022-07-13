@extends('layouts.admin.default')

@section('page_class', 'l-user')
@section('title', 'ユーザー管理 詳細')
@section('page_title', '山田 陽子さん')

@section('content')
  @component('component.admin.frame._user')
    @slot('head')
      <div class="c-icon__w32 c-icon--user"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
      <div class="p-tab">
        <ul class="p-list__tab">
          <li class="tab c-tab--a active"><p>プロフィール</p></li>
          <li class="tab c-tab--b"><p>求人アプローチ状況</p></li>
          <li class="tab c-tab--c"><p>メッセージ</p></li>
        </ul>
        <div class="p-content">
          <div class="c-content c-tab--a show">
            @include('component.user._profile_head')
            @include('component.user._profile_body')
          </div>
          <div class="c-content c-tab--b">
            @include('component.user._profile_approach')
          </div>
          <div class="c-content c-tab--c">
            @include('component.user._profile_messageList')
          </div>
        </div>
        
      </div>
    @endslot
  @endcomponent

@endsection
