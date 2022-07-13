@extends('layouts.user.default')

@section('page_class', 'l-page l-form l-page__short')
@section('description', 'このページはミキワメ転職への新規会員登録、完了ページです。')
@section('title', '仮登録完了')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <h2 class="c-text__main c-text__lv2 c-italic__en">Complete</h2>
      <p class="c-text__lv4 c-text--center">
        仮登録が完了しました。<br />
        ご登録のメールアドレスに確認のメールを送信しております。<br />
        記載のURL、または下記のボタンリンク先よりログインし、<br />
        プロフィール情報の登録を行ってください。
      </p>
    @endslot
    @slot('body')
      <div class="c-buttonArea__center f-column">
        <!-- <input type="submit" class="c-button" value="ログインページへ"> -->
        <a href="{{ route('login') }}" class="c-button">ログインページへ</a>
        <a class="c-button__line c-button__min" href="{{ route('index') }}">トップへ戻る</a>
      </div>
    @endslot
  @endcomponent

@endsection
