@extends('layouts.layout_auth')

@section('content')
    <div class="l-container l-auth l-auth__login">
        <div class="p-login">
            <div class="p-login__head">
                <div class="c-image"></div>
                <img src="{{asset('image/logo/logo.svg')}}" height="50" class="logo">
                <h2 class="title">産地スタッフワークシステム</h2>
            </div>
            <div class="p-login__body">
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
                                <div class="c-input c-radio switch">
                                    <input type="radio" checked="" id="stuff" name="entrance" value=""/>
                                    <label for="stuff">スタッフ</label>
                                    <input type="radio" id="manager" name="entrance" value=""/>
                                    <label for="manager">管理者</label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="body">
                                <div class="c-input">
                                    <input type="email" id="email" name="email" placeholder="ユーザーID（メールアドレス）" value=""/>
                                </div>
                                <p class="c-text__error">メールアドレスは半角英数で正しく入力してください。</p>
                            </div>
                        </li>
                        <li>
                            <div class="body">
                                <div class="c-input">
                                    <input type="password" id="password" name="password" placeholder="パスワード" value=""/>
                                </div>
                                <p class="c-text__error">パスワードは半角英数で正しく入力してください。</p>
                            </div>
                        </li>
                        <li>
                            <div class="c-btnarea f-column f-a_center">
                                <a href="{{route('market')}}" class="c-button c-button__round c-button__full shadow">ログイン</a>
                                <a href="{{route('home')}}"
                                   class="c-button c-button__line c-button__round c-button__min shadow">管理ページログイン<small>（仮置き）</small></a>
                                <!-- <input type="submit" class="button button__round shadow" value="ログイン"> -->
                                <a class="c-button c-button__text" href="{{ route('reset') }}">パスワードの変更はこちらから</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
