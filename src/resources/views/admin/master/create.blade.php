@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', 'マスター管理 新規作成')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--master"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="p-form__body c-concave">
          <ul class="p-list__wrap">
            <li>
              <div class="head">
                <p>公開ステータス</p>
              </div>
              <div class="body">
                <div class="c-radio c-switch">
                  <input type="radio" name="publish" id="1" checked>
                  <label for="1">公開</label>
                  <input type="radio" name="publish" id="2">
                  <label for="2">非公開</label>
                </div>
              </div>
            </li>
            <li>
              <div class="head">
                <p>マスター</p>
              </div>
              <div class="body">
                <div class="c-input__select">
                  <select name="scope_1">
                    <option value="0">仕事に求めるやりがい</option>
                    <option value="1">パーソナリティー</option>
                    <option value="0">こだわり条件</option>
                  </select>
                </div>
              </div>
            </li>
            <li id="target_1" style="display:none;">
              <div class="head">
                <p>ジャンル</p>
              </div>
              <div class="body">
                <div class="c-input__select">
                  <select name="">
                    <option>性格について</option>
                    <option>趣味について</option>
                    <option>仕事について</option>
                    <option>スポーツについて</option>
                    <option>グルメについて</option>
                    <option>その他</option>
                  </select>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>内容</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="マスターとなる選択肢を入力してください" value="">
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{ route('adminMaster') }}" class="c-button__min c-button__gray">戻る</a>
            <input class="c-button" type="submit" value="保存する">
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
