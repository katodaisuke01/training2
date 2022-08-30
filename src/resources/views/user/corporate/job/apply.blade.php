@extends('layouts.user.default')

@section('page_class', 'l-detail l-user')
@section('description', 'このページはミキワメ転職に求人掲載を行なっている、株式会社MIKIWAMEの求人情報「【ディレクター候補】チームの力でエンドユーザーまでバリューを届けるディレクターチームのマネージャー候補を募集！」に応募するためのページです。')
@section('page_title', '求人募集エントリー詳細')
@section('title', '【ディレクター候補】チームの力でエンドユーザーまでバリューを届けるディレクターチームのマネージャー候補を募集！')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <div class="p-areaTitle bg-main">
        <h2 class="c-text__lv3 c-text__weight--900">
          @yield('title')
        </h2>
      </div>
      <div class="c-box bg-fff">
        <form action="">
          <ul class="p-list">
            <li>
              <div class="head required">
                <p class="c-text__lv5 c-text__weight--700">応募する求人</p>
              </div>
              <div class="body">
                <div class="c-input--select">
                  <select name="">
                    <option>マーケティングディレクター職</option>
                    <option>営業職</option>
                    <option>エンジニア職</option>
                    <option>デザイナー職</option>
                    <option>プランナー職</option>
                  </select>
                </div>
              </div>
            </li>
            <li>
              <div class="head required">
                <p class="c-text__lv5 c-text__weight--700">面接日程の希望</p>
              </div>
              <div class="body">
                <div class="c-radio">
                  <input type="radio" name="interview_date" id="0" checked>
                  <label for="0">特に希望なし</label>
                  <input type="radio" name="interview_date" id="1">
                  <label for="1">平日</label>
                  <input type="radio" name="interview_date" id="2">
                  <label for="2">土日祝日</label>
                  <input type="radio" name="interview_date" id="3">
                  <label for="3">オンライン面接希望</label>
                </div>
              </div>
            </li>
            <li>
              <div class="head optional">
                <p class="c-text__lv5 c-text__weight--700">メッセージ</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="応募する際のメッセージを入力してください。わかりやすくシンプルな文章で動機などを記載できると熱意が伝わりやすくなります。"></textarea>
                </div>
              </div>
            </li>
          </ul>
          <div class="c-buttonArea__bottom--fixed">
            <a href="{{route('job')}}" class="c-button__min c-button__gray">キャンセル</a>
            <a href="{{route('applied')}}?flash=successSend" class="c-button">この内容で応募する</a>
            <!-- <input type="submit" class="c-button" value="この内容で応募する"> -->
          </div>
        </form>
      </div>
    @endslot
    @slot('body')
      <section class="p-section">
        <div class="p-section__head">
          <h4 class="c-text__lv5 c-text__weight--700">応募プロフィールの確認</h4>
        </div>
        <div class="p-section__body">
          @include('component.user._profile_head')
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__body">
          @include('component.user._profile_body')
        </div>
      </section>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
