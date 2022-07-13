@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', 'お問合せ管理')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--mail"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">未対応問い合わせ数</span>4</p>
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">対応済問い合わせ数</span>32</p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="sortable"><p class="c-text__label">お問合せ日時</p></th>
              <th class="sortable"><p class="c-text__label">対応</p></th>
              <th class=""><p class="c-text__label">ロゴ・企業名</p></th>
              <th class="sortable"><p class="c-text__label">お問合せジャンル</p></th>
              <th class=""><p class="c-text__label">お問合せタイトル</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function contactList(){
                  return [
                    ['time' => '2022/05/27 17:04','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_1.png',
                    'company_name' => '株式会社MIKIWAME','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs677','status_class' => 'gray','status' => '未対応','pic' => '../image/sample/company/img_2.png',
                    'company_name' => '株式会社インターコンチネンタル','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs679','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_3.png',
                    'company_name' => '株式会社佐藤工業','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:05', 'id' => 'VgcFRs680','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_4.png',
                    'company_name' => '株式会社ジオグラフィティー','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:01', 'id' => 'VgcFRs665','status_class' => 'gray','status' => '未対応','pic' => '../image/sample/company/img_5.png',
                    'company_name' => '株式会社マイケル','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:04', 'id' => 'VgcFRs681','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_6.png',
                    'company_name' => '株式会社ジョンスミス','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs682','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_7.png',
                    'company_name' => '株式会社スタンフォードワシントンジョン','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs683','status_class' => 'gray','status' => '未対応','pic' => '../image/sample/company/img_8.png',
                    'company_name' => '株式会社トラディショナル','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs684','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_9.png',
                    'company_name' => '株式会社ひふみ','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs685','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_10.png',
                    'company_name' => '株式会社ドンキホーテ','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs691','status_class' => 'gray','status' => '未対応','pic' => '../image/sample/company/img_11.png',
                    'company_name' => '株式会社アカツキ','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                    ['time' => '2022/05/27 17:09', 'id' => 'VgcFRs700','status_class' => 'ok','status' => '対応済','pic' => '../image/sample/company/img_12.png',
                    'company_name' => '株式会社Lorem Ipsam','genre' => '利用方法について','title' => '利用方法について教えてくださいタイトル'],
                  ];
                }
              ?>
              @php($contactList = contactList())
              @foreach($contactList as $contact)
                <tr data-href="{{ route('adminContactDetail') }}">
                  <td><p class="c-text__min">{{ $contact['time'] }}</p></td>
                  <td><p class="c-text__{{ $contact['status_class'] }} c-text__lv6">{{ $contact['status'] }}</p></td>
                  <td>
                    <div class="f-a_center">
                      <div class="c-image__logo" style="background-image:url({{ $contact['pic'] }})"></div>
                      <p class="c-text__lv6">{{ $contact['company_name'] }}</p>
                    </div>
                  </td>
                  <td><p class="c-text__lv6">{{ $contact['genre'] }}</p></td>
                  <td><p class="c-text__lv5 c-text__weight--700">{{ $contact['title'] }}</p></td>
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
