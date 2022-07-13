@extends('layouts.company.default')
@section('page_class', 'l-form')
@section('title', '企業管理 アカウント')
@section('page_title', '新規作成')

@section('content')
  @component('component.company.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      @include('component.company._accountForm')
    @endslot
  @endcomponent

@endsection
