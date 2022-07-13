@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__staff"></span>
                    スタッフ管理<small>新規登録</small>
                </h2>
            </div>
            <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="title c-text__main c-text__weight--900">スタッフ情報登録</p>
                            <!-- PW登録は新規登録時はなし -->
                            <!-- <div class="c-buttonArea__end">
                               <a class="c-button__sub c-button__min" href="#">パスワード登録</a>
                            </div> -->
                        </div>
                        <div class="l">
                            <div class="l-fix l-fix__200">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">画像登録</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file c-user">
                                                <input type="file" id="image" name="image">
                                                <label for="image"></label>
                                            </div>
                                            <p class="c-text__note">画像サイズ：最大5MB以内</p>
                                            <!-- <p class="c-text__error">画像アップロードサイズは5MB以内としてください</p> -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">アカウント権限</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-radio switch">
                                                <input type="radio" name="dealing_type" id="account_auth_1" checked
                                                       value="{{ \App\Models\User::TYPE_NORMAL }}">
                                                <label for="account_auth_1">一般社員</label>
                                                <input type="radio" name="dealing_type" id="account_auth_2"
                                                       value="{{ \App\Models\User::TYPE_MANAGER }}">
                                                <label for="account_auth_2">管理者</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="l-auto">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">氏名</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <div class="c-input c-input_200">
                                                    <input type="text" id="" name="last_name" placeholder="姓）山田"
                                                           value="{{ old('last_name') }}">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" id="" name="first_name" placeholder="名）太郎"
                                                           value="{{old('first_name')}}">
                                                </div>
                                            </div>
                                            @if ($errors->has('last_name'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('last_name')) }}
                                                </p>
                                            @endif
                                            @if ($errors->has('first_name'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('first_name')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">フリガナ</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <div class="c-input c-input_200">
                                                    <input type="text" id="" name="last_name_kana" placeholder="姓）ヤマダ"
                                                           value="{{old('last_name_kana')}}">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" id="" name="first_name_kana" placeholder="名）タロウ"
                                                           value="{{old('first_name_kana')}}">
                                                </div>
                                            </div>
                                            @if ($errors->has('last_name_kana'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('last_name_kana')) }}
                                                </p>
                                            @endif
                                            @if ($errors->has('first_name_kana'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('first_name_kana')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">ユーザーID<span class="c-text__unit">半角英数、6文字以上で入力</span></label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input_300">
                                                <input type="text" name="service_id" placeholder="taro_yamada01xx"
                                                       autocomplete="off" value="{{old('service_id')}}">
                                            </div>
                                            @if ($errors->has('service_id'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('service_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">メールアドレス</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="email" id="email" name="email"
                                                       placeholder="sample@example.com" value="{{old('email')}}">
                                            </div>
                                            @if ($errors->has('email'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('email')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">パスワード<span class="c-text__unit">半角英数字（大文字、小文字）8文字以上で入力</span></label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="password" id="" name="password" placeholder="*************"
                                                       autocomplete="off" value="">
                                            </div>
                                            @if ($errors->has('password'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('password')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">パスワード（確認用）<span
                                                    class="c-text__unit">上記パスワードと同じ値を入力</span></label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="password" id="" name="password_confirmation"
                                                       placeholder="*************" value="">
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('password_confirmation')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-index__foot">
                    <div class="c-buttonArea__bottom c-buttonArea__end">
                        <a href="javascript:history.back()" class="c-button__round c-button__min c-button__gray">戻る</a>
                        <button type="submit" class="c-button__round c-button__wide ">保存する</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
