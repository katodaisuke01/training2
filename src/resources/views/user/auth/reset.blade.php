@extends('layouts.user.auth')

@section('page_class', 'l-auth')
@section('description', 'このページはミキワメ転職をログインするためのパスワードリセット依頼ページです。')
@section('title', 'パスワードリセット | ミキワメ転職')

@section('content')
  @component('component.user.frame._auth')
    @slot('body')
      <div class="c-box">
        <div class="c-box__head">
          <h2 class="c-text__main c-text__lv2 c-italic__en">Password Reset</h2>
          <p class="c-text__lv4 c-text--center">
            パスワードリセットを行います。<br />
            ご登録のメールアドレスを入力し、届きましたメールに<br />
            記載のURLよりパスワード再登録を行ってください。
          </p>
        </div>
        <div class="c-box__body">
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <ul class="p-list">
              <li>
                <div class="head">
                  <label for="email">メールアドレス</label>
                </div>
                <div class="body">
                  <div class="c-input">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="your-info@mail.co.jp"/>
                  </div>
                </div>
              </li>
              <li>
                <div class="c-buttonArea">
                  <!-- <input type="submit" class="c-button__lg" value="送信"> -->
                  <a href="{{ route('sent') }}?flash=successSend" class="c-button__lg">パスワード再発行のメールを送信</a>
                  <a class="c-button__min c-button__pale" href="{{ route('login') }}">戻る</a>
                </div>
              </li>
            </ul>
          </form>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
