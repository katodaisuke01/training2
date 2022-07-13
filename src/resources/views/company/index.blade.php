@extends('layouts.company.default')

@section('page_class', 'l-home l-company')
@section('title', 'ダッシュボード')
@section('page_title', '株式会社MIKIWAME')

@section('content')
  @component('component.company.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--layout"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      <div class="p-alert">
        <ul class="p-list__wrap">
          <li data-href="{{route('companyMessage')}}">
            <div class="c-box bg-fff c-border">
              <div class="c-box__body f-a_center">
                <p class="c-text__lv4 c-text__main c-text__weight--700">新着メッセージ</p>
                <p class="c-text__lv2 c-text__main c-text__weight--900">3<span class="c-text__lv4 c-text__main">通</span></p>
              </div>
            </div>
          </li>
          <li data-href="{{route('companyMessage')}}">
            <div class="c-box bg-fff c-border">
              <div class="c-box__body f-a_center">
                <p class="c-text__lv4 c-text__main c-text__weight--700">新着応募<span class="c-text__lv5 c-text__main">選考中<strong>4</strong>名</span></p>
                <p class="c-text__lv2 c-text__main c-text__weight--900">2<span class="c-text__lv4 c-text__main">件</span></p>
              </div>
            </div>
          </li>
          <li data-href="{{route('companyInformation')}}">
            <div class="c-box bg-fff c-border">
              <div class="c-box__body f-a_center">
                <p class="c-text__lv4 c-text__main c-text__weight--700">ミキワメ転職からのお知らせ</p>
                <p class="c-text__lv2 c-text__main c-text__weight--900">1<span class="c-text__lv4 c-text__main">件</span></p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    @endslot
    @slot('foot')
      @include('component.company._profile_body')
    @endslot
  @endcomponent

@endsection
