@extends('layouts.layout_market')
@section('page_class', 'l-page')
@section('content')
    <section>
        <div class="l-container">
            <form action="{{ route('industry.market.store', [$package]) }}" method="post" id="store_packing_form">
                @csrf
                <div class="p-workflow">
                    <div class="p-workflow__head">
                        <h4 class="c-text c-text__lv3 c-text__weight--900">仕分け梱包登録</h4>
                    </div>
                    <div class="p-workflow__body">
                        <div class="l">
                            <div class="l-fix__500">
                                <div class="c-full">
                                    <div class="c-box shadow">
                                    @if ($orders->isEmpty())
                                        @include('market.element._noContent')
                                    @else
                                        <!-- 画像撮影がされたらラベル項目表示と同じタイミングで↓をdisplay:block; -->
                                            <div class="c-box__head" style="display:none">
                                                <div class="c-icon c-icon__check"></div>
                                            </div>
                                            <!-- 画像撮影がされたらラベル項目表示と同じタイミングで↑をdisplay:block; -->
                                            <div class="c-box__body">
                                                <div class="p-scroll__yaxis500">
                                                    <div class="p-scroll__inner">
                                                        <table class="p-table">
                                                            <thead>
                                                            <th>
                                                                <p class="c-text__label">商品画像</p>
                                                            </th>
                                                            <th>
                                                                <p class="c-text__label">商品名称・注文事業者</p>
                                                            </th>
                                                            <th>
                                                                <p class="c-text__label">計量値</p>
                                                            </th>
                                                            <th class="w_80">
                                                                <p class="c-text__label">チェック</p>
                                                            </th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($orders as $key => $order)
                                                                <tr>
                                                                    <td>
                                                                        <div class="c-image"
                                                                             style="background-image:url({{ data_get($order, 'image') }})"></div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="c-text__lv5">{{ data_get($order, 'order_product.title') }}</p>
                                                                        <p class="c-text__lv5">{{ data_get($order, 'm_business.name') }}</p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="c-text__lv5">{{ data_get($order, 'cast_weight_value') }}
                                                                            <span
                                                                                class="c-text__unit">{{ data_get($order, 'cast_weight_unit') }}</span>
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio"
                                                                               name="sort[{{ data_get($order, 'id') }}]"
                                                                               class="c-button__line c-button__check"
                                                                               id="sort_order{{ data_get($order, 'id') }}"
                                                                               data-business="{{ data_get($order, 'm_business.id') }}">
                                                                        <label
                                                                            for="sort_order{{ data_get($order, 'id') }}"
                                                                            class="c-button__line c-button__check"
                                                                            style="margin-right: 0px">確認</label>
                                                                    </td>
                                                                </tr>
                                                                <script>
                                                                    $('#sort_order{{ data_get($order, 'id')}}').on('click', function () {
                                                                        console.log($(this))
                                                                        $('#input_m_business').val($(this).data('business'));
                                                                        $('#print_lavel').attr('disabled', false);
                                                                        $('#store_packing_button').attr('disabled', false);
                                                                        $.get({
                                                                            url: "{{ route('industry.market.getPackagelabel') }}",
                                                                            data: {
                                                                                'm_business_id': $(this).data('business'),
                                                                            }
                                                                        }).done(function (data) {
                                                                            console.log(data)
                                                                            $('#js-business_name').text(data.business_name);
                                                                            $('#js-business_address').text(data.address);
                                                                            $('#js-business_tel').text(data.tel);
                                                                            $('#js-business_user_name').text(data.name);
                                                                        }).fail(function () {
                                                                            console.log('通信失敗')
                                                                        })
                                                                    })
                                                                </script>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="l-auto c-arrow__left">
                                <div class="c-full">
                                    <div class="c-box shadow">
                                        <div class="c-box__body">
                                            <div class="l">
                                                <div class="l-fix__400">
                                                    <div class="c-input__file c-input--full">
                                                        <canvas class="" id="package_picture" data-file="on"
                                                                height="280" width="380"
                                                                style="display: none;"></canvas>
                                                        <div class="c-image" id="dummy_place"
                                                             data-remodal-target="modal_camera"
                                                             style="background-image:"></div>
                                                    </div>
                                                </div>
                                                <div class="l-auto">
                                                    <div class>
                                                        <p class="c-text__lv5 c-text__accent c-mgb8">
                                                            商品梱包を行い、箱を閉じる直前に梱包状態の撮影を行ってください。
                                                        </p>
                                                        <label for="file_1" data-remodal-target="modal_camera"
                                                               id="start_camera"
                                                               class="c-button__line shadow">写真を撮影する</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="c-mgt16">
                                        <div class="c-box shadow">
                                            <div class="c-box__body">
                                                <div class="c-label__area" id="qr_lavel_for_print">
                                                    <div class="c-label__area--head label_image">
                                                        <p>ラベルイメージ</p>
                                                    </div>
                                                    <div class="c-label__area--body">
                                                        <img class="c-qr"
                                                             src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemList', ['package' => $package->id]) }}&size=100x100"
                                                             alt="QRコード" style="background-size: auto;"/>
                                                        <ul class="p-list">
                                                            <li>
                                                                <div class="head">
                                                                    <p class="c-text__label" style="color: black;">
                                                                        配送先</p>
                                                                </div>
                                                                <div class="data">
                                                                    <p class="c-text__lv5" style="font-weight: bold;"
                                                                       id="js-business_name"></p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="head">
                                                                    <p class="c-text__label" style="color: black;">
                                                                        ID</p>
                                                                </div>
                                                                <div class="data">
                                                                    <p class="c-text__lv6" id=""
                                                                       style="font-weight: bold;">{{ $package->id }}</p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="head">
                                                                    <p class="c-text__label" style="color: black;">
                                                                        住所<small>（配送先）</small></p>
                                                                </div>
                                                                <div class="data">
                                                                    <p class="c-text__lv6" id="js-business_address"
                                                                       style="font-weight: bold;"></p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="head">
                                                                    <p class="c-text__label" style="color: black;">
                                                                        TEL</p>
                                                                </div>
                                                                <div class="data">
                                                                    <p class="c-text__lv5" id="js-business_tel"
                                                                       style="font-weight: bold;"></p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="head">
                                                                    <p class="c-text__label" style="color: black;">
                                                                        担当</p>
                                                                </div>
                                                                <div class="data">
                                                                    <p class="c-text__lv5" id="js-business_user_name"
                                                                       style="font-weight: bold;"></p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    {{--<div class="c-label__area--foot">
                                                      <p class="c-text__lv3 c-text__weight--900">冷蔵</p>
                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="c-mgt16">
                                        <div class="c-buttonArea__end">
                                            <button class="c-button" id="print_lavel"
                                                    onclick="partialPrintAndPacking();" target="_blank" disabled>ラベルを発行
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @include('market.element._bottom_packing')
                    </main>
                {!! Form::hidden('m_business_id', '', ['id' => 'input_m_business' ]) !!}
                {!! Form::hidden('package_id', $package->id, ['id' => 'input_package' ]) !!}
            </form>
        </div>
    </section>
    @include('market.element.modal._modal_camera')
    <script src="{{asset('js/package_camera.js')}}"></script>
@endsection
