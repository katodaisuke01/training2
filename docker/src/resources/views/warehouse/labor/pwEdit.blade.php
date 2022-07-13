@extends('layouts.layout_admin')
@section('content')
    <div class="l-container__600 l-page" style="margin:0">
        <section class="p-index">
            <div class="p-index__head">
                <span class="c-icon c-icon__staff"></span>
                <h2 class="c-text__lv3 c-text__weight--900">従業員管理 <small>パスワード編集</small></h2>
            </div>
            <form action="{{ route('warehouse.labor.pwEdit.store', ['labor' => app('request')->input('labor')]) }}"
                  method="POST">
                @csrf
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="p-index__body--title">
                            <p class="c-text__lv4 c-text__main c-text__weight--700">パスワード編集</p>
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
                                                <input type="password" name="password" placeholder="*********" value=""
                                                       autocomplete="new-password">
                                            </div>
                                            @if ($errors->has('password'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                {{ __($errors->first('password')) }}
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <div class="head">
                                            <label class="p-listForm__label required">新しいパスワード（確認用）</label>
                                        </div>
                                        <div class="data">
                                            <div class="c-input c-input__300">
                                                <input type="password" name="password_confirmation"
                                                       placeholder="*********" value="">
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <p class="c-text__error" style="display:inline-block;">
                                                {{ __($errors->first('password_confirmation')) }}
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
                        <a href="javascript:history.back()" class="c-button__round c-button__min c-button__line">戻る</a>
                        <button class="c-button__round c-button__wide ">保存する</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
@endsection
