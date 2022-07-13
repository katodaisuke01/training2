@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', '企業管理 アカウント')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--building"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('adminCompanyAccountCreate')}}" class="c-button__min">新規作成</a>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">登録アカウント数</span>89</p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="sortable"><p class="c-text__label">登録日時</p></th>
              <th class="sortable"><p class="c-text__label">氏名</p></th>
              <th class="sortable"><p class="c-text__label">性別</p></th>
              <th class=""><p class="c-text__label">メールアドレス</p></th>
              <th class="sortable"><p class="c-text__label">ステータス</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function companyList(){
                  return [
                    ['time' => '2022/06/26 11:04','gender' => '男性','mail' => 'yuichi.f@mail.com','status_class' => 'ok','status' => '利用中','account_name' => '福永 祐一'],
                    ['time' => '2022/06/22 12:04','gender' => '男性','mail' => 'eda.t@mail.com','status_class' => 'gray','status' => '停止中','account_name' => '江田 照男'],
                    ['time' => '2022/06/21 13:04','gender' => '男性','mail' => 'ryuji.w@mail.com','status_class' => 'ok','status' => '利用中','account_name' => '和田 竜二'],
                    ['time' => '2022/06/15 14:06','gender' => '女性','mail' => 'nanako.f@mail.com','status_class' => 'ok','status' => '利用中','account_name' => '藤田 菜々子'],
                    ['time' => '2022/06/14 15:01','gender' => '男性','mail' => 'remerre.c@mail.com','status_class' => 'gray','status' => '停止中','account_name' => 'クリストフ ルメール'],
                    ['time' => '2022/06/12 16:04','gender' => '男性','mail' => 'norihiro.y@mail.com','status_class' => 'ok','status' => '利用中','account_name' => '横山 典弘'],
                    ['time' => '2022/05/03 17:09','gender' => '男性','mail' => 'yutaka.t@mail.com','status_class' => 'ok','status' => '利用中','account_name' => '武 豊'],
                    ['time' => '2022/05/02 18:09','gender' => '男性','mail' => 'koichi.k@mail.com','status_class' => 'gray','status' => '停止中','account_name' => '北村 宏一'],
                  ];
                }
              ?>
              @php($companyList = companyList())
              @foreach($companyList as $company)
                <tr data-href="{{route('adminCompanyAccountEdit')}}">
                  <td><p class="c-text__min">{{ $company['time'] }}</p></td>
                  <td><p class="c-text__lv5 c-text__weight--700">{{ $company['account_name'] }}</p></td>
                  <td><p class="c-text__lv5">{{ $company['gender'] }}</p></td>
                  <td><p class="c-text__lv5">{{ $company['mail'] }}</p></td>
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
