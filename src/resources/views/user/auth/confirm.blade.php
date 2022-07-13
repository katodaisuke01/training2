@extends('layouts.user.default')

@section('page_class', 'l-page l-form')
@section('description', 'このページはミキワメ転職への新規会員登録、入力内容確認用ページです。')
@section('title', '登録内容の確認')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <h2 class="c-text__main c-text__lv2 c-italic__en">Confirm</h2>
      <p class="c-text__lv4 c-text--center">
        入力した内容をご確認いただき、<br />
        間違いがなければ「送信して仮会員登録」ボタンを押してください。
      </p>
    @endslot
    @slot('body')
      <div>
        @csrf
        <ul class="p-list__row p-list__border">
          <li>
            <div class="head required">
              <label class="c-text__label" for="email">氏名</label>
            </div>
            <div class="body">
              <p class="c-text__lv4">山田 太郎</p>
            </div>
          </li>
          <li>
            <div class="head required">
              <label class="c-text__label" for="email">ふりがな</label>
            </div>
            <div class="body">
              <p class="c-text__lv4">やまだ たろう</p>
            </div>
          </li>
          <li>
            <div class="head optional">
              <label class="c-text__label" for="email">ユーザーID</label>
            </div>
            <div class="body">
              <p class="c-text__lv4">xre4t5f6gu7ium</p>
            </div>
          </li>
          <li>
            <div class="head optional">
              <label class="c-text__label" for="email">エージェント面談</label>
            </div>
            <div class="body">
              <p class="c-text__lv4">希望する</p>
              <p class="c-text__note">希望者には担当者よりあなたにマッチしそうな求人を数多くご紹介いたします</p>
            </div>
          </li>
          <li>
            <div class="head required">
              <label class="c-text__label" for="email">メールアドレス</label>
            </div>
            <div class="body">
              <p class="c-text__lv4">your-info@mail.co.jp</p>
            </div>
          </li>
          <li>
            <div class="head required">
              <label class="c-text__label" for="password">パスワード</label>
            </div>
            <div class="body">
              <p class="c-text__lv4">•••••••••••••••</p>
            </div>
          </li>
        </ul>
      </div>
    @endslot
    @slot('foot')
      <div class="c-buttonArea__center f-column">
        <!-- <input type="submit" class="c-button__lg" value="入力内容を確認"> -->
        <a href="{{ route('complete') }}?flash=successRegister" class="c-button__lg">送信して仮会員登録</a>
        <a class="c-button__pale c-button__min" href="{{ route('register') }}">内容を変更</a>
      </div>
    @endslot
  @endcomponent

@endsection
