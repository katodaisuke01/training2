@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', 'スタッフ管理パスワード編集')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="{{ route('solaseed.account.pw.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $delivery_user->id }}">
                    <div class="p-index__head">
                        <a class="c-icon__back"
                           href="{{ route('solaseed.account.edit', ['delivery_user' => $delivery_user]) }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            スタッフ管理<small class="c-text__lv5 c-text__main">パスワード編集</small>
                        </p>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box">
                            <div class="c-box__head">
                                <p class="c-text__lv5">パスワード入力</p>
                            </div>
                            <div class="c-box__body">
                                <ul class="p-list__col">
                                    <li>
                                        <div class="head">
                                            <p class="c-text__label required">パスワード</p>
                                        </div>
                                        <div class="c-input--pw c-input__300">
                                            <input type="password" placeholder="•••••••" name="password" value="">
                                            <span><i class="c-icon__eye"></i></span>
                                        </div>
                                        @if ($errors->has('password'))
                                            <p class="c-text__error">この項目は必ず半角英数字で正しく入力してください</p>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="head">
                                            <p class="c-text__label required">パスワード（確認）</p>
                                        </div>
                                        <div class="c-input--pw c-input__300">
                                            <input type="password" placeholder="•••••••" name="password_confirmation"
                                                   value="">
                                            <span><i class="c-icon__eye"></i></span>
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <p class="c-text__error">パスワード（確認）項目は必ず「パスワード」と同様のものを正しく入力してください</p>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="p-index__foot">
                        <div class="c-buttonArea__end f-a_end">
                            <a href="{{ route('solaseed.account.edit', ['delivery_user' => $delivery_user]) }}"
                               class="c-button__gray c-button__min">戻る</a>
                            <input type="submit" class="c-button__wide c-button__accent" value="保存する">
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
