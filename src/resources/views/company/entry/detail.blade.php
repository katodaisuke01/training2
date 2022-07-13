@extends('layouts.company.default')
@section('page_class', 'l-job')
@section('page_title', '企業管理 求人詳細')
@section('title', '【ディレクター候補】チームの力でエンドユーザーまでバリューを届けるディレクターチームのマネージャー候補を募集！')

@section('content')
  @component('component.company.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--document"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('page_title')</h1>
    @endslot
    @slot('body')
    <div class="p-job">
      <div class="p-job__head">
        <div class="c-box bg-fff">
          <div class="l">
            <div class="l-auto">
              <ul class="p-list__wrap">
                <li class="f-a_center">
                  <p class="c-text--right">この求人への<br />応募数</p>
                  <p class="c-text__main c-text__lv1 c-text__weight--900 c-text--right">12<span class="c-text__main c-text__lv4">件</span></p>
                </li>
                <li class="f-a_center">
                  <p class="c-text--right">この求人への<br />お気に入り数</p>
                  <p class="c-text__main c-text__lv1 c-text__weight--900 c-text--right">123<span class="c-text__main c-text__lv4">回</span></p>
                </li>
                <li class="f-a_center">
                  <p class="c-text--right">この求人の<br />閲覧数</p>
                  <p class="c-text__main c-text__lv1 c-text__weight--900 c-text--right"><?= number_format(1234);?><span class="c-text__main c-text__lv4">PV</span></p>
                </li>
              </ul>
            </div>
            <div class="l-fix__210">
              <div class="c-date">
                <p class="c-text--right"><span>掲載日時</span> {{ date('Y/m/d H:i') }}</p>
                <p class="c-text--right"><span>更新日時</span> {{ date('Y/m/d H:i') }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="c-box">
          @include('component.user.corporate._job_head')
        </div>
      </div>
      <div class="p-job__body">
        <div class="c-box">
          @include('component.user.corporate._job_body')
        </div>
      </div>
    </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
