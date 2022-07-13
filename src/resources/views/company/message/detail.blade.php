@extends('layouts.company.default')

@section('page_class', 'l-message')
@section('title', 'メッセージ 詳細')
@section('page_title', 'Yocotr657uikさん')

@section('content')
  @component('component.company.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--message"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <form action="">
          <div class="c-checkbox c-checkbox__button">
            <input type="checkbox" id="flag" name="flag">
            <label for="flag"><span class="c-icon--flag c-icon__w16"></span>フラグチェック</label>
          </div>
        </form>
      </div>
    @endslot
    @slot('body')
      @include('component._messageDetail')
    @endslot
  @endcomponent

@endsection