@extends('layouts.user.default')

@section('page_class', 'l-job')
@section('description', 'このページはミキワメ転職に求人掲載を行なっている、株式会社MIKIWAMEの求人情報「【ディレクター候補】チームの力でエンドユーザーまでバリューを届けるディレクターチームのマネージャー候補を募集！」を掲載しています。')
@section('page_title', '求人募集エントリー詳細')
@section('title', '【ディレクター候補】チームの力でエンドユーザーまでバリューを届けるディレクターチームのマネージャー候補を募集！')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      @include('component.user.corporate._job_head')
    @endslot
    @slot('body')
      @include('component.user.corporate._job_body')
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
