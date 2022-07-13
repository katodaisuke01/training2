<?php
$url = $_SERVER['REQUEST_URI'];
?>
@if(strstr($url,'admin'))
<div class="p-setting">
  <div class="l-12 l-12--gap16">
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('adminCompanyEdit') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">企業情報</p>
          <p class="c-text__note">ロゴマークや会社ページに掲載する情報の登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('adminCompanyAccount') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">担当者一覧</p>
          <p class="c-text__note">本システムを使用し、採用活動を行うメンバーの登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('adminCompanyTemplate') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">メッセージテンプレート</p>
          <p class="c-text__note">スカウトや採用選考で使用するメッセージテンプレートの登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('adminCompanyIp') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">ログインIPアドレス制限</p>
          <p class="c-text__note">ログイン可能なIPアドレスの制限設定ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('adminCompanyBilling') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">請求先情報</p>
          <p class="c-text__note">請求先とするメールアドレス、住所、担当者名の登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('adminCompanyBlock') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">アカウントブロック</p>
          <p class="c-text__note">規約違反や問題行為に至る求職者をブロックすることができます</p>
        </div>
      </a>
    </div>
  </div>
</div>
@else
<div class="p-setting">
  <div class="l-12 l-12--gap16">
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('companyEdit') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">企業情報</p>
          <p class="c-text__note">ロゴマークや会社ページに掲載する情報の登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('companyAccount') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">担当者一覧</p>
          <p class="c-text__note">本システムを使用し、採用活動を行うメンバーの登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('companyTemplate') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">メッセージテンプレート</p>
          <p class="c-text__note">スカウトや採用選考で使用するメッセージテンプレートの登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('companyIp') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">ログインIPアドレス制限</p>
          <p class="c-text__note">ログイン可能なIPアドレスの制限設定ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('companyBilling') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">請求先情報</p>
          <p class="c-text__note">請求先とするメールアドレス、住所、担当者名の登録・編集ができます</p>
        </div>
      </a>
    </div>
    <div class="l-6">
      <a class="c-panel bg-fff" href="{{ route('companyBlock') }}">
        <div class="c-text">
          <p class="c-text__lv4 c-text__weight--900 c-text__main">アカウントブロック</p>
          <p class="c-text__note">規約違反や問題行為に至る求職者をブロックすることができます</p>
        </div>
      </a>
    </div>
  </div>
</div>
@endif