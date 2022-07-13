@extends('layouts.admin.default')
@section('page_class', 'l-page')
@section('title', 'コンテンツ投稿管理 新規作成')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--post"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="l">
          <div class="l-auto">
            <div class="c-concave">
              @include('component._message_form_caution')
              <ul class="p-list">
                <li class="c-full">
                  <div class="head required">
                    <p>投稿タイトル</p>
                  </div>
                  <div class="body">
                    <div class="c-input--full">
                      <input type="text" placeholder="投稿のタイトルを入力してください" value="">
                    </div>
                    <p class="c-text__error">項目に入力してください</p>
                  </div>
                </li>
                <li>
                  <div class="head optional">
                    <p>keywordタグ</p>
                  </div>
                  <div class="body">
                    <div class="c-input c-input--full">
                      <input type="text" placeholder="keywordsを入力してください" value="">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head optional">
                    <p>URLエイリアス設定</p>
                  </div>
                  <div class="body">
                    <div class="c-input c-input--full">
                      <input type="text" placeholder="URLエイリアスを入力してください" value="">
                    </div>
                  </div>
                </li>
                <li>
                  <div class="head optional">
                    <p>動画アップロード</p>
                  </div>
                  <div class="body">
                    <p class="c-text__min">拡張子は.mp4, .mpeg, .mpg、10MB以内のサイズとしてください</p>
                    <div class="c-input--file">
                      <input type="file" id="post_video" name="s_file" accept="video/* multiple">
                      <label for="post_video"></label>
                    </div>
                    <p class="c-text__error">ファイルの拡張子は.mp4, .mpeg, .mpg、10MB以内のサイズとしてください</p>
                  </div>
                </li>
                <li class="c-full">
                  <div class="head required">
                    <p>投稿内容</p>
                  </div>
                  <div class="body">
                    @include ('component.admin._editor')
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="l-fix__300">
            <div class="c-concave">
              <ul class="p-list">
                <li>
                  <div class="head required">
                    <p>サムネイル設定</p>
                  </div>
                  <div class="body">
                    <p class="c-text__min">拡張子はjpgまたはpng、2MB以内のサイズとしてください</p>
                    <div class="c-input--file">
                      <input type="file" id="post_thumbnail" value="">
                      <label for="post_thumbnail"></label>
                    </div>
                    <p class="c-text__error">ファイルの拡張子はjpgまたはpng、2MB以内のサイズとしてください</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p>公開ステータス</p>
                  </div>
                  <div class="body">
                    <div class="c-radio c-switch">
                      <input type="radio" name="publish" id="1">
                      <label for="1">公開</label>
                      <input type="radio" name="publish" id="2" checked>
                      <label for="2">非公開</label>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="c-buttonArea__center">
                    <!-- <input type="submit" class="c-button" value="保存する"> -->
                    <a href="{{ route('adminCompanyEntry') }}?flash=successSave" class="c-button">保存する</a>
                    <a href="{{route('contentDetail')}}" class="c-button__line" target="_blank">表示を確認</a>
                    <a data-remodal-target="modal_delete" class="c-button__gray c-button__min">削除する</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
