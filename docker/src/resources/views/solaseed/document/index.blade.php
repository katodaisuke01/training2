@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '請求書管理')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__document"></span>
                        請求書管理
                    </p>
                    <div class="c-right">
                        <div class="c-input--center">
                            <div class="c-input c-input--date">
                                <input type="text" class="datepicker" placeholder="2020/01/01">
                            </div>
                            <span>〜</span>
                            <div class="c-input c-input--date">
                                <input type="text" class="datepicker" placeholder="2020/01/01">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-index__body">
                    <div class="c-box">
                        {{-- デフォルトは全履歴表示 --}}
                        <table class="p-table__900 data-table" id="data-table">
                            <thead>
                            <th>
                                <p class="c-text__label">請求発生日</p>
                            </th>
                            <th>
                                <p class="c-text__label">注文業者</p>
                            </th>
                            <th>
                                <p class="c-text__label">メール送信</p>
                            </th>
                            <th>
                                <p class="c-text__label">請求金額</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">電話番号</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">メールアドレス</p>
                            </th>
                            <th>
                                <p class="c-text__label">請求書番号</p>
                            </th>
                            <th class="unsort">
                            </th>
                            </thead>
                            <tbody>
                            <tr data-href="{{ route('solaseed.document.invoice') }}">
                                <td>
                                    <p class="c-text__lv6">{{ date('Y/m/d') }}{{-- $delivery_user['created_at'] --}}</p>
                                </td>
                                <td>
                                    <p class="c-text__lv5">株式会社フーディソン</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6 c-text__accent c-text__weight--700">送信済み</p>
                                </td>
                                <td>
                                    <p class="c-text__lv5">¥ 18,557</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6">0312345678{{-- $delivery_user['tel']--}}</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6">foodison@mail.com{{-- $delivery_user['email'] --}}</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6">NB-21-0013</p>
                                </td>
                                <td>
                                    <div class="c-icon__w16 c-icon__arrow"></div>
                                </td>
                            </tr>
                            <tr data-href="{{ route('solaseed.document.invoice') }}">
                                <td>
                                    <p class="c-text__lv6">{{ date('Y/m/d') }}{{-- $delivery_user['created_at'] --}}</p>
                                </td>
                                <td>
                                    <p class="c-text__lv5">株式会社AAAA</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6 c-text__weight--700">未送信</p>
                                </td>
                                <td>
                                    <p class="c-text__lv5">¥ 18,557</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6">0312345678{{-- $delivery_user['tel']--}}</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6">AAAAAAAA@mail.com{{-- $delivery_user['email'] --}}</p>
                                </td>
                                <td>
                                    <p class="c-text__lv6">NB-21-0013</p>
                                </td>
                                <td>
                                    <div class="c-icon__w16 c-icon__arrow"></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
