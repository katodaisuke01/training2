@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__accept p-handle')
@section('title', '荷受け・荷捌き業務')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">

            <div class="p-page">
                <div class="l">
                    <div class="l-fix l-fix__250">
                        <div class="c-full">
                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">QR読み込みの入荷箱</p>
                            </div>
                            <div class="c-box shadow">
                                <!-- 画面右の商品が全部処理済になったら↓をdisplay:blockに -->
                                <div class="c-finished" style="display: none">
                                    <p class="c-text__lv4 c-text__weight--700 ">処理済み</p>
                                </div>
                                <!-- 画面右の商品が全部処理済になったら↑をdisplay:blockに -->
                                <div class="c-box__body">
                                    <!-- 読み取りしてなくて表示情報がない時は↓をopacity:0.3に -->
                                    <div class="c-icon c-icon__box" style="opacity:1"></div>
                                    <!-- 読み取りしてなくて表示情報がない時は↑をopacity:0.3に -->
                                    <div class="c-text">
                                        <ul class="p-list">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">産地</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5 pack-name"></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">商品数</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv3 c-text__user c-text__weight--900 order_count">
                                                        <span class="c-text__unit">点</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 注文詳細 -->
                {{-- @include('worker.element._detailOrderList') --}}
                <!-- or -->
                    <div class="l-auto">
                        <div class="c-full">
                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">梱包商品</p>
                                <input type="text" name="pack_code" class="package-url" id="js-target-on"
                                       inputmode="none"
                                       style="position: absolute;top: -9999px; left: -9999px;">
                            </div>
                            <div class="c-box shadow">
                                <div class="c-box__body">
                                    <table class="p-table">
                                        <thead>
                                        <th class="w_80">
                                            <p class="c-text__label">商品画像</p>
                                        </th>
                                        <th>
                                            <p class="c-text__label">商品名称</p>
                                        </th>
                                        <th>
                                            <p class="c-text__label">計量値</p>
                                        </th>
                                        <th>
                                            <p class="c-text__label">運送会社</p>
                                        </th>
                                        <th class="w_80">
                                            <p class="c-text__label">チェック</p>
                                        </th>
                                        <th class="w_70">
                                            <p class="c-text__label">異常報告を行う</p>
                                        </th>
                                        </thead>
                                        <tbody class="orders">
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('worker.element._buttonArea_bottom')
        </main>
    </div>
@endsection
