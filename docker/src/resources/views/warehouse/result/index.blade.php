@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index" style="width:100%">
                    <div class="p-index__head">
                        <!-- <span class="c-icon c-icon__item"></span> -->
                        <h2 class="c-text__lv3 c-text__weight--900">実績データ</h2>
                        <div class="c-buttonArea__end">
                            <a href="" class="c-button__line c-button__min">納品書の発行・印刷</a>
                            <a data-remodal-target="modal_box" class="c-button c-button__min">梱包の箱を設定する</a>
                        </div>
                    </div>
                    <div class="p-index__body c-box shadow">
                        @include('market.element._noContent')
                    </div>
                </section>
            </div>
        </div>

        <div class="l">
            <div class="l-half">
                <section class="p-order">
                    <div class="p-order__head">
                        <div class="c-titleUnderline">
                            <h4 class="c-text c-text__lv4 c-text__weight--900">業者別注文情報</h4>
                            <div class="total">
                                <div class="c-buttonArea">
                                    <a class="icon_list"></a>
                                    <a class="icon_tile"></a>
                                </div>
                                <p class="number c-text__lv2 c-text__main" data-unit="件">8</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-order__body">
                        <div class="c-box">
                            <div class="p-scroll">
                                <div class="p-scroll__inner">
                                    <table class="p-table">
                                        <thead>
                                        <th class="w_90"><label>注文日</label></th>
                                        <th><label>事業者名</label></th>
                                        <th class="w_80"><label>注文個数</label></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @include('data.orderData')
                                        @php($orderList = orderList())
                                        @foreach($orderList as $value)
                                            <tr data-href="">
                                                <td>
                                                    <p class="data">{{ $value['input'] }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5 data">{{ $value['name'] }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__weight--900 c-text__main number"
                                                       data-after="個">{{ $value['order'] }}</p>
                                                </td>
                                                <td>
                                                    <span class="c-icon icon_next"></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="c-buttonArea__center">
                               <a href="" class="c-button__full c-button__sm c-button__round c-button__lineBlack">全て見る</a>
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
            <div class="l-half">
                <section class="p-order">
                    <div class="p-order__head">
                        <div class="c-titleUnderline">
                            <h4 class="c-text c-text__lv4 c-text__weight--900">魚種別注文情報</h4>
                            <div class="total">
                                <div class="c-buttonArea">
                                    <a class="icon_list"></a>
                                    <a class="icon_tile"></a>
                                </div>
                                <p class="number c-text__lv2 c-text__main" data-unit="件">20</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-order__body">
                        <div class="c-box">
                            <div class="p-scroll">
                                <div class="p-scroll__inner">
                                    <table class="p-table">
                                        <thead>
                                        <th><label>商品名</label></th>
                                        <th><label>注文個数</label></th>
                                        <th><label>注文業者</label></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @php($fishList = fishList())
                                        @foreach($fishList as $value)
                                            <tr data-href="">
                                                <td>
                                                    <p class="c-text__lv4 c-text__weight--700 data">生牡蠣</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv3 c-text__weight--900 c-text__main number"
                                                       data-after="個">20</p>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li><p class="data">株式会社事業者A</p></li>
                                                        <li><p class="data">株式会社事業者B</p></li>
                                                        <li><p class="data">株式会社事業者C<span>など</span></p></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <span class="c-icon icon_next"></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="c-buttonArea__center">
                               <a href="" class="c-button__full c-button__sm c-button__round c-button__lineBlack">全て見る</a>
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
