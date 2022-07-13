@extends('layouts.layout_market')
@section('page_class', 'l-page')
@section('content')
    <section>
        <div class="l-container">
            <div class="p-workflow">
                <div class="p-workflow__head">
                    <h4 class="c-text c-text__lv3 c-text__weight--900">水揚げ商品登録</h4>
                    <div class="c-alert">
                        <p class="c-text__lv5 c-text__weight--700">計量、撮影の際は商品を計量皿から動かさないでください。</p>
                    </div>
                </div>
                <div class="p-workflow__body">
                    <div class="p-sort">
                        <ul class="p-list__wrap">
                            <li>
                                <div class="data">
                                    <div class="c-input--select c-input__200">
                                        <select name="category_id" id="m-categories-select">
                                            <option>カテゴリーを選択</option>
                                            @foreach($categoryList as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('category_id'))
                                        <p class="c-text__error" style="display:inline-block;">
                                            {{ __($errors->first('category_id')) }}
                                        </p>
                                    @endif
                                </div>
                            </li>
                            <script>
                                $(document).on('change', '#m-categories-select', function () {
                                    let id = $(this).val();
                                    let data = @json($FishCategoryList);
                                    let productData = @json($orderProductList);
                                    $('#m-fish-categories-select').empty();
                                    $('#m-product-select').empty();
                                    if (id == '') {
                                        $('#m-fish-categories-select').append('<option value>魚種を選択</option>');
                                        $('#m-product-select').append('<option value>商品名称を選択</option>');
                                    } else {
                                        $('#m-fish-categories-select').append('<option value>選択してください</option>');
                                        $('#m-product-select').append('<option value>選択してください</option>');
                                        $.each(data, function (index, value) {
                                            if (value['m_category_id'] == id) {
                                                html = `<option value="${value.id}">${value.name}</option>`;
                                                $('#m-fish-categories-select').append(html);
                                            }
                                        })
                                        $.each(productData, function (index, value) {
                                            if (value['m_category_id'] == id) {
                                                html = `<option value="${value.id}">${value.title}</option>`;
                                                $('#m-product-select').append(html);
                                            }
                                        })
                                    }
                                })

                                $(document).on('change', '#m-fish-categories-select', function () {
                                    let id = $(this).val();
                                    let productData = @json($orderProductList);
                                    console.log(id)
                                    $('#m-product-select').empty();
                                    if (id == '') {
                                        $('#m-product-select').append('<option value>商品名称を選択</option>');
                                    } else {
                                        $('#m-product-select').append('<option value>選択してください</option>');
                                        $.each(productData, function (index, value) {
                                            if (value['m_fish_category_id'] == id) {
                                                html = `<option value="${value.id}">${value.title}</option>`;
                                                $('#m-product-select').append(html);
                                            }
                                        })
                                    }
                                })

                                $(document).on('change', '#m-product-select', function () {
                                    let productId = $(this).val();
                                    var target = $('input[name="register_target"]').val();
                                    let title = $('[name="order_product"] option:selected').text() + '（天然）';
                                    $('#js-product_title').text(title);
                                    $('#js-product_title').css('opacity', 1);
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                        },
                                        type: 'POST',
                                        url: "workflow/getProductInfo",
                                        dataType: 'json',
                                        data: {
                                            'order_product_id': productId,
                                            'order_stock_id': target,
                                        }
                                    })
                                        .done(function (response) {
                                            $('.js-market_pref').text(response.prefecture + '産');
                                            $('.js-market_pref').css('opacity', 1);
                                            $('.js-market_name').text(response.industry_name);
                                            $('.js-market_address').text(response.industry_address);
                                            $('.js-market_tolerance').text('この商品の許容値は±' + response.toleranse + 'gです');
                                        })
                                })
                            </script>
                            <li>
                                <div class="data">
                                    <div class="c-input--select c-input__200">
                                        <select name="fish_category" id="m-fish-categories-select">
                                            <option>魚種を選択</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('fish_category'))
                                        <p class="c-text__error" style="display:inline-block;">
                                            {{ __($errors->first('fish_category')) }}
                                        </p>
                                    @endif
                                </div>
                            </li>
                            <li>
                                <div class="data">
                                    <div class="c-input--select c-input__200">
                                        <select name="order_product" id="m-product-select">
                                            <option>商品名称を選択</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('order_product'))
                                        <p class="c-text__error" style="display:inline-block;">
                                            {{ __($errors->first('order_product')) }}
                                        </p>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        {{--<div class="c-right">
                          <div class="c-image__wide" id="small_picture" data-file="on" width="100" height="80" style="background-image:({{ data_get('order_stock', 'image') }})"></div>
                        </div>--}}
                    </div>
                </div>

                <div class="p-workflow__foot">
                    <div id="js_page_change">
                        <div class="l">
                            <div class="l-fix__500">
                                <ul class="p-list">
                                    <li class="weight">
                                        <div class="head">
                                            <p class="c-text__lv3 c-text__weight--900 c-text__main">計量する</p>
                                        </div>
                                        <div class="body">
                                            <span
                                                class="c-text__lv6 js-market_tolerance">この商品の許容値は±<strong> {{-- {{ $permit_tolerance }} --}}</strong>gです</span>
                                            <div class="c-input c-input__end" style="flex-wrap:nowrap">
                                                <div class="c-input c-input_300">
                                                    <input type="number" name="determined_weight" value=""
                                                           class="c-text__weight--900" placeholder="0" id="load_weight"
                                                           readonly="readonly">
                                                </div>
                                                <span class="c-text__lv2">kg</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="photo">
                                        <div class="head">
                                            <p class="c-text__lv3 c-text__weight--900 c-text__main">撮影する</p>
                                        </div>
                                        <div class="body">
                                            <a class="c-label">
                                                <canvas class="c-image__photo canvas_image" id="picture" data-file="on"
                                                        width="464" height="300"></canvas>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="l-auto">
                                <div class="qr" id="qr_lavel_for_print">
                                    <!-- <div class="head">
                                        <p class="c-text--center c-text__note">
                                          この商品は複数商品まとめ処理のため商品QRコードはありません
                                        </p>
                                    </div> -->
                                    <div class="body">
                                        <div class="c-box js_padd_off">
                                            <div class="l">
                                                <div class="l-fix__200">
                                                    <ul class="p-list">
                                                        <li>
                                                            <article>
                                                                <p class="c-text__lv5 c-text--center js-market_pref"
                                                                   style="opacity:.1">産地名</p>
                                                            </article>
                                                        </li>
                                                        <li>
                                                            <div class="c-input__file">
                                                                <img
                                                                    src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('stockDetail', ['order' => $order_stock->id]) }}&size=170x170"
                                                                    alt="QRコード" style=""/>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="l-auto">
                                                    <div class="c-full">
                                                        <p class="c-text__lv3 c-text__weight--700 c-mgb16"
                                                           id="js-product_title" style="opacity:.1">
                                                            商品名
                                                        </p>
                                                        <ul class="p-list__split2">
                                                            <li class="c-row">
                                                                <article>
                                                                    <p class="c-text__note label" style="color: black;">
                                                                        QRコードID</p>
                                                                    <p class="c-text__lv4 c-text__weight--700 data"
                                                                       style="font-weight: bold;">{{ data_get($order_stock, 'id') }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="c-row">
                                                                <article>
                                                                    <p class="c-text__note label" style="color: black;">
                                                                        水揚日</p>
                                                                    <p class="c-text__lv4 c-text__weight--700 data"
                                                                       style="font-weight: bold;">{{ date('Y/m/d') }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="c-row">
                                                                <article>
                                                                    <p class="c-text__note label" style="color: black;">
                                                                        計量値</p>
                                                                    <p class="c-text__lv4 c-text__weight--700 data"
                                                                       id="order_weight" style="font-weight: bold;">
                                                                        <span class="c-text__unit">kg</span></p>
                                                                </article>
                                                            </li>
                                                            <li class="c-row">
                                                                <article>
                                                                    <p class="c-text__note label" style="color: black;">
                                                                        加工・締め</p>
                                                                    <p class="c-text__lv4 c-text__weight--700 data"
                                                                       style="font-weight: bold;">
                                                                        なし{{-- {{ $order[0]->order_product->getProcessName() }} --}}</p>
                                                                </article>
                                                            </li>
                                                        </ul>
                                                        <div class="l c-border__top">
                                                            <div class="l-fix l-fix__80">
                                                                <p class="c-text__lv6" style="color: black;">産地情報</p>
                                                            </div>
                                                            <div class="l-auto">
                                                                <div>
                                                                    <p class="c-text__lv4 js-market_name"
                                                                       style="font-weight: bold;"></p>
                                                                    {{--<p class="c-text__lv5 js-market_address" style="font-weight: bold;"></p>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="c-mgt16 c-buttonArea__end button_for_print">
                                            <a class="c-button__line c-button__round shadow c-full" id="print_lavel"
                                               onclick="partialPrint();" target="_blank" disabled>ラベル印刷</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="register_target" value="{{ $order_stock->id }}">
                    </div>
                    @include('market.element._bottom_register')
                </div>
            </div>
        </div>
    </section>
    <!-- モーダル_カメラ -->
    @include('market.element.modal._modal_camera')
    <script src="{{asset('js/camera.js')}}"></script>
    <script>
        $(document).ready(function () {
            navigator.clipboard.writeText(null);
            cameraStartAction();
        });
        if (navigator.clipboard) {
            setInterval(function () {
                navigator.clipboard.readText()
                    .then(function (text) {
                        if ($('#load_weight').val() != text) {
                            // 数値かどうかの判定
                            if (!isNaN(text)) {
                                var target = $('input[name="register_target"]').val();
                                // 計量データをサーバーへ送信
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    type: 'POST',
                                    url: "workflow/weightRegister",
                                    dataType: 'json',
                                    data: {
                                        'weight': text,
                                        'order_stock_id': target,
                                    }
                                })
                                    .done(function (data) {
                                        console.log(data);
                                        // 画面表示
                                        $('#load_weight').val(data.weight);
                                        $('#order_weight').text(data.weight + 'kg');
                                        var quick = 'off';
                                        // 撮影
                                        cameraStopAction();
                                    })
                            }
                        }
                    });
            }, 2000);
        }
    </script>
    <!-- 作業画面処理数追加 -->
    <script>
        $(function () {
            $('#add_product_btn').on('click', function () {
                var groupId = $(this).data('group');
                var productId = $(this).data('product');
                var objectId = $(this).data('object');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: 'POST',
                    url: "workflow/addProduct",
                    dataType: 'json',
                    data: {
                        'businessGroup': groupId,
                        'product_code': productId,
                    }
                })
                $('#update_quantity').text((Number($('#update_quantity').text()) + 1))
                if ($('#js_page_change').data('complete') == true) {
                    window.location.href = '{{ route("industry.market.workflow") }}' + '?product_id=' + objectId + '&order=' + productId + '&businessGroup=' + groupId + '&page=' + $('#update_quantity').text();
                }
            })

            // リセット
            $('#product_count_reset_btn').on('click', function () {
                var groupId = $(this).data('group');
                var productId = $(this).data('product');
                var objectId = $(this).data('object');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: 'POST',
                    url: "workflow/resetCount",
                    dataType: 'json',
                    data: {
                        'businessGroup': groupId,
                        'product_code': productId,
                    }
                })
                $('#update_quantity').text($('#order_base_quantity').text())
                window.location.href = '{{ route("industry.market.workflow") }}' + '?product_id=' + objectId + '&order=' + productId + '&businessGroup=' + groupId + '&page=1';
            })

        })

    </script>
@endsection
