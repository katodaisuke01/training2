@extends('layouts.admin.default')

@section('page_class', 'l-home')
@section('aside_class', '')
@section('title', 'ダッシュボード')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--layout"></div>
      <h1 class="c-text__lv3 c-text__weight--900">ダッシュボード</h1>
    @endslot
    @slot('body')
    <!-- お知らせ -->
    <div class="l p-information">
      <div class="l-fix__80">
        <div class="f-column f-a_center f-j_center">
          <div class="c-icon--bell c-icon__w24"></div>
          <p class="c-text__lv4 c-text__main c-text__weight--900">お知らせ</p>
          <div class="c-buttonArea__center">
            <a href="{{ route('adminInformation') }}" class="c-button__text">すべて見る</a>
          </div>
        </div>
      </div>
      <div class="l-auto">
        <div class="p-scroll__height--100">
          <div class="p-scroll__inner">
            <ul class="p-list__border">
              <!-- 最新10件くらいでいいかな -->
              <li data-href="{{ route('adminInformationDetail') }}">
                <p class="c-text__min">2022.07.12 13:38</p>
                <!-- ↓既読するか、未読でも3日で消える -->
                <p class="c-text__main c-text__weight--700">新着</p>
                <p class="c-text__lv5">株式会社MIKIWAME の ディレクター職 求人で内定が受託されました。</p>
              </li>
              <li>
                <p class="c-text__min">2022.07.12 13:38</p><p class="c-text__main c-text__weight--700">新着</p><p class="c-text__lv5">エージェント面談を希望するユーザー、田中耕一さんの登録がありました。</p>
              </li>
              <li>
                <p class="c-text__min">2022.07.12 13:38</p><p class="c-text__main c-text__weight--700">新着</p><p class="c-text__lv5">株式会社佐藤工業様よりお問い合わせが来ています。</p>
              </li>
              <li>
                <p class="c-text__min">2022.07.12 13:38</p><p class="c-text__lv5">エージェント面談を希望するユーザー登録がありました。</p>
              </li>
              <li>
                <p class="c-text__min">2022.07.12 13:38</p><p class="c-text__lv5">エージェント面談を希望するユーザー登録がありました。</p>
              </li>
              <li>
                <p class="c-text__min">2022.07.12 13:38</p><p class="c-text__lv5">エージェント面談を希望するユーザー登録がありました。</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- グラフエリア -->
    <div class="l">
      <div class="l-auto">
        <div class="p-tab">
          <form action="">
            <div class="c-input__center">
              <div class="c-input c-input--date">
                <input type="text" class="datepicker" placeholder="2020/01/01" value="">
              </div>
              <div class="c-input">
                <span>〜</span>
              </div>
              <div class="c-input c-input--date">
                <input type="text" class="datepicker" placeholder="2020/01/01" value="{{ date('Y/m/d') }}">
              </div>
            </div>
          </form>
          <ul class="p-list__tab">
            <li class="tab c-tab--a active"><p>ユーザー数の推移</p></li>
            <li class="tab c-tab--b"><p>公開求人数の推移</p></li>
          </ul>
          <div class="p-content">
            <div class="c-content c-tab--a show">
              @include('component.chart._c-chart__admin--1')
            </div>
            <div class="c-content c-tab--b">
              @include('component.chart._c-chart__admin--2')
            </div>
          </div>
        </div>
      </div>
    </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
