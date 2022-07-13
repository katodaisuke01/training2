@extends('layouts.user.default')

@section('page_class', 'l-detail')
@section('description', 'このページはミキワメ転職に求人掲載を行なっている、株式会社MIKIWAMEの求人情報「【ディレクター候補】チームの力でエンドユーザーまでバリューを届けるディレクターチームのマネージャー候補を募集！」に応募完了したページです。')
@section('title', '求人募集エントリー 応募完了')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <p class="c-text__main c-text__lv1 c-italic__en">Complete</p>
    @endslot
    @slot('body')
    <p class="c-text__lv4 c-text--center">求人募集への応募が完了しました。<br />企業からの返信メッセージを<br class="on_spWide">今しばらくお待ちください。<br />引き続き頑張っていきましょう！</p>

    @endslot
    @slot('foot')
      <div class="c-buttonArea__center">
        <a href="{{route('index')}}" class="c-button">トップへ戻る</a>
      </div>
    @endslot
  @endcomponent

@endsection
