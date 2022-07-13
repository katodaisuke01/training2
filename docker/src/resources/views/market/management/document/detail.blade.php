@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__staff"></span>
                    事業者情報
                </h2>
            </div>
            <form>
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="title c-text__main c-text__weight--900">事業者情報登録</p>
                            <div class="c-buttonArea__end">
                                <a class="c-button__sub c-button__min" href="">パスワード登録</a>
                            </div>
                        </div>
                        <div class="l">
                            <div class="l-fix l-fix__200">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label c-user">集荷場所画像登録</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input__file">
                                                <input type="file" id="image_1">
                                                <label for="image_1"></label>
                                            </div>
                                            <p class="c-text__unit">画像サイズ：最大5MB以内</p>
                                            <p class="c-text__error">画像アップロードサイズは5MB以内としてください</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="l-auto">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">事業者名</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input_200">
                                                <input type="text" placeholder="株式会社 日本生鮮" value="">
                                            </div>
                                            <p class="c-text__error">事業者名は必ず入力してください</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">フリガナ</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input">
                                                <div class="c-input c-input_200">
                                                    <input type="text" placeholder="姓）ヤマダ" value="">
                                                </div>
                                                <div class="c-input c-input_200">
                                                    <input type="text" placeholder="名）タロウ" value="">
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
                                                <input type="text" placeholder="taro_yamada" value="">
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
                                                <select>
                                                    <option>役職を選択</option>
                                                    <option>一般社員</option>
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
                                                <input type="email" placeholder="sample@example.com" value="">
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
                                                <input type="email" placeholder="sample@example.com" value="">
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
                        <button class="c-button__round c-button__wide ">編集する</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
