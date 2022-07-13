@extends('layouts.company.auth')

@section('page_class', 'l-auth')
@section('aside_class', '')
@section('title', 'パスワードリセット')

@section('content')
  @component('component.company.frame._auth')
    @slot('body')
      <div class="bg-fff c-box">
        <div class="c-box__head">
          <p class="c-text__lv3 c-text--center">ログイン情報をお忘れですか？</p>
          <p class="c-text__lv5 c-text--center">
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
                  <div class="c-input--full">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="your-info@mail.co.jp"/>
                  </div>
                </div>
                <p class="c-text__error">登録しているメールアドレスを入力してください</p>
              </li>
              <li>
                <div class="c-buttonArea__center">
                  <!-- <input type="submit" class="c-button__lg" value="ログイン"> -->
                  <a href="{{ route('companySent') }}?flash=successSend" class="c-button__lg">パスワード再発行のメールを送信</a>
                  <a class="c-button__min c-button__pale" href="{{ route('companyLogin') }}">戻る</a>
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
