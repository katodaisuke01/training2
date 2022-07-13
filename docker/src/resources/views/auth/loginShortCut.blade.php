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
                <form action="{{ route('industry.login') }}" method="POST" id="login_form">
                    @csrf
                    <ul class="p-listForm">
                        <li>
                            <div class="body">
                                <div class="c-input c-radio switch">
                                    <input type="radio" checked="" id="stuff" name="entrance" value=""/>
                                    <label for="stuff" id="js-stuff"
                                           data-action="{{ route('industry.login') }}">スタッフ</label>
                                    <input type="radio" id="manager" name="entrance" value=""/>
                                    <label for="manager" id="js-manager"
                                           data-action="{{ route('admin.login') }}">管理者</label>
                                </div>
                            </div>
                        </li>
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
                                @if($errors->any())
                                    @foreach($errors->all() as $message)
                                        <p class="c-text__error" style="display:inline-block;">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </li>
                        <li>
                            <div class="c-btnarea f-column f-a_center">
                                <input type="submit" class="c-button c-button__round c-button__full sha" value="ログイン">
                                <!-- <input type="submit" class="button button__round shadow" value="ログイン"> -->
                                <a class="c-button c-button__text" href="#">パスワードの変更はこちらから</a>
                            </div>
                        </li>
                    </ul>
                    <input type="hidden" name="industry_group_id" placeholder="事業所ID" value="{{$industry_group_id}}"/>
                </form>
            </div>
        </div>
    </div>
@endsection
