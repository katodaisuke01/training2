@extends('layouts.user.default')

@section('page_class', 'l-detail')
@section('description', 'このページはミキワメ転職公式からのコンテンツ、「@yield('page_title')」記事の詳細です。')
@section('page_title', 'ビジネス観を捨てた時に見つけた、ビジネス勘という考え')
@section('title', 'ミキワメ転職 公式コンテンツ')

@section('content')
  @component('component.user.frame._narrow')
    @slot('head')
        <div class="c-text c-mgb24">
          <h1 class="c-text__lv2 c-text__weight--900 c-text__main c-text--center">
            @yield('page_title')
          </h1>
          <p class="c-text__lv4 c-text__weight--700 c-text--center">
            対談 - メディアミックス戦略で顧客の期待値を超える。大手製造業を中心に多数の実績。
          </p>
        </div>
        <img src="{{ asset('../image/sample/corporate_sample1.jpg') }}" width="100%" alt="@yield('title')のトップ画像">
    @endslot
    @slot('body')
      <div class="c-box bg-fff">
        <p class="c-text__note"><time>2022.06.21 12:23</time> 投稿</p>
        <p class="c-text__lv3 c-text__weight--700">メディアミックス戦略との出会い</p>
        <p class="c-text__lv4">MIKIWAMEでは毎年、新入社員に向けて配属前に研修を行っています。今年も新人62人が約1カ月半の研修に臨みました。ビジネスマナーをはじめ、エクセル操作やビジネスシミュレーションなどの実践的な学びもありました。お昼休みにも分からない箇所を同期同士で教え合う姿が見られるなど、積極的に課題に取り組んでいました。研修を終えた新入社員は、5月16日から配属先で業務を開始します。</p>
        
        <div class="l-12--gap8 l-12">
          <div class="l-6">
            <img src="{{ asset('../image/sample/image_2.jpg') }}">
          </div>
          <div class="l-6">
            <img src="{{ asset('../image/sample/image_3.jpg') }}">
          </div>
        </div>
        <p class="c-text__lv4">MIKIWAMEでは毎年、新入社員に向けて配属前に研修を行っています。今年も新人62人が約1カ月半の研修に臨みました。ビジネスマナーをはじめ、エクセル操作やビジネスシミュレーションなどの実践的な学びもありました。お昼休みにも分からない箇所を同期同士で教え合う姿が見られるなど、積極的に課題に取り組んでいました。研修を終えた新入社員は、5月16日から配属先で業務を開始します。</p>
      </div>

      <a href="{{ route('content') }}" class="c-button__back">一覧へ戻る</a>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
