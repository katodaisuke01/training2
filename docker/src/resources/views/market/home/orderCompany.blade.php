@extends('layouts.layout_market')

@section('content')
    <div class="l-container l-page">
        <div class="l">
            <div class="l-auto">
                <section class="p-order">
                    <div class="p-order__head">
                        <a href="javascript:history.back()" class="c-icon c-icon__back"></a>
                        <h4 class="c-text c-text__lv3 c-text__weight--900">注文情報<small>すべて</small></h4>
                        <div class="c-buttonArea__end">
                            <a href="{{route('orderFish')}}" class="c-button c-button__sm c-button__switch">魚種別</a>
                            <a class="c-button c-button__sm c-button__switch current">事業者別</a>
                        </div>
                    </div>
                    <div class="p-order__body">
                        <div class="c-titleUnderline">
                            <p class="title">本日の注文情報</p>
                            <div class="total">
                                <p class="number c-text__lv2 c-text__main" data-unit="件">8</p>
                            </div>
                        </div>
                        <ul class="p-listTable">
                            <li>
                                <ul class="p-listTable__head">
                                    <li class="fix-100">
                                        <p class="label">注文日</p>
                                    </li>
                                    <li class="auto">
                                        <p class="label updown">注文事業者</p>
                                    </li>
                                    <li class="fix-100">
                                        <p class="label">希望配送日</p>
                                    </li>
                                    <li class="fix-100">
                                        <p class="label updown">配送先</p>
                                    </li>
                                    <li class="fix-90">
                                        <p class="label updown">注文魚種</p>
                                    </li>
                                    <li>
                                        <p class="label stage">未着手</p>
                                    </li>
                                    <li>
                                        <p class="label stage">梱包完了</p>
                                    </li>
                                    <li>
                                        <p class="label stage">処理済</p>
                                    </li>
                                    <li class="fix-90">
                                    </li>
                                </ul>
                            </li>
                            @include('data.orderData')
                            @php($orderList = orderList())
                            @foreach($orderList as $value)
                                <li>
                                    <ul class="p-listTable__body">
                                        <li class="fix-100">
                                            <article>
                                                <p class="c-text__lv5 data">{{ $value['input'] }}</p>
                                            </article>
                                        </li>
                                        <li class="auto">
                                            <article>
                                                <p class="c-text__lv4 c-text__weight--700 data">{{ $value['name'] }}</p>
                                            </article>
                                        </li>
                                        <li class="fix-100">
                                            <article>
                                                <p class="c-text__lv4 c-text__weight--700 data">{{ $value['deliverDate'] }}</p>
                                            </article>
                                        </li>
                                        <li class="fix-100">
                                            <article>
                                                <p class="c-text__lv5 data">{{ $value['deliver'] }}</p>
                                            </article>
                                        </li>
                                        <li class="fix-90">
                                            <article>
                                                <p class="c-text__lv3 c-text__weight--900 c-text__main data"
                                                   data-unit="種">{{ $value['order'] }}</p>
                                            </article>
                                        </li>
                                        <li>
                                            <article>
                                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                                   data-unit="種">{{ $value['stage1'] }}</p>
                                            </article>
                                        </li>
                                        <li>
                                            <article>
                                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                                   data-unit="種">{{ $value['stage2'] }}</p>
                                            </article>
                                        </li>
                                        <li>
                                            <article>
                                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                                   data-unit="種">{{ $value['stage3'] }}</p>
                                            </article>
                                        </li>
                                        <li class="fix-90">
                                            <article>
                                            </article>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-order__foot">
                        <div class="p-pagination">
                            <ul class="c-listPagination">
                                <li><span class="c-icon icon_back"></span></li>
                                <li><span class="number">1</span></li>
                                <li><a class="number">2</a></li>
                                <li><a class="number">3</a></li>
                                <li><a class="c-icon icon_next"></a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
