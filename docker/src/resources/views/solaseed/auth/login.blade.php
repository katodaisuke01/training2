@extends('layouts.layout_solaseed')
@section('page_class', 'l-solaseed l-auth')
@section('title', '生鮮・物流DX管理画面 | ログイン')

@section('content')
    <div class="l-auth__cover">
        <div class="p-login">
            <div class="p-login__head">
                <img src="{{asset('image/logo/logo_white.svg')}}" height="50" class="logo">
                <h2 class="c-text__lv4 c-text--center c-text__weight--900">生鮮・物流DX管理画面</h2>
            </div>
            <div class="p-login__body">
                <form action="{{ route('solaseed.login') }}" method="POST" id="login_form">
                    @csrf
                    <ul class="p-listForm">
                        @if($delivery_partner_id === '')
                            <li>
                                <div class="body">
                                    <div class="c-input c-input__full">
                                        <input type="text" id="text" name="delivery_partner_id" placeholder="事業者ID"
                                               value=""/>
                                    </div>
                                    @if ($errors->has('delivery_partner_id'))
                                        <p class="c-text__error" style="display:inline-block;">
                                            {{ __($errors->first('delivery_partner_id')) }}
                                        </p>
                                    @endif
                                </div>
                            </li>
                        @else
                            <input type="hidden" name="delivery_partner_id" value="{{ $delivery_partner_id }}"/>
                        @endif
                        <li>
                            <div class="body">
                                <div class="c-input c-input__full">
                                    <input type="text" id="text" name="username" placeholder="ユーザーID" value=""/>
                                </div>
                                @if ($errors->has('username'))
                                    <p class="c-text__error" style="display:inline-block;">
                                        {{ __($errors->first('username')) }}
                                    </p>
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="body">
                                <div class="c-input--pw c-input__full">
                                    <input type="password" id="password" name="password" placeholder="パスワード" value=""/>
                                    <span><i class="c-icon__eye"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="c-text__error" style="display:inline-block;">
                                        {{ __($errors->first('password')) }}
                                    </p>
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="c-btnarea f-column f-a_center">
                                <button tyoe="submit" class="c-button__neon c-button__full shadow">ログイン</button>
                                <a class="c-button__text" href="{{ route('warehouse.forget') }}">パスワードの変更はこちらから</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="p-login__foot">
                <img src="https://www.solaseedair.jp/img/header/logo.png" alt="Solaseedロゴ">
            </div>
        </div>
    </div>
@endsection
