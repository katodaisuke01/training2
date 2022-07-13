@extends('layouts.layout_authAdmin')

@section('content')
    <div class="l-container l-auth l-auth__login">
        <div class="p-login c-box shadow">
            <div class="p-login__head">
                <img src="{{asset('image/logo/logo.svg')}}" height="50" class="logo">
                <h2 class="c-text__lv3 c-text--center c-text__weight--700">倉庫業務システム<br/>管理画面</h2>
            </div>
            <div class="p-login__body">
                <form action="{{ route('warehouse.login') }}" method="POST" id="login_form">
                    @csrf
                    <ul class="p-listForm">
                        <li>
                            <div class="body">
                                <div class="c-input">
                                    <input type="number" id="text" name="m_business_id" placeholder="事業所ID" value=""/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="body">
                                <div class="c-input">
                                    <input type="text" id="text" name="username" placeholder="ユーザーID" value=""/>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="body">
                                <div class="c-input">
                                    <input type="password" id="password" name="password" placeholder="パスワード" value=""/>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $message)
                                        <p class="c-text__error" style="display:inline-block;">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="c-btnarea f-column f-a_center">
                                <input type="submit" class="c-button c-button__round c-button__full shadow"
                                       value="ログイン">
                            <!-- <a href="{{route('warehouse.home')}}" class="c-button c-button__round c-button__full shadow">ログイン</a> -->
                                <!-- <a href="#" class="c-button c-button__line c-button__round c-button__min shadow">管理ページログイン<small>（仮置き）</small></a> -->
                                <!-- <input type="submit" class="button button__round shadow" value="ログイン"> -->
                                <a class="c-button c-button__text"
                                   href="{{ route('warehouse.forget') }}">パスワードの変更はこちらから</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
