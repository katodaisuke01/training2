@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__account')
@section('title', 'アカウント情報')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">
            <form style="width:100%">

                <div class="p-page">
                    <div class="l">
                        <div class="l-auto">
                            <div class="">

                                <div class="c-title">
                                    <a href="javascript:history.back()" class="c-icon c-icon__back"></a>
                                    <p class="c-text__deep c-text__lv4 c-text__weight--700">アカウントパスワードの編集</p>
                                </div>
                                <div class="c-box c-box__600 shadow">
                                    <div class="c-box__head">
                                        <p class="c-text__accent c-text__lv5 c-text__weight--700">
                                            山田 太郎
                                            <span class="c-text__label--head c-text__weight--700">さんのパスワード編集</span>
                                        </p>
                                    </div>
                                    <div class="c-box__body" style="overflow:inherit">
                                        <ul class="p-list__row">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__lv6 c-text__label--head">パスワード<br/>（半角英数）</p>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input--full">
                                                        <input type="password" placeholder="パスワードを入力"
                                                               value="**********">
                                                    </div>
                                                    <p class="c-text__error">パスワードを半角英数で正しく入力してください</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__lv6 c-text__label--head">パスワード<br/>（確認用）</p>
                                                </div>
                                                <div class="data">
                                                    <div class="c-input--full">
                                                        <input type="password" placeholder="パスワードを入力"
                                                               value="**********">
                                                    </div>
                                                    <p class="c-text__error">同じパスワードを入力してください</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="p-buttonArea__bottom--fixed">
                    <div class="c-buttonArea__center">
                        <a href="{{ route('worker.account.mypage') }}" class="c-button__user c-button__sm">保存する</a>
                    </div>
                </div>

            </form>
        </main>
    </div>
@endsection
