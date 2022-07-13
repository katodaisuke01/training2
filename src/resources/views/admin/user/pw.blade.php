@extends('layouts.admin.default')

@section('page_class', 'l-form')
@section('title', 'パスワード設定')

@section('content')
  @component('component.admin.frame._user')
  @slot('head')
      <div class="c-icon__w32 c-icon--user"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
  @endslot
  @slot('body')
  <form action="{{ route('login') }}" method="POST" class="p-form">
  @csrf
    <div class="p-form__body c-concave">
      @include('component.user._pw')
    </div>
    <div class="p-form__foot">
      <div class="c-buttonArea__end">
        <a href="{{ route('adminUser') }}" class="c-button__min c-button__gray">戻る</a>
        <a href="?flash=successSave" class="c-button">保存する</a>
        <!-- <input class="c-button" type="submit" value="保存する"> -->
      </div>
    </div>
  </form>
  @endslot
  @slot('foot')
  @endslot
  @endcomponent

@endsection
