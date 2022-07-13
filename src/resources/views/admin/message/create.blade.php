@extends('layouts.admin.form')

@section('page_class', 'l-form')
@section('title', 'メッセージ管理 ')
@section('page_title', 'お知らせメッセージ新規作成')

@section('content')
  @component('component.admin.frame._narrow')
    @slot('head')
      <div class="c-icon__w32 c-icon--message"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title') </small></h1>
      <div class="c-buttonArea__end">
        <form action="">
          <div class="c-checkbox c-checkbox__button">
            <input type="checkbox" id="flag" name="flag">
            <label for="flag"><span class="c-icon--flag c-icon__w16"></span>フラグチェック</label>
          </div>
        </form>
      </div>
    @endslot
    @slot('body')
      <form action="" class="p-form">
        <div class="p-form__body">
          <div class="c-concave">
            <ul class="p-list">
              <li>
                <div class="head">
                  <p>メッセージ対象の絞り込み</p>
                </div>
                <div class="body">
                  <div class="c-input--center">
                    <div class="c-input__select">
                      <select name="">
                        <option value="">求職者ユーザー</option>
                        <option value="">企業アカウント</option>
                      </select>
                    </div>
                    <div class="c-input__select">
                      <select name="">
                        <option value="">すべて</option>
                        <option value="">面接日3日前のユーザー</option>
                        <option value="">面接日前日のユーザー</option>
                      </select>
                    </div>
                    <div class="c-input__select">
                      <select name="">
                        <option value="">すべて</option>
                        <option value="">企業アカウントの絞り込み対象</option>
                        <option value="">企業アカウントの絞り込み対象</option>
                        <option value="">企業アカウントの絞り込み対象</option>
                      </select>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>メッセージタイトル</p>
                </div>
                <div class="body">
                  <div class="c-input--full">
                    <input type="text" placeholder="メッセージタイトルを入力" value="">
                  </div>
                  <p class="c-text__error">この項目は必ず入力してください</p>
                </div>
              </li>
              <li>
                <div class="head required">
                  <p>メッセージ内容</p>
                </div>
                <div class="body">
                  <div class="c-input--full">
                    <textarea name="" placeholder="メッセージタイトルを入力" cols="30" rows="10"></textarea>
                  </div>
                </div>
                <p class="c-text__error">この項目は必ず入力してください</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{route('adminMessage')}}" class="c-button__min c-button__gray">キャンセル</a>
            <input type="submit" class="c-button" value="送信する">
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
