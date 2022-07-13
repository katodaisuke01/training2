@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '荷主管理詳細')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="">
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.partner.index') }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            荷主管理<small class="c-text__lv5 c-text__main">詳細</small>
                        </p>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box p-detail">
                            <div class="p-detail__head">
                                <div class="l">
                                    <div class="l-fix__400">
                                        <ul class="p-list__row">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">荷主名称</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4">{{ $partner['name'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">種別</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv6">{{ $partner['vary'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">{{ $partner['vary'] }}</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv6">{{ $partner['address'] }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-auto f-j_end">
                                        <p class="c-text__unit">注文回数
                                            <bt/>
                                            <span
                                                class="c-text__weight--900 c-text__lv3 c-text__accent">{{ $partner['order_times'] }}</span>回
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="p-detail__body">
                                <div class="l">
                                    <div class="l-fix__300">
                                        <ul class="p-list__col">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">種別</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['vary'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">住所（配送先）</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['prefecture_name'] . $partner['address1'] }}</p>
                                                    <p class="c-text__lv5">{{ $partner['address2'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">電話番号</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['tel'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">メールアドレス</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['email'] }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-auto">
                                        <ul class="p-list__col">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label required">担当者名</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['responsible_name'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">取引銀行</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['bank_name'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">支店名</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['bank_branch'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">口座種別</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ App\Models\Bank::TYPE_LIST[$partner['bank_account_type']] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">口座番号</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['bank_account_number'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">口座名義</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5">{{ $partner['bank_account_holder'] }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-index__foot">
                        <div class="c-buttonArea__end f-a_end">
                            <a href="{{ route('solaseed.partner.index') }}" class="c-button__gray c-button__min">戻る</a>
                            <a href="{{ route('solaseed.partner.edit', ['type' => App\Models\Partner::getType($partner['vary']), 'partner' => $partner]) }}"
                               class="c-button__wide c-button__accent">編集する</a>
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
