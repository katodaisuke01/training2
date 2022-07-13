@extends('layouts.user.default')

@section('page_class', 'l-diagnose')
@section('description', 'このページはミキワメ転職の適職診断、質問の1ページ目です。')
@section('title', 'あなたの本当の資質は!？適職診断')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <p class="c-text__main c-text__lv1 c-italic__en c-text--center">Q1<span class="c-text__lv4 c-text__weight--700">1/20</span></p>
      <p class="c-text__lv3 c-text--center">自分はコミュニケーションにおいて、相手の細かい所が気になる方だ</p>
     
    @endslot
    @slot('body')
      <form action="" class="p-form">
        <div class="p-form__body f-j_center">
          <div class="c-input">
            <div class="c-radio">
              <input type="radio" name="question" id="question_1_yes" value="3" checked>
              <label for="question_1_yes">はい</label>
              <input type="radio" name="question" id="question_1_no" value="1">
              <label for="question_1_no">いいえ</label>
              <input type="radio" name="question" id="question_1_soso" value="2">
              <label for="question_1_soso">どちらでもない</label>
            </div>
          </div>
        </div>
        <div class="p-form__foot c-mgt40">
          <div class="c-buttonArea__center">
            <a href="{{route('result')}}" class="c-button__lg">次の質問へ</a>
          </div>
        </div>
      </form>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
