@extends('layouts.layout_authAdmin')
@section('page_class', 'l-warehouse__user l-auth_login')
@section('title', '倉庫DX | ログイン')

@section('content')
    <div class="l-container l-auth">
        <div class="p-login">
            <div class="p-login__head">
                <div class="c-icon c-icon__question"></div>
                <h2 class="c-text__lv3 c-text--center c-text__weight--900">パスワードをお忘れですか？</h2>
                <p class="c-text__lv5 c-text--center">
                    ログイン用のパスワードを再発行いたします。<br/>
                    ご登録いただいているメールアドレスをご入力ください。
                </p>
                @if($errors->any())
                    <div class="c-text__error">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                @csrf
            </div>
            <div class="p-login__body">
                <form action="" method="POST" id="login_form">
                    <ul class="p-listForm">
                        <li>
                            <div class="body">
                                <div class="c-input">
                                    <input type="email" class="" id="email" name="email" placeholder="メールアドレス"
                                           value=""/>
                                </div>
                                <p class="c-text__error">メールアドレスは半角英数で正しく入力してください。</p>
                            </div>
                        </li>
                        <li>
                            <div class="c-btnarea f-column f-a_center">
                                <!-- <input type="submit" class="button button__round shadow" value="ログイン"> -->
                                <a href="{{route('warehouse.complete')}}" class="c-button__user c-button__full shadow">送信する</a>
                                <a class="c-button c-button__text" href="javascript:history.back()">ログインへ戻る</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
