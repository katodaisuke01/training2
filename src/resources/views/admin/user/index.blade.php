@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', 'ユーザー管理')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--user"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('userCreate')}}" class="c-button__min">新規作成</a>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">掲載中ユーザー数</span>138</p>
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">非掲載ユーザー数</span>54</p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="w_100 sortable"><p class="c-text__label">登録日時</p></th>
              <th class="sortable"><p class="c-text__label">ID</p></th>
              <th class="sortable"><p class="c-text__label">ステータス</p></th>
              <th class=""><p class="c-text__label">画像</p></th>
              <th class=""><p class="c-text__label">ユーザー名</p></th>
              <th class="sortable"><p class="c-text__label">気になる!数</p></th>
              <th class="sortable"><p class="c-text__label">応募数</p></th>
              <th class="sortable"><p class="c-text__label">気になる!受信数</p></th>
              <th class="sortable"><p class="c-text__label">スカウト受信数</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function userList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs678','status_class' => 'gray','status' => '退会','pic' => '/image/sample/user/img_1.png',
                    'name' => '山田 一郎','checked' => '43','apply' => '8','beChecked' => '38','scout' => '11'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs677','status_class' => 'main','status' => '非掲載','pic' => '/image/sample/user/img_2.png',
                    'name' => '田中 葉子','checked' => '42','apply' => '7','beChecked' => '28','scout' => '10'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs679','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_3.png',
                    'name' => '斎藤 一','checked' => '45','apply' => '5','beChecked' => '34','scout' => '12'],
                    ['time' => '2022/05/27 17:05', 'id' => 'VgcFRs680','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_4.png',
                    'name' => '木村 次郎','checked' => '41','apply' => '12','beChecked' => '18','scout' => '2'],
                    ['time' => '2022/05/27 17:01', 'id' => 'VgcFRs665','status_class' => 'main','status' => '非掲載','pic' => '/image/sample/user/img_5.png',
                    'name' => '青木 三郎','checked' => '13','apply' => '4','beChecked' => '34','scout' => '1'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs681','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_6.png',
                    'name' => '狩野 沙織','checked' => '23','apply' => '1','beChecked' => '29','scout' => '3'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs682','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_7.png',
                    'name' => '勅使河原 かおり','checked' => '43','apply' => '2','beChecked' => '19','scout' => '22'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs683','status_class' => 'main','status' => '非掲載','pic' => '/image/sample/user/img_8.png',
                    'name' => '田中 一郎','checked' => '93','apply' => '3','beChecked' => '20','scout' => '19'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs684','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_9.png',
                    'name' => '斎藤 一','checked' => '83','apply' => '10','beChecked' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs685','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_10.png',
                    'name' => '木村 次郎','checked' => '43','apply' => '8','beChecked' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs691','status_class' => 'main','status' => '非掲載','pic' => '/image/sample/user/img_11.png',
                    'name' => '青木 三郎','checked' => '43','apply' => '7','beChecked' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs700','status_class' => 'ok','status' => '掲載中','pic' => '/image/sample/user/img_12.png',
                    'name' => '狩野 みずほ','checked' => '43','apply' => '6','beChecked' => '38','scout' => '12'],
                  ];
                }
              ?>
              @php($userList = userList())
              @foreach($userList as $user)
                <tr data-href="{{route('userDetail')}}">
                  <td><p class="c-text__min">{{ $user['time'] }}</p></td>
                  <td><p class="">{{ $user['id'] }}</p></td>
                  <td><p class="c-text__{{ $user['status_class'] }} c-text__lv5">{{ $user['status'] }}</p></td>
                  <td><div class="c-image__circle" style="background-image:url({{ $user['pic'] }})"></div></td>
                  <td><p class="">{{ $user['name'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $user['checked'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $user['apply'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text--center">{{ $user['beChecked'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text--center">{{ $user['scout'] }}</p></td>
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
