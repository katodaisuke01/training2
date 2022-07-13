@extends('layouts.admin.default')

@section('page_class', 'l-form')
@section('title', 'その他設定 編集')
@section('page_title', 'よくある質問')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="p-form__body c-concave">
          <ul class="p-list">
            <li class="c-full">
              <div class="head">
                <p>質問<strong>1</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>2</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>3</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>4</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>5</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>6</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>7</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
            <li class="c-full">
              <div class="head">
                <p>質問<strong>8</strong></p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <input type="text" placeholder="質問を入力してください" value="">
                </div>
              </div>
              <div class="foot">
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="回答を入力してください"></textarea>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{ route('adminSetting') }}" class="c-button__min c-button__gray">戻る</a>
            <a href="?flash=successSave" class="c-button">保存する</a>
            <!-- <input class="c-button" type="submit" value="保存する"> -->
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
