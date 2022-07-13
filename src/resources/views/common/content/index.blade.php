@extends('layouts.user.default')

@section('page_class', 'l-base')
@section('title', 'ミキワメ転職 公式コンテンツ一覧')
@section('description', 'このページはミキワメ転職公式からのコンテンツ、ビジネスに関するさまざまな角度からのコラムを発信していく記事の一覧です。')

@section('content')
  @component('component.user.frame._default')
    @slot('body')
      @include('component._contentList')
    @endslot
  @endcomponent
@endsection
