@extends('layouts.layout_auth')

@section('content')
    <div class="l-container l-auth">
        <div class="p-login p-login__reset">
            <div class="p-login__head">
                <div class="c-icon c-icon__ok"></div>
                <h2 class="title">メールを送信しました</h2>
            </div>
            <div class="p-login__body">
                <ul class="p-listForm">
                    <li>
                        <div class="body">
                            <p class="c-text__lv5 c-text--center">ご入力いただいたメールアドレスに<br/>新パスワードを記載したメールを送信いたしました。</p>
                            <p class="c-text__lv5 c-text--center">ご登録のメールアドレスと記載のパスワードを使用し、<br/>再度ログインをお願いします。</p>
                        </div>
                    </li>
                    <li>
                        <div class="c-btnarea f-column f-a_center">
                            <a href="{{ route('auth') }}" class="c-button c-button__wide c-button__round shadow">ログインページへ</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
