@extends('layouts.company.auth')

@section('page_class', 'l-auth')
@section('aside_class', '')
@section('title', 'メール送信完了')

@section('content')
  @component('component.company.frame._auth')
    @slot('body')
      <div class="c-bulge c-box">
        <div class="c-box__head">
          <p class="c-text__lv3 c-text--center">パスワード変更メール送信完了</p>
          <p class="c-text__lv5 c-text--center">
            メールを送信しました。<br />
            届きましたメールに記載のURLより<br />
            パスワードの再登録を行ってください
          </p>
        </div>
        <div class="c-box__body">
          <ul class="p-list">
            <li>
              <div class="c-buttonArea__center">
                <a href="{{ route('companyLogin') }}" class="c-button__lg">ログインページへ</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
