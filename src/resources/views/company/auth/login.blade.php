@extends('layouts.company.auth')

@section('page_class', 'l-auth')
@section('aside_class', '')
@section('title', '企業ページログイン | ミキワメ転職')

@section('content')
  @component('component.user.frame._auth')
    @slot('body')
        <div class="l-12 l-12--gap32">
          <div class="l-6 bg-back">
            <div class="c-box">
              <div class="c-box__head">
                <h2 class="c-text__display">Login</h2>
                <p class="c-text__lv3 c-text__weight--700">企業ページログイン</p>
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
                        <p class="c-text__error">登録済みのメールアドレスを入力してください</p>
                      </div>
                    </li>
                    <li>
                      <div class="head">
                        <label for="password">パスワード</label>
                      </div>
                      <div class="body">
                        <div class="c-input--full c-input--pw">
                          <input type="password" id="password" name="password" placeholder="8文字以上の半角英数字" value=""/>
                          <span><i class="c-icon__eye"></i></span>
                        </div>
                        <p class="c-text__error">パスワードは8文字以上の半角英数字で入力してください</p>
                      </div>
                    </li>
                    <li>
                      <div class="c-buttonArea__center">
                        <!-- <input type="submit" class="c-button__lg" value="送信"> -->
                        <a href="{{ route('company') }}?flash=successLogin" class="c-button__lg">ログイン</a>
                        <a class="c-button__text" href="{{ route('companyReset') }}">ログイン情報をお忘れですか？</a>
                      </div>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
          <div class="l-6">
            <div class="c-logoArea">
              <img class="c-logo" src="{{ asset('image/logo/logo_white.svg') }}" alt="logo" title="ミキワメ転職のロゴ">
              <img class="c-tagline" src="{{ asset('image/logo/logo_tagline.svg') }}" alt="タグライン" title="タグライン">
            </div>
          </div>
        </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
