@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__account')
@section('title', 'アカウント情報編集')

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
                                                <div class="c-input--half">
                                                    <div class="c-input c-input__150">
                                                        <input type="text" placeholder="姓" value="山田">
                                                    </div>
                                                    <div class="c-input c-input__150">
                                                        <input type="text" placeholder="名" value="太郎">
                                                    </div>
                                                </div>
                                                <p class="c-text__error" style="display:none">氏名を正しく入力してください</p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__lv6 c-text__label--head">フリガナ</p>
                                                </div>
                                                <div class="c-input--half">
                                                    <div class="c-input c-input__150">
                                                        <input type="text" placeholder="セイ" value="ヤマダ">
                                                    </div>
                                                    <div class="c-input c-input__150">
                                                        <input type="text" placeholder="メイ" value="タロウ">
                                                    </div>
                                                </div>
                                                <p class="c-text__error" style="display:none">フリガナを正しく入力してください</p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__lv6 c-text__label--head">登録ID</p>
                                                </div>
                                                <div class="c-input--full">
                                                    <input type="text" placeholder="IDを入力" value="taro_yamada">
                                                </div>
                                                <p class="c-text__error" style="display:none">登録IDを正しく入力してください</p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__lv6 c-text__label--head">電話番号</p>
                                                </div>
                                                <div class="c-input c-input__150">
                                                    <input type="tel" placeholder="電話番号を入力" value="09012345678">
                                                </div>
                                                <p class="c-text__error" style="display:none">電話番号を正しく入力してください</p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__lv6 c-text__label--head">メールアドレス</p>
                                                </div>
                                                <div class="c-input--full">
                                                    <input type="email" placeholder="メールアドレスを入力"
                                                           value="taro.yamada@mail.com">
                                                </div>
                                                <p class="c-text__error" style="display:none">フリガナを正しく入力してください</p>
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
