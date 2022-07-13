@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '注文状況一覧')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__order"></span>
                        注文状況
                    </p>
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            {{ $orders->count() ?? 0 }}<span class="c-text__lv5 c-text__accent">件</span>
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <div class="c-box">
                        <table class="p-table__800 data-table" id="data-table">
                            <thead>
                            <th class="w_200">
                                <p class="c-text__label">注文業者</p>
                            </th>
                            <th class="">
                                <p class="c-text__label">商品ID</p>
                            </th>
                            <th class="">
                                <p class="c-text__label">商品名</p>
                            </th>
                            <th class="">
                                <p class="c-text__label">計量値</p>
                            </th>
                            {{--<th class="w_100">
                               <p class="c-text__label">注文数</p>
                            </th>--}}
                            <th class="w_100">
                                <p class="c-text__label">カテゴリー</p>
                            </th>
                            <th class="w_100">
                                <p class="c-text__label">魚種</p>
                            </th>
                            <th class="w_100">
                                <p class="c-text__label">注文時刻</p>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <p class="c-text__lv5">{{ data_get($order, 'm_business.name') }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5">{{ data_get($order, 'id') }}</p>
                                        <img
                                            src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemDetail', ['order' => $order->id]) }}&size=50x50"
                                            alt="QRコード" style="margin-top: 2px;"/>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5">{{ data_get($order, 'order_product.title') }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5">{{ data_get($order, 'cast_weight_value') }}<span
                                                class="c-text__unit">kg</span></p>
                                    </td>
                                    {{--<td>
                                        <p class="c-text__lv5"><span class="c-text__unit">尾</span></p>
                                     </td>--}}
                                    <td>
                                        <p class="c-text__lv6">{{ data_get($order, 'order_product.m_category.name') }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ data_get($order, 'order_product.m_fish_category.name') }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ date('H時i分', strtotime(data_get($order, 'created_at'))) }}</p>
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
