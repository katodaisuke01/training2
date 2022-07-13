@extends('layouts.user.default')

@section('page_class', 'l-user')
@section('aside_class', '')
@section('page_title', 'マイページ')
@section('title', 'マイページ')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      @include('component.user._profile_head')
    @endslot
    @slot('body')
      @include('component.user._profile_body')
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
