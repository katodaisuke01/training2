@extends('layouts.user.default')

@section('page_class', 'l-page l-form')
@section('description', 'このページはミキワメ転職をログインするための新規会員登録ページです。')
@section('title', '新規会員登録')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <h2 class="c-text__main c-text__lv2 c-italic__en">Register</h2>
      <p class="c-text__lv4 c-text--center">新規会員登録フォーム</p>
    @endslot
    @slot('body')
      <form action="{{ route('login') }}" method="POST" class="p-form">
        <div class="p-form__body">
          @csrf
          <ul class="p-list__row">
            <li>
              <div class="head required">
                <label class="c-text__label" for="email">氏名</label>
              </div>
              <div class="body">
                <div class="c-input c-input__half">
                  <div class="c-input">
                    <input type="text" required name="name" value="" placeholder="山田"/>
                  </div>
                  <div class="c-input">
                    <input type="text" required name="name" value="" placeholder="太郎"/>
                  </div>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <label class="c-text__label" for="email">ふりがな</label>
              </div>
              <div class="body">
                <div class="c-input c-input__half">
                  <div class="c-input">
                    <input type="text" required name="name" value="" placeholder="やまだ"/>
                  </div>
                  <div class="c-input">
                    <input type="text" required name="name" value="" placeholder="たろう"/>
                  </div>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li>
              <div class="head optional">
                <label class="c-text__label" for="email">ユーザーID</label>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" required name="email" value="" placeholder="8文字以上の半角英数字：未設定の場合乱数となります"/>
                </div>
                <p class="c-text__error">この項目は8文字以上の半角英数字で入力してください</p>
              </div>
            </li>
            <li>
              <div class="head optional">
                <label class="c-text__label" for="email">エージェント面談</label>
              </div>
              <div class="body">
                <div class="c-radio">
                  <input type="radio" name="agent" id="agent_yes" checked>
                  <label class="c-text__label" for="agent_yes">希望する</label>
                  <input type="radio" name="agent" id="agent_no">
                  <label class="c-text__label" for="agent_no">希望しない</label>
                </div>
                <p class="c-text__note">希望者には担当者よりあなたにマッチしそうな求人を数多くご紹介いたします</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <label class="c-text__label" for="email">メールアドレス</label>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="email" id="email" required name="email" value="" placeholder="your-info@mail.co.jp"/>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <label class="c-text__label" for="email">メールアドレス（確認）</label>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="email" id="" required name="email" value="" placeholder="your-info@mail.co.jp"/>
                </div>
                <p class="c-text__error">同様のメールアドレスを入力してください</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <label class="c-text__label" for="password">パスワード</label>
              </div>
              <div class="body">
                <div class="c-input--full c-input--pw">
                  <input type="password" required id="password" name="password" placeholder="8文字以上の半角英数字"/>
                  <span><i class="c-icon__eye"></i></span>
                </div>
                <p class="c-text__error">この項目は8文字以上の半角英数字で必ず入力してください</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <label class="c-text__label" for="password">パスワード（確認）</label>
              </div>
              <div class="body">
                <div class="c-input--full c-input--pw">
                  <input type="password" required id="" name="password" placeholder="8文字以上の半角英数字"/>
                  <span><i class="c-icon__eye"></i></span>
                </div>
                <p class="c-text__error">同様のパスワードを入力してください</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__center">
            <!-- <input type="submit" class="c-button__lg" value="入力内容を確認"> -->
            <a href="{{ route('confirm') }}" class="c-button__lg">入力内容を確認</a>
            <a class="c-button__line c-button__min" href="{{ route('login') }}">登録済みの方はこちら</a>
          </div>
        </div>
      </form>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
