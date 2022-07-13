@extends('layouts.user.default')

@section('page_class', 'l-detail')
@section('description', 'このページはミキワメ転職に求人掲載を行なっている、株式会社MIKIWAMEからのお知らせ「タイトル」を掲載しています。')
@section('title', '株式会社MIKIWAMEからのお知らせ 詳細')
@section('page_title', '株式会社MIKIWAMEからのお知らせ 詳細')

@section('content')
  @component('component.user.frame._narrow')
    @slot('head')
    <div class="bg-main">
      <p class="c-text__lv4 c-text__weight--900 bg-fff">お知らせ</p>
      <h2 class="c-text__lv3 c-text__weight--900 c-text--center">2023年度：新人研修を行いました！</h2>
    </div>

    <img src="{{ asset('../image/sample/image_1.jpg') }}" alt="2023年度：新人研修を行いました！のサムネイル画像" class="c-mgt16">
    @endslot
    @slot('body')
      <div class="c-box bg-fff">
        <p class="c-text__note"><time>2022.06.21 12:23</time> 投稿</p>
        <p class="c-text__lv3 c-text__weight--700">2023年度：新人研修を行いました！</p>
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

      <a href="javascript:history.back()" class="c-button__back">一覧へ戻る</a>
    @endslot
  @endcomponent

@endsection
