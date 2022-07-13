@extends('layouts.company.default')

@section('page_class', 'l-message')
@section('title', 'お知らせ 詳細')
@section('page_title', 'Yocotr657uikさん')

@section('content')
  @component('component.company.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--bell"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
      @include('component._informationDetail')
    @endslot
  @endcomponent

@endsection