@extends('layouts.admin.default')

@section('page_class', 'l-home')
@section('title', 'コンテンツ投稿管理')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--post"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('adminPostCreate')}}" class="c-button__min">新規作成</a>
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
              <th class="sortable"><p class="c-text__label">更新日時</p></th>
              <th class="sortable"><p class="c-text__label">ステータス</p></th>
              <th class=""><p class="c-text__label">投稿タイトル</p></th>
              <th class="sortable"><p class="c-text__label">PV数</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function userList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs678','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_1.png',
                    'post_title' => '企業ページにINFORMATIONページがアップデートされました','pv' => '43','apply' => '8','bepv' => '38','scout' => '11'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs677','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/user/img_2.png',
                    'post_title' => '株式会社キャラバン阿部鷹文 取締役と対談 -DXの近未来とは-','pv' => '42','apply' => '7','bepv' => '28','scout' => '10'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs679','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_3.png',
                    'post_title' => '適職診断が追加されました！','pv' => '45','apply' => '5','bepv' => '34','scout' => '12'],
                    ['time' => '2022/05/27 17:05', 'id' => 'VgcFRs680','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_4.png',
                    'post_title' => 'ビジネス観を捨てた時に見つけられるビジネス勘という考え','pv' => '41','apply' => '12','bepv' => '18','scout' => '2'],
                    ['time' => '2022/05/27 17:01', 'id' => 'VgcFRs665','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/user/img_5.png',
                    'post_title' => '株式会社キャラバン阿部鷹文 取締役と対談 -DXの近未来とは-','pv' => '13','apply' => '4','bepv' => '34','scout' => '1'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs681','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_6.png',
                    'post_title' => 'ビジネス観を捨てた時に見つけられるビジネス勘という考え','pv' => '23','apply' => '1','bepv' => '29','scout' => '3'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs682','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_7.png',
                    'post_title' => '企業ページにINFORMATIONページがアップデートされました','pv' => '43','apply' => '2','bepv' => '19','scout' => '22'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs683','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/user/img_8.png',
                    'post_title' => '適職診断が追加されました！','pv' => '93','apply' => '3','bepv' => '20','scout' => '19'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs684','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_9.png',
                    'post_title' => 'ビジネス観を捨てた時に見つけられるビジネス勘という考え','pv' => '83','apply' => '10','bepv' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs685','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_10.png',
                    'post_title' => 'サイトがアップデートされました！','pv' => '43','apply' => '8','bepv' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs691','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/user/img_11.png',
                    'post_title' => '株式会社キャラバン阿部鷹文 取締役と対談 -DXの近未来とは-','pv' => '43','apply' => '7','bepv' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs700','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/user/img_12.png',
                    'post_title' => 'ビジネス観を捨てた時に見つけられるビジネス勘という考え','pv' => '43','apply' => '6','bepv' => '38','scout' => '12'],
                  ];
                }
              ?>
              @php($userList = userList())
              @foreach($userList as $user)
                <tr data-href="{{ route('adminPostEdit') }}">
                  <td><p class="c-text__min">{{ $user['time'] }}</p></td>
                  <td><p class="c-text__{{ $user['status_class'] }} c-text__lv5">{{ $user['status'] }}</p></td>
                  <td><p class="">{{ $user['post_title'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700">{{ $user['pv'] }}</p></td>
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
