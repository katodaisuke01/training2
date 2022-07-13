@extends('layouts.layout_auth')

@section('content')
    <div class="l-container l-auth">
        <div class="p-login　p-login__reset">
            <div class="p-login__head">
                <div class="c-icon c-icon__question"></div>
                <h2 class="title">パスワードをお忘れですか？</h2>
            </div>
            <div class="p-login__body">
                <p class="c-text__lv5 c-text--center">ログイン用のパスワードを再発行いたします。<br/>ご登録いただいているメールアドレスを以下にご入力ください。</p>
                @if($errors->any())
                    <div class="c-text__error">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
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
                                <a href="{{route('resetComplete')}}"
                                   class="c-button c-button__wide c-button__round shadow">送信する</a>
                                <!-- <input type="submit" class="button button__round shadow" value="ログイン"> -->
                                <a class="c-button c-button__text" href="{{ route('auth') }}">ログインへ戻る</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
