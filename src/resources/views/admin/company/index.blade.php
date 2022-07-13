@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', '企業管理')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--building"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('adminCompanyCreate')}}" class="c-button__min">新規作成</a>
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
          <table class="p-table p-table__1350 data-tables">
            <thead>
              <th class="w_100 sortable"><p class="c-text__label">登録日時</p></th>
              <th class=""><p class="c-text__label">ロゴ・企業名</p></th>
              <th class="sortable"><p class="c-text__label">ステータス</p></th>
              <th class="sortable"><p class="c-text__label">公開求人数</p></th>
              <th class="sortable"><p class="c-text__label">お知らせ投稿数</p></th>
              <th class="sortable"><p class="c-text__label">気になる!数</p></th>
              <th class="sortable"><p class="c-text__label">スカウト数</p></th>
              <th class="sortable"><p class="c-text__label">応募受信数</p></th>
              <th class="sortable"><p class="c-text__label">気になる!受信数</p></th>
              <th class="sortable"><p class="c-text__label">採用数</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function companyList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs678','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_1.png',
                    'company_name' => '株式会社MIKIWAME','checked' => '43','apply' => '8','beChecked' => '38','scout' => '11'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs677','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_2.png',
                    'company_name' => '株式会社インターコンチネンタル','checked' => '42','apply' => '7','beChecked' => '28','scout' => '10'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs679','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_3.png',
                    'company_name' => '株式会社佐藤工業','checked' => '45','apply' => '5','beChecked' => '34','scout' => '12'],
                    ['time' => '2022/05/27 17:05', 'id' => 'VgcFRs680','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_4.png',
                    'company_name' => '株式会社ジオグラフィティー','checked' => '41','apply' => '12','beChecked' => '18','scout' => '2'],
                    ['time' => '2022/05/27 17:01', 'id' => 'VgcFRs665','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_5.png',
                    'company_name' => '株式会社マイケル','checked' => '13','apply' => '4','beChecked' => '34','scout' => '1'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs681','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_6.png',
                    'company_name' => '株式会社ジョンスミス','checked' => '23','apply' => '1','beChecked' => '29','scout' => '3'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs682','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_7.png',
                    'company_name' => '株式会社スタンフォードワシントンジョン','checked' => '43','apply' => '2','beChecked' => '19','scout' => '22'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs683','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_8.png',
                    'company_name' => '株式会社トラディショナル','checked' => '93','apply' => '3','beChecked' => '20','scout' => '19'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs684','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_9.png',
                    'company_name' => '株式会社ひふみ','checked' => '83','apply' => '10','beChecked' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs685','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_10.png',
                    'company_name' => '株式会社ペンドラゴン','checked' => '43','apply' => '8','beChecked' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs691','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_11.png',
                    'company_name' => '株式会社アカツキ','checked' => '43','apply' => '7','beChecked' => '38','scout' => '12'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs700','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_12.png',
                    'company_name' => '株式会社Lorem Ipsam','checked' => '43','apply' => '6','beChecked' => '38','scout' => '12'],
                  ];
                }
              ?>
              @php($companyList = companyList())
              @foreach($companyList as $company)
                <tr data-href="{{route('adminCompanyDetail')}}">
                  <td><p class="c-text__min">{{ $company['time'] }}</p></td>
                  <td>
                    <div class="f-a_center">
                      <div class="c-image__logo" style="background-image:url({{ $company['pic'] }})"></div>
                      <p class="c-text__lv6">{{ $company['company_name'] }}</p>
                    </div>
                  </td>
                  <td><p class="c-text__lv6 c-text__{{ $company['status_class'] }} c-text__weight--700">{{ $company['status'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $company['scout'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $company['checked'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $company['checked'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $company['apply'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text--center">{{ $company['beChecked'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text--center">{{ $company['scout'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text--center">{{ $company['beChecked'] }}</p></td>
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
