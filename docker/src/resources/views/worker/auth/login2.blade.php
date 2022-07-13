@extends('layouts.layout_authAdmin')
@section('page_class', 'l-warehouse__user l-auth_login')
@section('title', '倉庫DX | ログイン')

@section('content')
    <div class="l-container l-auth">
        <div class="p-login">
            <div class="p-login__head">
                <img src="{{asset('image/logo/logo.svg')}}" height="50" class="logo">
                <h2 class="c-text__lv2 c-text--center c-text__weight--900">倉庫DXシステム<br/>作業画面ログイン</h2>
            </div>
            <div class="p-login__body">
                <form action="{{ route('worker.login') }}" method="POST" id="login_form">
                    @csrf
                    <input type="hidden" name="m_business_id" placeholder="事業所ID" value="{{$m_business_id}}"/>
                    <ul class="p-listForm">
                        <li>
                            <div class="body">
                                <div class="c-input">
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
                                <div class="c-input">
                                    <input type="password" id="password" name="password" placeholder="パスワード" value=""/>
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
                                <!-- <input type="submit" class="c-button__user c-button__full shadow" value="ログイン"> -->
                                <button type="submit" class="c-button__user c-button__full shadow">ログイン</button>
                                <!-- <a href="#" class="c-button c-button__line c-button__round c-button__min shadow">管理ページログイン<small>（仮置き）</small></a> -->
                                <!-- <input type="submit" class="button button__round shadow" value="ログイン"> -->
                                <a class="c-button__text" href="{{ route('warehouse.forget') }}">パスワードの変更はこちらから</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
