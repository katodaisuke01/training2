@extends('layouts.user.default')

@section('page_class', 'l-user')
@section('title', '株式会社MIKIWAMEからのお知らせ一覧')
@section('description', 'このページはミキワメ転職に求人掲載を行なっている、株式会社MIKIWAMEからのお知らせ一覧を掲載しています。')
@section('page_title', '株式会社MIKIWAMEからのお知らせ一覧')

@section('content')
  @component('component.user.frame._default_short')
  @slot('body')
  <div class="c-box bg-fff c-mgt40">
    <div class="c-box__body">
      @include('component.user._post')
    </div>
  </div>
  @endslot
  @endcomponent

@endsection
