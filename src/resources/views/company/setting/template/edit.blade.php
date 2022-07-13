@extends('layouts.company.default')
@section('page_class', 'l-form')
@section('title', '各種設定 メッセージテンプレート')
@section('page_title', '編集')

@section('content')
  @component('component.company.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
      <div class="c-buttonArea__end">
        <button action="" class="c-button__min">このテンプレートを複製</button>
      </div>
    @endslot
    @slot('body')
      @include('component.company._templateForm')
    @endslot
  @endcomponent

@endsection
