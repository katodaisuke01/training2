@extends('layouts.user.default')

@section('page_class', 'l-page')
@section('title', '企業からのメッセージ一覧')
@section('page_title', '')

@section('content')
  @component('component.user.frame._default_short')
    @slot('body')
      @include('component.user._profile_messageList')
      {{-- ↓↓↓↓↓↓↓↓データ出すものなかったらこれ↓↓↓↓↓↓↓↓ --}}
      {{-- @include('component._data_none') --}}
    @endslot
  @endcomponent
@endsection
