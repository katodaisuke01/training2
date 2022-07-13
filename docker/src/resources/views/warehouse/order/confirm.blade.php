@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index p-store">
                    <div class="p-index__head">
                        <div class="c-titleUnderline">
                            <span class="c-icon c-icon__item"></span>
                            <h2 class="c-text__lv3 c-text__weight--900">注文管理 <span
                                    class="c-text__lv4 c-text__weight--900">発注確認</span></h2>
                        </div>
                    </div>
                    <form action="{{ route('warehouse.order.catalogStore') }}" method="POST" class="p-register__form"
                          id="selectCatalogOrderForm">
                        @csrf
                        <div class="p-index__body">
                            <div class="l">
                                <div class="l-fix l-fix__500">
                                    <div class="c-box">
                                        <div class="head">
                                            <p class="c-text__lv5 c-text__weight--900">発送日選択</p>
                                        </div>
                                        <input type="hidden" name="shipping_date" value="{{old('shipping_date')}}"
                                               id="shipping_date">
                                        <div id="calendar" class="p-calendar"></div>
                                        @if ($errors->has('shipping_date'))
                                            <p class="c-text__error" style="display:inline-block;">
                                                {{ __($errors->first('shipping_date')) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                @include('warehouse.element._selectClient')
                            </div>

                            <div class="c-titleUnderline c-mgt24">
                                <p class="c-text__lv4 c-text__weight--900">注文商品の確認</p>
                            </div>
                            <?php
                            $total = 0;
                            ?>
                            <ul class="p-list__split5 p-listTile">
                                @foreach($orderList as $key => $val)
                                    <?php
                                    foreach ($products as $prod) {
                                        if ($prod->id == $key) {
                                            $product = $prod;
                                            if (isset($val['quantity'])) {
                                                $quantity = $val['quantity'];
                                                $total += data_get($product, 'price') * $val['quantity'];
                                            } elseif (isset($val['weight'])) {
                                                $quantity = floor($val['weight'] / data_get($product, 'base_weight'));
                                                $total += data_get($product, 'price') * floor($val['weight'] / data_get($product, 'base_weight'));
                                            }
                                        }
                                    }
                                    ?>
                                    <li>
                                        <article class="c-box shadow">
                                            <a data-remodal-target="modal_order_{{ $product->id }}"></a>
                                            <div class="c-image"
                                                 style="background-image:url({{ $product->image_path ? Storage::disk('s3')->temporaryUrl($product->image_path, Carbon::now()->addMinute()) : '' }});"></div>
                                            <div class=c-info>
                                                <p class="c-text__lv5">{{ data_get($product, 'title') }}</p>
                                                <ul class="p-list__row">
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">商品価格：</p>
                                                        </div>
                                                        <div class="data">
                                                            <p class="c-text__lv5 c-text__main c-text__weight--700">
                                                                {{ number_format(data_get($product, 'price')) }}<span
                                                                    class="c-text__unit">円/{{ data_get($product, 'm_unit.name')}} </span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">注文数</p>
                                                        </div>
                                                        <div class="data">
                                                            <p class="c-text__lv6 c-text__weight--700">
                                                                在庫あり
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">注文数<br/>または重量</p>
                                                        </div>
                                                        <div class="data">
                                                            <div class="c-input c-input__end">
                                                                <input type="number"
                                                                       name="{{ $product->title.$product->id }}"
                                                                       placeholder="0"
                                                                       value="{{ $val['quantity'] ?? '' }}"
                                                                       style="z-index: 1;" disabled>
                                                                <span
                                                                    class="c-text__unit">{{ data_get($product, 'm_unit.name') }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note"></p>
                                                        </div>
                                                        <div class="data">
                                                            <div class="c-input c-input__end">
                                                                <input type="number" name="" placeholder="0"
                                                                       value="{{ $val['weight'] ?? '' }}"
                                                                       style="z-index: 1;" disabled>
                                                                <span class="c-text__unit">kg</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">希望価格</p>
                                                        </div>
                                                        <div class="data">
                                                            <div class="c-input c-input__end">
                                                                <input type="number"
                                                                       name="{{ 'limit_price'.$product->id }}"
                                                                       placeholder="0" value="" style="z-index: 1;">
                                                                <span class="c-text__unit">円</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p class="c-text__unit">※希望価格が承認されない場合注文は行われません。</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </li>
                                    @include('warehouse.element.modal._modal_order', [
                                       'product' => $product
                                       ])
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-index__foot">
                            <div class="f-j_end c-box" style="height: auto;">
                                <div class="c-box__body">
                                    <ul class="p-list">
                                        <li>
                                            <div class="head">
                                                <p class="c-label">小計（税抜）</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv3 c-text--right">{{ number_format($total/1.08) }}
                                                    <span class="c-text__unit">円</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-label">消費税（8%）</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv3 c-text--right">{{ number_format($total/1.08 * 0.08) }}
                                                    <span class="c-text__unit">円</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-label">合計</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv2 c-text__weight--900 c-text--right">{{ number_format($total) }}
                                                    <span class="c-text__lv5">円</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="c-buttonArea__center c-mgt16">
                                <a href=javascript:history.back() class="c-button__gray c-button__wide c-button__round">戻る</a>
                                <button id="catalog_list_submit" class="c-button__round c-button__wide">注文する</button>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
    <!-- 商品説明 -->
    <script>
        $('#catalog_list_submit').on('click', function () {
            $('#selectCatalogOrderForm').submit();
        })
    </script>
@endsection
