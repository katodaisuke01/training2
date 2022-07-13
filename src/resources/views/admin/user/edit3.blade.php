@extends('layouts.admin.default')

@section('page_class', 'l-user')
@section('page_title', '山田 陽子さん')
@section('title', '職務経歴登録')

@section('content')
  @component('component.admin.frame._user')
  @slot('head')
    <div class="c-icon__w32 c-icon--user"></div>
    <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
  @endslot
  @slot('body')
    @include('component.user._profile_edit3')
  @endslot
  @slot('foot')
  @endslot
  @endcomponent

@endsection
