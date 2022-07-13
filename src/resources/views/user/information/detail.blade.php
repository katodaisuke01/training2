@extends('layouts.user.default')
@section('page_class', 'l-message')
@section('description', 'このページではミキワメ転職からのお知らせの詳細について記載しています。')
@section('title', 'お知らせ 詳細')
@section('page_title', 'お知らせ 詳細')

@section('content')
  @component('component.user.frame._narrow')
    @slot('body')
      <a href="javascript:history.back()" class="c-button__back">一覧へ戻る</a>
      <div class="p-message bg-fff">
        <div class="p-message__head">
          <div class="c-image__logo" style="background-image:url({{ asset('../image/logo/logo.svg') }})"></div>
          <div class="c-text">
            <p class="c-text__note">{{ date('Y.m.d H:i') }}</p>
            <p class="c-text__lv4 c-text__weight--700">@yield('page_title')<span class="c-text__lv7">からのお知らせです。</span></p>
          </div>
        </div>
        <div class="p-message__body">
          <p class="message c-text__lv4">Yoco276q394様
            こんにちは！ミキワメ転職公式です。
            予定日が3日後以内となっている面接があります。
            しっかりと準備し、挑みましょう！

            Yoco276q394さんの健闘をお祈りしています！

            ミキワメ転職公式
          </p>
        </div>
        <div class="p-pagination">
          <div class="c-buttonArea__center">
            <a class="c-text__note c-text__main" class="c-button__text" href="">Prev.</a>
            <a class="c-text__note c-text__main" class="c-button__text" href="{{route('information')}}">一覧へ戻る</a>
            <a class="c-text__note c-text__main" class="c-button__text" href="">Next</a>
          </ul>
        </div>
      </div>
    @endslot
  @endcomponent

@endsection
