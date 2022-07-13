@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__account')
@section('title', 'アカウント情報')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">

            <div class="p-page">
                <div class="l">
                    <div class="l-auto">
                        <div class="">

                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">登録中のアカウント情報</p>
                                <a href="javascript:history.back()" class="c-icon c-icon__back"></a>
                            </div>
                            <div class="c-box c-box__600 shadow">
                                <div class="c-box__head">
                                    <p class="c-text__accent c-text__lv5 c-text__weight--700">
                                        山田 太郎
                                        <span class="c-text__label--head c-text__weight--700">さんの登録情報</span>
                                    </p>
                                </div>
                                <div class="c-box__body" style="overflow:inherit">
                                    <ul class="p-list__row">
                                        <li>
                                            <div class="head">
                                                <p class="c-text__lv6 c-text__label--head">氏　名</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">山田 太郎</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__lv6 c-text__label--head">フリガナ</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">ヤマダ タロウ</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__lv6 c-text__label--head">登録ID</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">taro_yamada</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__lv6 c-text__label--head">電話番号</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">09012345678</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__lv6 c-text__label--head">メールアドレス</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">taro.yamada@mail.com</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__lv6 c-text__label--head">パスワード</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">**********</p>
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
                    <a href="{{ route('worker.account.editPassword') }}" class="c-button__line c-button__sm">パスワード編集</a>
                    <a href="{{ route('worker.account.edit') }}" class="c-button__user c-button__sm">基本情報編集</a>
                </div>
            </div>
        </main>
    </div>
@endsection
