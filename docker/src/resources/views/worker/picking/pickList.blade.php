@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-view__qr')
@section('content')

    <div class="l-container l-page__scan">
        <section class="p-index">
            <div class="p-index__head">
            </div>
            <div class="p-index__body c-box">
                <div class="p-scroll__yaxis600">
                    <div class="p-scroll__inner--500">
                        <h2 class="title">
                            <span class="c-icon c-icon__checked"></span>
                            配送情報
                        </h2>
                            <table class="p-table">
                            <thead>
                            <th class="w_100">
                                <label>画像</label>
                            </th>
                            <th>
                                <label>配送先</label>
                            </th>
                            <th class="w_120">
                                <label>TEL</label>
                            </th>
                            <th class="w_120">
                                <label>担当</label>
                            </th>
                            <th class="w_120">
                                <label>配送エリア</label>
                            </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="c-image"
                                            style="background-image:url({{ data_get($package, 'image_path') ? Storage::disk('s3')->temporaryUrl(data_get($package, 'image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($client, 'name') }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($client, 'tel') }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($client, 'manager_last_name') . ' ' . data_get($client, 'manager_first_name')}}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($client->area()->first(), 'name') }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h2 class="title">
                            <span class="c-icon c-icon__checked"></span>
                            梱包商品
                        </h2>
                        <table class="p-table">
                            <thead>
                            <th class="w_100">
                                <label>画像</label>
                            </th>
                            <th>
                                <label>商品名</label>
                            </th>
                            <th class="w_70">
                                <label>数量</label>
                            </th>
                            <th class="w_120">
                                <label>受注日</label>
                            </th>
                            <th class="w_120">
                                <label>重量</label>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td>
                                        <div class="c-image"
                                             style="background-image:url({{ data_get($order, 'image_path') ? Storage::disk('s3')->temporaryUrl(data_get($order, 'image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($order, 'order_product.title') }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($order, 'quantity') }}<small>{{ data_get($order->order_product()->first(), 'unit_name') }}</small>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($order, 'created_at')->format('Y/m/d') }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 data">
                                            {{ data_get($order, 'cast_weight') }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection