@extends('layouts.layout_admin')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <span class="c-icon c-icon__staff"></span>
                <h2 class="c-text__lv3 c-text__weight--900">あなたのアカウント</h2>
            </div>
            <form>
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="c-text__lv4 c-text__main c-text__weight--700">アカウント情報</p>
                            <div class="c-buttonArea__end">
                                <a class="c-button__sub c-button__min" href="{{ route('warehouse.labor.pwEdit') }}">パスワード登録</a>
                            </div>
                        </div>
                        <div class="l">
                            <div class="l-fix l-fix__200">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label c-user">画像登録</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <div class="c-image__square" style="background-image:url()"></div>
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
                                                    <input type="text" readonly placeholder="姓）山田" value="">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" readonly placeholder="名）太郎" value="">
                                                </div>
                                            </div>
                                            <p class="c-text__error">氏名は必ず入力してください</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">フリガナ</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <div class="c-input c-input_200">
                                                    <input type="text" readonly placeholder="姓）ヤマダ" value="">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" readonly placeholder="名）タロウ" value="">
                                                </div>
                                            </div>
                                            <p class="c-text__error">必ずカタカナで入力してください</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">ユーザーID<span class="c-text__unit">半角英数、6文字以上で入力</span></label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input_300">
                                                <input type="text" readonly placeholder="taro_yamada" value="">
                                            </div>
                                            <p class="c-text__error">ユーザーIDは半角英数、6文字以上で入力してください</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label">役職</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input--select c-input_300">
                                                <select readonly>
                                                    <option>役職を選択</option>
                                                    <option selected>一般社員</option>
                                                    <option>リーダー</option>
                                                    <option>サブリーダー</option>
                                                    <option>契約社員</option>
                                                    <option>アルバイト</option>
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
                                                <input type="email" readonly placeholder="sample@example.com" value="">
                                            </div>
                                            <p class="c-text__error">メールアドレスは半角英数で正しく入力してください</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">メールアドレス（確認用）</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <input type="email" readonly placeholder="sample@example.com" value="">
                                            </div>
                                            <p class="c-text__error">メールアドレスは半角英数で正しく入力してください</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-index__foot">
                    <div class="c-buttonArea__bottom c-buttonArea__end">
                        <a href="javascript:history.back()" class="c-button__round c-button__min c-button__line">戻る</a>
                        <a href="{{route('warehouse.labor.edit')}}" class="c-button__round c-button__wide ">編集する</a>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
