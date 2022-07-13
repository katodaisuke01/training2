@extends('layouts.user.default')

@section('page_class', 'l-user')
@section('title', 'エントリー済み求人一覧')

@section('content')
  @component('component.user.frame._default')
  @slot('head')
    <p class="c-text__lv5 c-text--center"><span class="c-text__main c-text__lv1 c-italic__en">14</span>件にエントリーしています</p>
  @endslot
  @slot('body')
    @include('component.user._entry')
  @endslot
  @endcomponent

@endsection
