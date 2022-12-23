@extends('cms.layout._page-default')
@section('title', 'ユーザー詳細')
@section('content')
  <div class="p-main">
    @component('cms.component._main-head')
      @slot('main')
      <a href="{{route('cms.user')}}" class="p-main__head__main__txt__btn"></a>
      <h2 class="p-main__head__main__txt__ttl">
        ユーザー詳細
      </h2>
      @endslot
    @endcomponent
    <div class="p-main__body">
      <div class="p-bread">
        <a href="{{route('cms.user')}}">ユーザー管理</a>
        <p>斎藤 啓介</p>
      </div>
      <div class="p-main__wrapper">
        <div class="p-main__sidebar">
          <div class="p-profile u-mb24">
            <div class="p-profile__img">
              <img src="https://placehold.jp/3697c7/ffffff/200x200.png?text=画像">
            </div>
            <div class="p-profile__txt">
              <div class="c-h1 u-mt0 u-mb4">山田 太郎</div>
              <div class="p-profile__sub">やまだ たろう</div>
            </div>
          </div>
          <p>記事とは、現象・存在・状況などを文字からなる単語を組み合わせ、文章で表した事物を、伝えるための文章である。</p>
          <dl class="c-dl--sm">
            <dt>氏名</dt>
            <dd>山田 太郎</dd>
            <dt>フリガナ</dt>
            <dd>ヤマダ タロウ</dd>
            <dt>電話番号</dt>
            <dd>090-1234-5678</dd>
            <dt>メール</dt>
            <dd>sample@example.com</dd>
            <dt>住所</dt>
            <dd>
              〒123-1234<br>
              東京都渋谷区渋谷123 渋谷マンション1201
            </dd>
          </dl>
        </div>
        <div class="p-main__container">
          <div class="p-tab">
            <div class="p-tab__item is-active">基本情報</div>
            <div class="p-tab__item">支払い情報</div>
            <div class="p-tab__item">タブ項目</div>
          </div>
          <h3 class="c-h3">契約内容</h3>
          <div class="c-box">
            契約中のプラン
          </div>
          <h3 class="c-h3">プロフィール</h3>
          <div class="c-box">
            <dl class="c-dl">
              <dt>氏名</dt>
              <dd>山田 太郎</dd>
              <dt>フリガナ</dt>
              <dd>ヤマダ タロウ</dd>
              <dt>電話番号</dt>
              <dd>090-1234-5678</dd>
              <dt>メール</dt>
              <dd>sample@example.com</dd>
              <dt>住所</dt>
              <dd>
                〒123-1234<br>
                東京都渋谷区渋谷123 渋谷マンション1201
              </dd>
            </dl>
          </div>
          <div class="c-box">
            <div class="c-dl__wrapper">
              @foreach([
                '生年月日' => '1988/10/10',
                '性別' => '男性',
                'メールアドレス' => 'sample@example.com',
                '電話番号' => '090-1234-1234',
                '住所' => '
                  〒1230000<br>
                  東京都渋谷区渋谷123<br>
                  渋谷マンション1201',
                '登録日時' => '2022/11/28<br>17:00',
              ] as $title => $data)
                <dl class="c-dl">
                  <dt>{!!$title!!}</dt>
                  <dd>{!!$data!!}</dd>
                </dl>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection