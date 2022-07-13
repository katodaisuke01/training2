@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__staff"></span>
                    スタッフ管理<small>編集</small>
                </h2>
            </div>
            <form action="{{ route('admin.staff.update', [$staff]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="title c-text__main c-text__weight--900">スタッフ情報登録</p>
                            <div class="c-buttonArea__end">
                                <a class="c-button__sub c-button__min"
                                   href="{{ route('admin.staff.pwEdit', [$staff]) }}">パスワード登録</a>
                            </div>
                        </div>
                        <div class="l">
                            <div class="l-fix l-fix__200">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">現在の画像</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <div class="c-image"
                                                     style="background-image:url({{ $staff['image_path'] ? Storage::disk('s3')->temporaryUrl($staff['image_path'], Carbon::now()->addMinute()) : '' }})"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label c-user">画像登録</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <input type="file" id="image" name="image">
                                                <label for="image"></label>
                                            </div>
                                            <p class="c-text__unit">画像サイズ：最大5MB以内</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">アカウント権限</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-radio switch">
                                                <input type="radio" name="type" id="account_auth_1"
                                                       {{$staff->type == 'NORMAL' ? 'checked' : ''}} value="{{ \App\Models\User::TYPE_NORMAL }}">
                                                <label for="account_auth_1">一般社員</label>
                                                <input type="radio" name="type" id="account_auth_2"
                                                       {{$staff->type == 'MANAGER' ? 'checked' : ''}} value="{{ \App\Models\User::TYPE_MANAGER }}">
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
                                                    <input type="text" name="last_name" placeholder="姓）山田"
                                                           value="{{ $staff->last_name }}">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" name="first_name" placeholder="名）太郎"
                                                           value="{{ $staff->first_name }}">
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
                                                    <input type="text" name="last_name_kana" placeholder="姓）ヤマダ"
                                                           value="{{ $staff->last_name_kana }}">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" name="first_name_kana" placeholder="名）タロウ"
                                                           value="{{ $staff->first_name_kana }}">
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
                                                <input type="text" name="service_id" placeholder="taro_yamada"
                                                       value="{{ $staff->service_id }}">
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
                                            <label class="p-listForm__label required">メールアドレス</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="email" name="email" placeholder="sample@example.com"
                                                       value="{{ $staff->email }}">
                                            </div>
                                            @if ($errors->has('email'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                    {{ __($errors->first('email')) }}
                                                </p>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $staff->id }}">
                <div class="p-index__foot">
                    <div class="c-buttonArea__bottom c-buttonArea__end">
                        <a data-remodal-target="modal_delete" class="c-button__round c-button__min c-button__gray"
                           id="staff_delete" data-id="{{ $staff->id }}">削除する</a>
                        <!-- <a data-remodal-target="modal_delete" class="c-button__round c-button__min c-button__gray">削除する</a> -->
                        <a href="javascript:history.back()" class="c-button__round c-button__min c-button__line">戻る</a>
                        <button type="submit" href="#?flash=successLogin" class="c-button__round c-button__wide ">保存する
                        </button>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
