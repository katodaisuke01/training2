@extends('layouts.admin.auth')

@section('page_class', 'l-auth')
@section('aside_class', '')
@section('title', '管理画面ログイン | ミキワメ転職')

@section('content')
  @component('component.admin.frame._auth')
    @slot('body')
      <div class="c-bulge c-box">
        <div class="c-box__head">
          <p class="c-text__lv3">管理画面ログイン</p>
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
                <p class="c-text__error">正しいメールアドレスを入力してください</p>
              </li>
              <li>
                <div class="head">
                  <label for="password">パスワード</label>
                </div>
                <div class="body">
                  <div class="c-input--full c-input--pw">
                    <input type="password" id="password" name="password" placeholder="8文字以上の半角英数字"/>
                    <span><i class="c-icon__eye"></i></span>
                  </div>
                </div>
                <p class="c-text__error">正しいパスワードを入力してください</p>
              </li>
              <li>
                <div class="c-buttonArea__center">
                  <!-- <input type="submit" class="c-button__lg" value="ログイン"> -->
                  <a href="{{ route('admin') }}?flash=successLogin" class="c-button__lg">ログイン</a>
                  <a class="c-button__text" href="{{ route('adminReset') }}">ログイン情報をお忘れですか？</a>
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
