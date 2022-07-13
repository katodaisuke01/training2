@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container__600 l-page" style="margin:0">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__staff"></span>
                    管理者管理<small>パスワード編集</small>
                </h2>
            </div>
            <form>
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="title c-text__main c-text__weight--900">パスワード編集</p>
                        </div>
                        <div class="l">
                            <div class="l-auto">
                                <ul class="p-listForm">
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">新しいパスワード</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input__300">
                                                <input type="password" placeholder="*********" value="">
                                            </div>
                                            <p class="c-text__error">メールアドレスは半角英数で正しく入力してください</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">新しいパスワード（確認用）</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input__300">
                                                <input type="password" placeholder="*********" value="">
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
                        <button class="c-button__round c-button__wide ">保存する</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
