@extends('layouts.user.default')

@section('page_class', 'l-page l-form')
@section('aside_class', '')
@section('title', 'アカウント非表示企業設定')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <p class="c-text__lv4 c-text--center">あなたのアカウントを表示させたくない企業の登録が可能です。<br />下記入力欄に企業名を入力し、保存してください。</p>
    @endslot
    @slot('body')
      <form action="{{ route('login') }}" method="POST" class="p-form">
      @csrf
        <div class="c-box bg-fff p-form__body">
          @include('component.user._ban')
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__center c-column">
            <a href="?flash=successSave" class="c-button">保存する</a>
            <!-- <input class="c-button" type="submit" value="保存する"> -->
            <a href="{{ route('adminUser') }}" class="c-button__min c-button__gray">戻る</a>
          </div>
        </div>
      </form>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
