@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-view__qr')
@section('content')
    <div class="l-container__768 l-page__scan">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    商品情報<small>詳細確認</small>
                </h2>
            </div>
            <div class="p-index__body c-box">
                <div class="l">
                    <div class="l-fix l-fix__350">
                        <div class="c-image"
                             style="background-image:url({{ data_get($order, 'image_path') ? Storage::disk('s3')->temporaryUrl(data_get($order, 'image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                    </div>
                    <div class="l-auto">
                        <ul class="p-list__row">
                            <li>
                                <div class="head">
                                    <p class="c-text__unit">商品名</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">{{ data_get($order, 'order_product.title') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__unit">計量値</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv4">{{ data_get($order, 'cast_weight_value') }}
                                        <span>{{ data_get($order, 'cast_weight_unit') }}</span></p>
                                </div>
                            </li>
                            <li>
                                <div class="head">
                                    <p class="c-text__unit">産地</p>
                                </div>
                                <div class="data">
                                    <p class="c-text__lv5">鹿児島県</p>
                                </div>
                            </li>
                            @if ($stock_flg)
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">水揚日</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ date('Y-m-d', strtotime(data_get($order, 'created_at'))) }}</p>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">運送会社</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ data_get($order, 'delivery_partnar.name') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">水揚日</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ date('Y/m/d') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">出荷日</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ date('Y/m/d') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">配送予定日</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ date('Y/m/d') }}</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
