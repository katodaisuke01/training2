@extends('layouts.admin.default')

@section('page_class', 'l-company')
@section('title', '求人一覧')
@section('page_title', '株式会社MIKIWAME')

@section('content')
  @component('component.admin.frame._user')
    @slot('head')
      <div class="c-icon__w32 c-icon--user"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      <div class="p-tab">
        <ul class="p-list__tab">
          <li class="tab c-tab--a active"><p>企業プロフィール</p></li>
          <li class="tab c-tab--b"><p>メッセージ</p></li>
          <li class="tab c-tab--c"><p>各種設定</p></li>
        </ul>
        <div class="p-content">
          <div class="c-content c-tab--a show">
            <div class="c-content__head">
              @include('component.company._profile_head')
            </div>
            <div class="c-content__head">
              @include('component.company._profile_body')
            </div>
          </div>
          <div class="c-content c-tab--b">
            <div class="c-concave">
              <div class="p-scroll__height--600">
              @include('component.chart._c-table__company--2')
              </div>
            </div>
          </div>
          <div class="c-content c-tab--c">
            <div class="c-concave">
              @include('component.company._setting')
            </div>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent

@endsection
