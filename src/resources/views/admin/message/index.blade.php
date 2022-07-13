@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', 'メッセージ管理')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--message"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a class="c-button__min" href="{{route('adminMessageCreate')}}">新規お知らせメッセージ作成</a>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">スレッド数</span>112</p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <th class="sortable"><p class="c-text__label">最終投稿日時</p></th>
              <th class="sortable"><p class="c-text__label">フラグ</p></th>
              <th class=""><p class="c-text__label">ロゴ・企業名</p></th>
              <th class=""><p class="c-text__label">画像・ユーザー名</p></th>
              <th class="sortable"><p class="c-text__label">選考ステータス</p></th>
              <th class=""></th>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください -->
              <?php
                function messageList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'flag' => 'on','status' => 'スカウト','pic' => '../image/sample/user/img_1.png',
                    'name' => '山田 一郎','company_name' => '株式会社MIKIWAME', 'company_pic' => '../image/sample/company/img_1.png'],
                    ['time' => '2022/05/27 17:04', 'flag' => 'on','status' => '一次面接通過','pic' => '../image/sample/user/img_2.png',
                    'name' => '田中 葉子','company_name' => '株式会社インターコンチネンタル', 'company_pic' => '../image/sample/company/img_2.png'],
                    ['time' => '2022/05/27 17:04', 'flag' => 'off','status' => 'スカウト','pic' => '../image/sample/user/img_3.png',
                    'name' => '斎藤 一','company_name' => '株式会社佐藤工業', 'company_pic' => '../image/sample/company/img_3.png'],
                    ['time' => '2022/05/27 17:05', 'flag' => 'on','status' => '二次面接通過','pic' => '../image/sample/user/img_4.png',
                    'name' => '木村 次郎','company_name' => '株式会社ジオグラフィティー', 'company_pic' => '../image/sample/company/img_4.png'],
                    ['time' => '2022/05/27 17:01', 'flag' => 'on','status' => '一次面接通過','pic' => '../image/sample/user/img_5.png',
                    'name' => '青木 三郎','company_name' => '株式会社マイケル', 'company_pic' => '../image/sample/company/img_5.png'],
                    ['time' => '2022/05/27 17:04', 'flag' => 'off','status' => 'スカウト','pic' => '../image/sample/user/img_6.png',
                    'name' => '狩野 沙織','company_name' => '株式会社ジョンスミス', 'company_pic' => '../image/sample/company/img_6.png'],
                    ['time' => '2022/05/27 17:09', 'flag' => 'off','status' => '二次面接通過','pic' => '../image/sample/user/img_7.png',
                    'name' => '勅使河原 かおり','company_name' => '株式会社スタンフォードワシントンジョン', 'company_pic' => '../image/sample/company/img_7.png'],
                    ['time' => '2022/05/27 17:09', 'flag' => 'on','status' => '一次面接通過','pic' => '../image/sample/user/img_8.png',
                    'name' => '田中 一郎','company_name' => '株式会社トラディショナル', 'company_pic' => '../image/sample/company/img_8.png'],
                    ['time' => '2022/05/27 17:09', 'flag' => 'off','status' => 'スカウト','pic' => '../image/sample/user/img_9.png',
                    'name' => '斎藤 一','company_name' => '株式会社ひふみ', 'company_pic' => '../image/sample/company/img_9.png'],
                    ['time' => '2022/05/27 17:09', 'flag' => 'off','status' => 'スカウト','pic' => '../image/sample/user/img_10.png',
                    'name' => '木村 次郎','company_name' => '株式会社ペンドラゴン', 'company_pic' => '../image/sample/company/img_10.png'],
                    ['time' => '2022/05/27 17:09', 'flag' => 'off','status' => '一次面接通過','pic' => '../image/sample/user/img_11.png',
                    'name' => '青木 三郎','company_name' => '株式会社アカツキ', 'company_pic' => '../image/sample/company/img_11.png'],
                    ['time' => '2022/05/27 17:09', 'flag' => 'off','status' => 'スカウト','pic' => '../image/sample/user/img_12.png',
                    'name' => '狩野 みずほ','company_name' => '株式会社Lorem Ipsam', 'company_pic' => '../image/sample/company/img_12.png'],
                  ];
                }
              ?>
              @php($messageList = messageList())
              @foreach($messageList as $message)
                <tr data-href="{{ route('adminMessageDetail') }}">
                  <td><p class="c-text__min">{{ $message['time'] }}</p></td>
                  <td style="font-size:0"><div class="{{ $message['flag'] }} c-icon__w16 c-icon--flag"></div>{{ $message['flag'] }}</td>
                  <td>
                    <div class="f-a_center">
                      <div class="c-image__logo" style="background-image:url({{ $message['company_pic'] }})"></div>
                      <p class="c-text__lv6">{{ $message['company_name'] }}</p>
                    </div>
                  </td>
                  <td>
                    <div class="f-a_center">
                      <div class="c-image__circle" style="background-image:url({{ $message['pic'] }})"></div>
                      <p class="c-text__lv6">{{ $message['name'] }}</p>
                    </div>
                  </td>
                  <td><p class="c-text__weight--700 c-text__lv5">{{ $message['status'] }}</p></td>
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
