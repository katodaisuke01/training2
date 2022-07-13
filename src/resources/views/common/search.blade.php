@extends('layouts.user.default')
@section('page_class', 'l-page')
@section('description', 'このページはミキワメ転職の検索結果ページです。')
@section('title', '「キーワード検索」の検索結果')

@section('content')
  @component('component.user.frame._narrow')
    @slot('body')
      <div class="c-box bg-fff">
        <div class="c-box__body">
          <ul class="p-list__border">
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
            <li data-href="{{route('postDetail')}}">
              <p class="c-text__lv4 c-text__main c-text__weight--700">ページタイトルページタイトルページタイトル</p>
              <p class="c-text__lv6">ページ内のテキスト抽出した文章が100字程度ならんでるといいですね。ページ内のテキスト抽出した文章が100字程度ならページ内のテキスト抽出した文章が100字程度ならんでるといいですね。</p>
            </li>
          </ul>
        </div>
        @include('component._pagination')
      </div>
    @endslot
  @endcomponent

@endsection
