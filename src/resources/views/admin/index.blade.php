@extends('layouts.admin.default')

@section('page_class', 'l-admin l-body')
@section('description', 'ダッシュボードです')
@section('title', 'ダッシュボード | 管理画面')

@section('content')
  @component('layouts.admin.frame._default')
    @slot('head')
    <div></div>
    @endslot
  @endcomponent
@endsection
