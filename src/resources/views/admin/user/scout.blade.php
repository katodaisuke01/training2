@extends('layouts.admin.default')

@section('page_class', 'l-user')
@section('title', '企業からのスカウト一覧')

@section('content')
  @component('component.admin.frame._user')
  @slot('head')
      <div class="c-icon__w32 c-icon--user"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
  @endslot
  @slot('body')
    <div class="c-concave">
      @include('component.user._scout')
    </div>
  @endslot
  @slot('foot')
  @endslot
  @endcomponent

@endsection
