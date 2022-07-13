@extends('layouts.user.default')

@section('page_class', 'l-user')
@section('title', '企業からの気になる!一覧')

@section('content')
  @component('component.user.frame._default_short')
  @slot('body')
    <div class="c-box bg-fff">
      @include('component.user._curiosity')
    </div>
  @endslot
  @endcomponent

@endsection
