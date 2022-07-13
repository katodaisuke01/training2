@extends('layouts.company.default')

@section('page_class', 'l-form')
@section('title', '各種設定 請求先情報')
@section('page_title', '登録・編集')

@section('content')
  @component('component.company.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="p-form__body c-concave">
          @include('component.company._billing')
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{ route('companySetting') }}" class="c-button__min c-button__gray">戻る</a>
            <a href="?flash=successSave" class="c-button">保存する</a>
            <!-- <input class="c-button" type="submit" value="保存する"> -->
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
