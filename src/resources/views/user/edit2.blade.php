@extends('layouts.user.default')

@section('page_class', 'l-mypage')
@section('aside_class', '')
@section('title', '自己アピール情報登録')

@section('content')
  @component('component.user.frame._default')
  @slot('head')
  @endslot
  @slot('body')
    @include('component.user._profile_edit2')
  @endslot
  @slot('foot')
  @endslot
  @endcomponent

@endsection
