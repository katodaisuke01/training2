@extends('layouts.user.auth')

@section('page_class', 'l-auth')
@section('description', 'このページはミキワメ転職をログインするためのパスワードリセット完了をお知らせページです。')
@section('title', 'パスワードリセット | ミキワメ転職')

@section('content')
  @component('component.user.frame._auth')
    @slot('body')
      <div class="c-box">
        <div class="c-box__head">
          <h2 class="c-text__main c-text__lv2 c-italic__en">Complete</h2>
          <p class="c-text__lv4 c-text--center">
            メールを送信しました。<br />
            届きましたメールに記載のURLより<br />
            パスワードの再登録を行ってください
          </p>
        </div>
        <div class="c-box__body">
          <ul class="p-list">
            <li>
              <div class="c-buttonArea">
                <a href="{{ route('login') }}" class="c-button__lg">ログインページへ</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
