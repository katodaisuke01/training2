@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__staff"></span>
                    管理者管理<small>新規登録</small>
                </h2>
            </div>
            <form action="{{ route('admin.manager.store') }}" method="POST">
                @csrf
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="title c-text__main c-text__weight--900">管理者情報登録</p>
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
                                                <input type="file" id="image_1">
                                                <label for="image_1"></label>
                                            </div>
                                            <p class="c-text__note">画像サイズ：最大5MB以内</p>
                                            <p class="c-text__error">画像アップロードサイズは5MB以内としてください</p>
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
                                                <p class="c-text__error">
                                                    {{ __($errors->first('last_name')) }}
                                                </p>
                                            @endif
                                            @if ($errors->has('first_name'))
                                                <p class="c-text__error">
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
                                                           value="{{old('last_name_kana')}}">
                                                </div>
                                            </div>
                                            @if ($errors->has('last_name_kana'))
                                                <p class="c-text__error">
                                                    {{ __($errors->first('last_name_kana')) }}
                                                </p>
                                            @endif
                                            @if ($errors->has('first_name_kana'))
                                                <p class="c-text__error">
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
                                                       value="{{old('service_id')}}">
                                            </div>
                                            @if ($errors->has('service_id'))
                                                <p class="c-text__error">
                                                    {{ __($errors->first('service_id')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">役職</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select id="officer" name="officer" value="{{old('officer')}}">
                                                    <option disabled>役職を選択</option>
                                                    @foreach(\App\Models\Admin::OFFICER_LIST as $officer)
                                                        <option>{{$officer}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">メールアドレス</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="email" id="email" name="email"
                                                       placeholder="sample@example.com" value="{{old('email')}}">
                                            </div>
                                            @if ($errors->has('email'))
                                                <p class="c-text__error">
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
                                                <input type="password" id="" name="password"
                                                       placeholder="Password000XXX" value="">
                                            </div>
                                            @if ($errors->has('password'))
                                                <p class="c-text__error">
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
                                                       placeholder="Password000XXX" value="">
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <p class="c-text__error">
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
