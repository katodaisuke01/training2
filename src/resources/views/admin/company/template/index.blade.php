@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', '企業管理 メッセージテンプレート')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--building"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('adminCompanyTemplateCreate')}}" class="c-button__min">新規作成</a>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">登録企業数</span>89</p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="sortable"><p class="c-text__label">登録日時</p></th>
              <th class="sortable"><p class="c-text__label">ジャンル</p></th>
              <th class=""><p class="c-text__label">テンプレートタイトル</p></th>
              <th class="sortable"><p class="c-text__label">ステータス</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function companyList(){
                  return [
                    ['time' => '2022/06/26 11:04', 'genre' => 'スカウト用','status_class' => 'ok','status' => '利用中',
                    'template_title' => 'スカウトテンプレート2'],
                    ['time' => '2022/06/22 12:04', 'genre' => '選考について','status_class' => 'gray','status' => '停止中',
                    'template_title' => '一次選考通過用テンプレート'],
                    ['time' => '2022/06/21 13:04', 'genre' => '選考について','status_class' => 'ok','status' => '利用中',
                    'template_title' => '二次選考通過用テンプレート'],
                    ['time' => '2022/06/15 14:06', 'genre' => '選考について','status_class' => 'ok','status' => '利用中',
                    'template_title' => '三次選考通過用テンプレート'],
                    ['time' => '2022/06/14 15:01', 'genre' => 'お見送り連絡','status_class' => 'gray','status' => '停止中',
                    'template_title' => 'お見送り用テンプレート'],
                    ['time' => '2022/06/12 16:04', 'genre' => 'その他','status_class' => 'ok','status' => '利用中',
                    'template_title' => '繋ぎ用テンプレート'],
                    ['time' => '2022/05/03 17:09', 'genre' => '内定連絡','status_class' => 'ok','status' => '利用中',
                    'template_title' => '内定連絡テンプレート'],
                    ['time' => '2022/05/02 18:09', 'genre' => 'スカウト用','status_class' => 'gray','status' => '停止中',
                    'template_title' => 'スカウトテンプレート1'],
                  ];
                }
              ?>
              @php($companyList = companyList())
              @foreach($companyList as $company)
                <tr data-href="{{route('adminCompanyTemplateEdit')}}">
                  <td><p class="c-text__min">{{ $company['time'] }}</p></td>
                  <td><p class="c-text__lv5">{{ $company['genre'] }}</p></td>
                  <td><p class="c-text__lv5 c-text__main c-text__weight--700">{{ $company['template_title'] }}</p></td>
                  <td><p class="c-text__lv5 c-text__{{ $company['status_class'] }} c-text__weight--700">{{ $company['status'] }}</p></td>
                  <td><div class="c-icon__w16 c-icon--arrow"></div></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
