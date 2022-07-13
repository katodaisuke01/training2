@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__picking')
@section('title', '摘み取り業務')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">
            <form id="pickup-form" enctype="multipart/form-data">

                <div class="p-page">
                    <div class="l">
                        <div class="l-fix__500">

                            <div class="c-full">
                                <div class="c-title">
                                    <p class="c-text__deep c-text__lv4 c-text__weight--700">摘み取り商品</p>
                                    <div class="c-right f-a_center">
                                        <p class="c-text__lv3 c-text__weight--900 c-text__deep">
                                            {{ $orders->count() }}<span
                                                class="c-text__lv5 c-text__deep c-text__weight--700">点</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="c-box shadow">
                                    <!-- 画像撮影がされたらラベル項目表示と同じタイミングで↓をdisplay:block; -->
                                    <div class="c-box__head" style="display: none">
                                        <div class="c-icon c-icon__check"></div>
                                    </div>
                                    <!-- 画像撮影がされたらラベル項目表示と同じタイミングで↑をdisplay:block; -->
                                    <div class="c-box__body">
                                        <table class="p-table">
                                            <thead>
                                            <th>
                                                <p class="c-text__label">商品画像</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label">仕分け棚</p>
                                                <p class="c-text__label">商品名称</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label">注文事業者</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label">数量</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label">選択</p>
                                            </th>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr class="
                                                    @if (!$loop->last && $order->client->shelf->position_name != $orders[$loop->iteration]->client->shelf->position_name)
                                                    order_devide
                                                    @endif">
                                                    <td>
                                                        <div class="c-image"
                                                             style="background-image:url({{ $order->image }})"></div>
                                                    </td>
                                                    <td>
                                                        <p class="c-text__lv5">{{ $order->client->shelf->position_name }}</p>
                                                        <p class="c-text__lv5">{{ $order->order_product->title }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="c-text__lv5">{{ $order->client->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="c-text__lv5">1 <span class="c-text__unit">尾</span></p>
                                                    </td>
                                                    <td>
                                                        <div class="c-checkbox">
                                                            <input type="checkbox" name="orders[{{ $order->id }}]"
                                                                   id="select_{{ $order->id }}" class="pickup-checkbox"
                                                                   data-shelf-key="{{ $order->client->shelf->position_key }}">
                                                            <label for="select_{{ $order->id }}"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="l-auto c-arrow__left">
                            <div>
                                <div class="c-title">
                                    <p class="c-text__deep c-text__lv4 c-text__weight--700">
                                        画像登録
                                        <span class="c-text__lv6 c-text__deep">梱包箱を閉める前に、真上から梱包内容を撮影してください</span>
                                    </p>
                                </div>
                                <div class="c-box shadow">
                                    <div class="c-box__body">
                                        <div class="l">
                                            <div class="l-fix__400">
                                                <div class="c-input__file c-input--full">
                                                    <canvas id="pickup_picture" width="380" height="250"
                                                            style="display:none;width:380px"></canvas>
                                                    <div class="c-image start_camera" id="dummy_place"
                                                         style="background-image:" disabled></div>
                                                </div>
                                            </div>
                                            <div class="l-auto">
                                                <label for="file_1" class="c-button__line shadow start_camera" disabled>梱包内容を撮影</label>
                                            </div>
                                        </div>
                                        @include('market.element.modal._modal_camera')
                                    </div>
                                </div>
                                <div class="c-box shadow c-mgt16">
                                    <div class="c-box__body">
                                        <div class="l">
                                            <div class="l-fix__400">
                                                <div class="c-label__area">
                                                    <div class="c-label__area--head">
                                                        <p>ラベルイメージ</p>
                                                    </div>
                                                    <div class="c-label__area--body">
                                                        <ul class="p-list">
                                                            <li>
                                                                <div class="head">
                                                                    <p class="c-text__label">配送先</p>
                                                                </div>
                                                                <div class="data">
                                                                    <p class="c-text__lv5 client-name"></p>
                                                                </div>
                                                                <div class="c-right">
                                                                    <p class="c-text__lv4 c-text__weight--900">冷蔵</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="f">
                                                            <ul class="p-list">
                                                                <li>
                                                                    <div class="data">
                                                                        <p class="c-text__lv6 client-address"></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="head">
                                                                        <p class="c-text__label">配送エリア</p>
                                                                    </div>
                                                                    <div class="data">
                                                                        <p class="c-text__lv5 client_area_id"></small></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="head">
                                                                        <p class="c-text__label">TEL</p>
                                                                    </div>
                                                                    <div class="data">
                                                                        <p class="c-text__lv5 client-tel"></p>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="head">
                                                                        <p class="c-text__label">担当</p>
                                                                    </div>
                                                                    <div class="data">
                                                                        <p class="c-text__lv5 client-manager-name"></p>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="c-right">
                                                                <img class="c-qr" style="display: none;"
                                                                src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('pickList', ['client_package' => $qr_client_package_id]) }}&size=100x100"
                                                                alt="QRコード" style="background-size: auto;"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="l-auto">
                                                <div class="f-column f-a_end">
                                                    <p class="c-text__lv2 c-text__deep c-text__weight--900">
                                                        <span class="c-text__unit">発行数</span>{{ $client_packages_count }}<span class="c-text__unit">枚</span>
                                                    </p>
                                                    <div class="c-buttonArea c-noMargin">
                                                        <input type="button" value="出荷箱用ラベルを発行"
                                                               class="c-button__user issue_label" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            @include('worker.element._buttonArea_bottom')
            <style>
                .button_alert {
                    display: none;
                }
            </style>
        </main>
    </div>
    @include('worker.element.picking_script')
@endsection
