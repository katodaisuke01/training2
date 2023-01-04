@extends('admin.layouts.default')

@section('page_class', 'l-admin l-body')
@section('description', 'ユーザー管理です')
@section('title', 'ユーザー管理')

@section('content')
  @component('admin.layouts.frame._default')
    @slot('home')
    
    @endslot
    @slot('head')
      <div class="c-icon__w24 c-icon--user"></div>
      <h2 class="c-text__lv3 c-text__weight--700">@yield('title')</h2>
      <a href="" class="c-button__line c-button__sm">新規作成</a>
    @endslot
    @slot('body')
      @include('admin.user._filter')
      @include('admin.user._table')
    @endslot
  @endcomponent
@endsection
