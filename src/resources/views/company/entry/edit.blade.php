@extends('layouts.company.default')
@section('page_class', 'l-form')
@section('title', '企業管理 求人情報')
@section('page_title', '編集')

@section('content')
  @component('component.company.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--document"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
      <div class="c-buttonArea__end">
        <a data-remodal-target="modal_delete" class="c-button__min c-button__gray">この求人を削除</a>
        <button class="c-button__min" action="">この求人を複製</button>
      </div>
    @endslot
    @slot('body')
      @include('component.company._entryForm')
    @endslot
  @endcomponent

@endsection
