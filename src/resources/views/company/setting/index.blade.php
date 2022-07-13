@extends('layouts.company.default')

@section('page_class', 'l-page l-company')
@section('title', '各種設定')
@section('page_title', '株式会社MIKIWAME')

@section('content')
  @component('component.company.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
        @include('component.company._setting')
    @endslot
  @endcomponent

@endsection
