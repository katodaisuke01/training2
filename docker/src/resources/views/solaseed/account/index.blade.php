@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', 'スタッフ管理')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__account"></span>
                        スタッフ管理
                    </p>
                    <div class="c-buttonArea">
                        <a href="{{ route('solaseed.account.create') }}" class="c-button__min c-button__neon">新規登録</a>
                    </div>
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            <span class="c-text__lv5 c-text__main">登録件数</span>
                            5<span class="c-text__lv5 c-text__accent">件</span>
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <div class="c-box">
                        <table class="p-table__800 data-table" id="data-table">
                            <thead>
                            <th>
                                <p class="c-text__label">登録日</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">種別</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">氏名</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">ID</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">メールアドレス</p>
                            </th>
                            <th class="unsort">
                                <p class="c-text__label">電話番号</p>
                            </th>
                            <th>
                                <p class="c-text__label">最終ログイン</p>
                            </th>
                            <th class="unsort">
                            </th>
                            </thead>
                            <tbody>
                            @foreach($delivery_users as $delivery_user)
                                <tr data-href="{{ route('solaseed.account.edit', ['delivery_user' => $delivery_user]) }}">
                                    <td>
                                        <p class="c-text__lv6">{{ $delivery_user['created_at'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5">{{ App\Models\DeliveryUser::AUTHORITY_LIST[$delivery_user['type']] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5">{{ $delivery_user->name }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5">{{ $delivery_user->service_id }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $delivery_user['email'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $delivery_user['tel']}}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $delivery_user['date_last'] }}</p>
                                    </td>
                                    <td>
                                        <div class="c-icon__w16 c-icon__arrow"></div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
