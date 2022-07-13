@extends('layouts.user.default')

@section('page_class', 'l-page__short l-form')
@section('aside_class', '')
@section('title', 'パスワード設定')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <p class="c-text__lv4 c-text--center">新たなパスワードを設定してください。<br />パスワードは半角の英数字と記号が設定可能です。</p>
    @endslot
    @slot('body')
      <form action="{{ route('login') }}" method="POST" class="p-form">
      @csrf
        <div class="c-box bg-fff p-form__body">
          @include('component.user._pw')
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__center c-column">
            <?php
              $url = $_SERVER['REQUEST_URI'];
              ?>
              @if(strstr($url,'mypage'))
                <a href="{{ route('mypage') }}?flash=successSave" class="c-button__lg">入力内容を保存</a>
              @elseif(strstr($url,'admin'))
                <a href="{{ route('userDetail') }}?flash=successSave" class="c-button__lg">入力内容を保存</a>
              @endif
            <!-- <input type="submit" class="c-button__lg" value="入力内容を保存"> -->
            <a href="{{ route('mypage') }}" class="c-button__gray c-button__min">キャンセル</a>
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
