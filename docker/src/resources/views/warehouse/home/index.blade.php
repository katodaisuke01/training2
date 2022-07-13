@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index" style="width:100%">
                    <div class="p-index__head">
                        <!-- <span class="c-icon c-icon__item"></span> -->
                        <h2 class="c-text__lv3">ダッシュボード</h2>
                        <div class="c-buttonArea__end">
                            <a href="{{ route('warehouse.home') }}" class="c-button__line c-button__min">納品書の発行・印刷</a>
                            <a data-remodal-target="modal_box" class="c-button c-button__min">梱包の箱を設定する</a>
                        </div>
                    </div>
                    <div class="p-index__body c-box shadow">
                        <div class="l">
                            <div class="l-half">
                                <section class="p-order">
                                    <div class="p-order__head">
                                        <div class="c-titleUnderline">
                                            <h4 class="c-text c-text__lv4 c-text__weight--900">業績</h4>
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
                                                    @include('market.element._noContent')
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
                                                    @include('market.element._noContent')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>
@endsection
