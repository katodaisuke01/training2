@extends('layouts.company.default')

@section('page_class', 'l-page')
@section('title', '企業からのお知らせ')

@section('content')
  @component('component.company.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--edit"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{route('companyPostCreate')}}" class="c-button__min">新規作成</a>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box bg-fff">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">投稿数</span>89</p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="sortable"><p class="c-text__label">登録日時</p></th>
              <th class=""><p class="c-text__label">投稿タイトル</p></th>
              <th class="sortable"><p class="c-text__label">ステータス</p></th>
              <th class="sortable"><p class="c-text__label">PV数</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function companyList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs678','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_1.png',
                    'post_title' => '研修紹介の動画','checked' => '43'],
                    ['time' => '2022/05/28 17:04', 'id' => 'VgcFRs677','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_2.png',
                    'post_title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー','checked' => '42'],
                    ['time' => '2022/05/29 17:04', 'id' => 'VgcFRs679','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_3.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール！','checked' => '45'],
                    ['time' => '2022/05/30 17:05', 'id' => 'VgcFRs680','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_4.png',
                    'post_title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー','checked' => '41'],
                    ['time' => '2022/05/31 17:01', 'id' => 'VgcFRs665','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_5.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備2！','checked' => '13'],
                    ['time' => '2022/06/01 17:04', 'id' => 'VgcFRs681','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_6.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備1！','checked' => '23'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs682','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_7.png',
                    'post_title' => '研修紹介の動画','checked' => '43'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs683','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_8.png',
                    'post_title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー','checked' => '93'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs684','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_9.png',
                    'post_title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー','checked' => '83'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs685','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_10.png',
                    'post_title' => '研修紹介の動画','checked' => '43'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs691','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_11.png',
                    'post_title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー','checked' => '43'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs700','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_12.png',
                    'post_title' => '研修紹介の動画','checked' => '32'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs678','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_1.png',
                    'post_title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー','checked' => '33'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs677','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_2.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール事前準備1！','checked' => '12'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs679','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_3.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール事前準備2！','checked' => '45'],
                    ['time' => '2022/05/27 17:05', 'id' => 'VgcFRs680','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_4.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備3','checked' => '41'],
                    ['time' => '2022/05/27 17:01', 'id' => 'VgcFRs665','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_5.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備4','checked' => '13'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs681','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_6.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備5','checked' => '23'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs682','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_7.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備6','checked' => '43'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs683','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_8.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備7','checked' => '93'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs684','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_9.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備8','checked' => '83'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs685','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_10.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備9','checked' => '345'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs691','status_class' => 'gray','status' => '非掲載','pic' => '../image/sample/company/img_11.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備10','checked' => '567'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs700','status_class' => 'ok','status' => '掲載中','pic' => '../image/sample/company/img_12.png',
                    'post_title' => '【福利厚生】自社商品のファミリーセール準備11','checked' => '493'],
                  ];
                }
              ?>
              @php($companyList = companyList())
              @foreach($companyList as $company)
                <tr data-href="{{route('companyPostEdit')}}">
                  <td><p class="c-text__min">{{ $company['time'] }}</p></td>
                  <td><p class="c-text__lv6">{{ $company['post_title'] }}</p></td>
                  <td><p class="c-text__lv6 c-text__{{ $company['status_class'] }} c-text__weight--700">{{ $company['status'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__main c-text__weight--700 c-text--center">{{ $company['checked'] }}</p></td>
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
