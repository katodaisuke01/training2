@extends('cms.layout._page-default')
@section('content')
  <div class="p-main">
    @component('cms.component._main-head')
      @slot('main')
      <h2 class="p-main__head__main__txt__ttl">
        アカウント
      </h2>
      @endslot
    @endcomponent
    <div class="p-main__body">
      <div class="p-main__wrapper--lg">
        @include('cms.account._sidebar')
        <div class="p-main__container">
          コンテナ
        </div>
      </div>
    </div>
  </div>
@endsection