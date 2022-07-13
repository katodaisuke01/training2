@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__poc')
@section('title', 'エリア別仕分け')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">

            <div class="p-page">
                <div class="l">
                    <div class="l-fix l-fix__450">
                        <div class="c-full">

                            <div class="c-title">
                                <p class="c-text__deep c-text__lv4 c-text__weight--700">QR読み込み商品</p>
                            </div>
                            <div class="c-box c-paper shadow">
                                <div class="c-box__head">
                                    <div class="c-image"
                                         style="background-image:url(/image/sample/image_aji.png)"></div>
                                </div>
                                <div class="c-box__body">
                                    <div class="c-text">
                                        <ul class="p-list">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">商品名称</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5 c-text__weight--700">アジ（真鯵）</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">重量</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4">520g</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__unit">仕分け棚</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv5 c-text__weight--700">A棚上段左A-1</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="l-fix">
                        <div class="c-full">
                            <div>

                                <div class="c-title">
                                    <p class="c-text__deep c-text__lv4 c-text__weight--700">
                                        配送エリア
                                    </p>
                                </div>
                                <div class="c-box shadow">
                                    <div class="c-box__head">
                                        <p class="c-text__lv1 c-text--center c-text__weight--900 c-text__alert">
                                            東京エリアA</p>
                                        <div class="c-image__japan"></div>
                                    </div>
                                    <div class="c-box__body">
                                        <p class="c-text__lv5 c-text__weight--900 c-text--center">
                                            <span class="c-text__unit">配送先</span>
                                            海鮮バル FIsh&Bird
                                            <span class="c-text__lv6">東京都江東区東陽町1-1-1 東陽町ビル1F</span>
                                        </p>
                                    </div>
                                    <!-- 読み取りのない時の表示 -->
                                    @include('worker.element._noContent')
                                    <style>.p-noContent {
                                            display: none
                                        }</style>
                                    <!-- 読み取りのない時の表示 -->
                                </div>

                            </div>
                            <div class="c-mgt16">

                                <div class="c-title">
                                    <p class="c-text__deep c-text__lv4 c-text__weight--700">
                                        トレーコード
                                    </p>
                                </div>
                                <div class="c-box shadow f-a_center">
                                    <div class="c-box__body">
                                        <form action="" class="f-a_center">
                                            <div class="c-input">
                                                <input type="text" placeholder="0" value="">
                                            </div>
                                            <!-- トレーコードが入力されないと↓のopacity:0.3 -->
                                            <div class="c-right c-icon__w56 c-icon__link" style="opacity:1"></div>
                                            <!-- トレーコードが入力されたら↑のopacity:1に -->
                                        </form>
                                    </div>
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
