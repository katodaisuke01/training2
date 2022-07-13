@extends('layouts.company.default')

@section('page_class', 'l-form')
@section('title', '求職者検索')
@section('page_title', 'スカウト送信完了')

@section('content')
  @component('component.company.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--license"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title') </small></h1>
    @endslot
    @slot('body')
      <form action="" class="p-form">
        <div class="p-form__body">
          <div class="c-box bg-fff">
            <p class="c-text__lv4">ertghjkjklさんへスカウトが送信されました。<br />ユーザーの返信を今しばらくお待ちください。</p>
          </div>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{route('companySearch')}}" class="c-button__min">求職者一覧へ戻る</a>
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
