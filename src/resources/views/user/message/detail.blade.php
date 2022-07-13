@extends('layouts.user.default')

@section('page_class', 'l-message')
@section('title', '企業からのメッセージ 詳細')
@section('page_title', '株式会社インターコンチネンタル')

@section('content')
  @component('component.user.frame._default_short')
    @slot('body')
      @include('component._messageDetail')
    @endslot
  @endcomponent

@endsection
