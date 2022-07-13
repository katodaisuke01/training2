@extends('layouts.company.default')

@section('page_class', 'l-user')
@section('title', '求職者検索 詳細')
@section('page_title', '山田 陽子さん')

@section('content')
  @component('component.company.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--license"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-right">
        <form action="">
          <div class="c-input">
            <div class="c-checkbox c-checkbox__button">
              <input type="checkbox" name="list" id="checked">
              <label for="checked"><span class="c-icon__w24 c-icon--check"></span>チェック！</label>
            </div>
            <div class="c-checkbox c-checkbox__button">
              <input type="checkbox" name="list" id="interest">
              <label for="interest"><span class="c-icon__w24 c-icon--star"></span>気になる！</label>
            </div>
            <div class="c-buttonArea">
              <a href="{{route('companySearchUserScout')}}" class="c-button__sm">スカウト</a>
            </div>
          </div>
        </form>
      </div>
    @endslot
    @slot('body')
      @include('component.user._profile_head')
      @include('component.user._profile_body')
    @endslot
  @endcomponent

@endsection
