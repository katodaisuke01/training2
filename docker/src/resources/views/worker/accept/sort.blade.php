@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page p-sort')
@section('title', 'エリア別・店舗別仕分け業務')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">

            <div class="p-page">
                <div class="l">
                    <div class="l-fix l-fix__350">
                        <div class="c-full">

                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">QR読み込み商品</p>
                                <input type="text" name="qr_input" class="qr-input" id="js-target-on" inputmode="none"
                                       style="position: absolute;top: -9999px; left: -9999px;">
                            </div>
                            <div class="c-box c-paper shadow">
                                <div class="c-box__head">
                                    <div class="c-image order-image"></div>
                                </div>
                                <div class="c-box__body">
                                    <div class="c-text">
                                        <ul class="p-list">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">商品名称</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5 c-text__weight--700 order-product-name"></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">重量</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4 order-weight"></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">仕分け棚</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4 c-text__alert c-text__weight--700 shelf-name"></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="c-box c-paper shadow">
                                <div class="c-box__body">
                                    <div class="c-text">
                                        <ul class="p-list">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">エリア</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5 c-text__alert c-text__weight--700 area-name"></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">トレーコード</p>
                                                </div>
                                                <div class="data f-wrap">
                                                    <div class="c-icon__w24 c-icon__link"></div>
                                                    <p class="c-text__lv5 c-text__weight--700 tray-code"></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="l-fix c-arrow__left">
                        <div class="c-full">

                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">
                                    店舗別仕分け棚
                                    <!-- <small class="c-text__deep c-text__lv6 c-text__weight--700">トレーQRコード読み込みで内容が確認できます</small> -->
                                </p>
                            </div>
                            <div class="c-box shadow">
                                <div class="c-box__head f-a_center">
                                    <p class="c-text__accent c-text__lv5 c-text__weight--700">
                                        <span class="client-name"></span>
                                        <span class="c-text__label--head c-text__weight--700">様の注文仕分け</span>
                                    </p>
                                    <div class="c-right f-a_center">
                                        <p class="c-text__unit">注文処理数</p>
                                        <p class="c-text__lv3 c-text__weight--900 c-text__deep">
                                            <span
                                                class="todays-sort-progress">{{ \App\Models\Order::todaysSortProgress($user->m_business_id) }}</span>
                                            <span class="c-text__unit">点</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="c-box__body">
                                    <table class="p-table__shelf">
                                        <thead>
                                        <th class="w_40">
                                        </th>
                                        <th>
                                            <p class="c-text__lv5">A</p>
                                        </th>
                                        <th>
                                            <p class="c-text__lv5">B</p>
                                        </th>
                                        <th>
                                            <p class="c-text__lv5">C</p>
                                        </th>
                                        </thead>
                                        <tbody>
                                        @foreach($chunksOfClients as $chunk)
                                            <tr>
                                                <th>
                                                    <p class="c-text__lv6">{{ $loop->iteration }}</p>
                                                </th>
                                                @foreach($chunk as $client)
                                                    <td>
                                                        <div class="position-{{ $client->shelf->position_key }}">
                                                            <p>{{ $client->name }}</p>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            @include('worker.element._buttonArea_bottom')
            <style>
                .button_alert {
                    display: none;
                }
            </style>
        </main>
    </div>
@endsection
