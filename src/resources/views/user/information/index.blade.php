@extends('layouts.user.default')

@section('page_class', 'l-user')
@section('description', 'このページではミキワメ転職からのお知らせの一覧を記載しています。')
@section('title', 'お知らせ一覧')

@section('content')
  @component('component.user.frame._default_short')
  @slot('body')
  <div class="c-box bg-fff">
    <div class="c-box__body">
      @include('component.user._information')
    </div>
  </div>
  @endslot
  @endcomponent

@endsection
