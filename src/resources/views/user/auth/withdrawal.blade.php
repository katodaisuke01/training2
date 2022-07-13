@extends('layouts.user.default')

@section('page_class', 'l-page l-form')
@section('description', 'このページはミキワメ転職を退会するためのページです。')
@section('title', '退会')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <h2 class="c-text__main c-text__lv2 c-italic__en">Withdrawal</h2>
      <p class="c-text__lv4 c-text--center">退会フォーム</p>
    @endslot
    @slot('body')
      <form action="" method="POST" class="p-form">
        <div class="p-form__body">
          @csrf
          <ul class="p-list">
            <li>
              <div class="head required">
                <label class="c-text__label" for="email">退会の理由を選択してください</label>
              </div>
              <div class="body">
                <div class="c-radio c-radio--column">
                  <input type="radio" name="reason" id="reason_1">
                  <label class="c-text__label" for="reason_1">1:ミキワメ転職で内定を受託したから</label>
                  <input type="radio" name="reason" id="reason_2">
                  <label class="c-text__label" for="reason_2">2:理想的なスカウトがこないから</label>
                  <input type="radio" name="reason" id="reason_3">
                  <label class="c-text__label" for="reason_3">3:企業から気になるがこないから</label>
                  <input type="radio" name="reason" id="reason_4">
                  <label class="c-text__label" for="reason_4">4:転職自体をやめたから</label>
                  <input type="radio" name="reason" id="reason_5">
                  <label class="c-text__label" for="reason_5">5:他社エージェントで内定を受託したから</label>
                  <input type="radio" name="reason" id="reason_6">
                  <label class="c-text__label" for="reason_6">6:その他</label>
                </div>
                <p class="c-text__error">この項目は必ず選択してください</p>
              </div>
            </li>
            <li>
              <div class="head optional">
                <label class="c-text__label" for="email">退会の理由として5を選択した方は他社エージェント名を、6を選択した方は理由を入力してください</label>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" required name="text" value="" placeholder="他社エージェント名または退会の理由を入力してください"/>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </div>
            </li>
            <li>
              <div class="head required">
                <label class="c-text__label" for="email">ミキワメ転職ご利用の感想はいかがでしたか？</label>
              </div>
              <div class="body">
                <div class="c-radio c-radio--column">
                  <input type="radio" name="opinion" id="opinion_1">
                  <label class="c-text__label" for="opinion_1">1:非常に使いやすかった</label>
                  <input type="radio" name="opinion" id="opinion_2">
                  <label class="c-text__label" for="opinion_2">2:使いやすかった</label>
                  <input type="radio" name="opinion" id="opinion_3">
                  <label class="c-text__label" for="opinion_3">3:ふつう</label>
                  <input type="radio" name="opinion" id="opinion_4">
                  <label class="c-text__label" for="opinion_4">4:使いにくかった</label>
                  <input type="radio" name="opinion" id="opinion_5">
                  <label class="c-text__label" for="opinion_5">5:非常に使いにくかった</label>
                  <input type="radio" name="opinion" id="opinion_6">
                  <label class="c-text__label" for="opinion_6">6:その他</label>
                </div>
                <p class="c-text__error">この項目は必ず選択してください</p>
              </div>
            </li>
            <li>
              <div class="head optional">
                <label class="c-text__label" for="email">ミキワメ転職にご意見やご要望などがあれば入力してください</label>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea placeholder="ミキワメ転職へのご意見やご要望などを入力してください"></textarea>
                </div>
              </div>
            </li>
            <li>
              <p class="c-text__lv3 c-text__weight--900 c-text__main c-text--center">本当に退会しますか？</p>
              <p class="c-text__lv5 c-text--center">退会してしまうと、あなたの入力したさまざまな情報はすべて削除され、復元できなくなってしまいます。<br />
              もしも転職活動にお疲れなら、プロフィールを一旦「非掲載」とし、転職活動をお休みすることも可能です。</p>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__center c-column">
            <!-- <input type="submit" class="c-button__lg" value="入力内容を確認"> -->
            <a href="{{ route('index') }}" class="c-button__lg">退会をキャンセル</a>
            <a class="c-button__line c-button__min" href="{{ route('index') }}?flash=successWithdrawal">退会する</a>
          </div>
        </div>
      </form>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
