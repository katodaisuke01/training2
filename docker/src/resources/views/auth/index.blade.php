@extends('layouts.layout_auth')

@section('content')
    <div class="l-container l-auth">
        <div class="p-login">
            <h2 class="title">ログイン</h2>
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
                            <div class="head">
                                <label for="email">メールアドレス</label>
                            </div>
                            <div class="body">
                                <div class="c-input">
                                    <input type="email" class="" id="email" name="email" value="{{ old('email') }}"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="head">
                                <label for="password">パスワード</label>
                            </div>
                            <div class="body">
                                <div class="c-input">
                                    <input type="password" class="" id="password" name="password"/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="c-btnarea f-column f-a_center">
                                <!-- <input type="submit" class="button" value="ログイン"> -->
                                <a href="{{ route('index') }}?flash=successLogin" class="c-button">ログイン</a>
                                <a class="button button__text" href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
