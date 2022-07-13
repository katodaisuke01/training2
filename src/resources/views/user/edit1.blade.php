@extends('layouts.user.default')

@section('page_class', 'l-mypage')
@section('aside_class', '')
@section('page_title', '基本情報登録')
@section('title', '基本情報登録')

@section('content')
  @component('component.user.frame._default')
  @slot('head')
  @endslot
  @slot('body')
    @include('component.user._profile_edit1')
  @endslot
  @slot('foot')
  @endslot
  @endcomponent

@endsection
