@extends('layouts.admin.default')
@section('page_class', 'l-form')
@section('title', '企業管理 パスワード設定')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--building"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
      @include('component.company._accountPwForm')
    @endslot
  @endcomponent

@endsection
