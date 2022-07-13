@extends('layouts.layout_market')
@section('page_class', 'l-home')
@section('content')
    <div class="l-container">
        <section class="p-home">
            <div class="p-home__head">
                <h2 class="c-text__lv3 c-text__weight--900">作業選択</h2>
            </div>
            <div class="p-home__body">
                <ul class="p-list__split2">
                    <li data-href="{{ route('industry.market.register') }}">
                        <div class="c-box shadow">
                            <div class="c-image__square">
                                <div class="c-text">
                                    <p class="c-text__lv1 c-text__weight--900 c-text--center">計量・撮影</p>
                                    <p class="c-text__lv3 c-text__weight--900 c-text--center">水揚げ商品登録</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li data-href="{{ route('industry.market.packing') }}">
                        <div class="c-box shadow">
                            <div class="c-image__square">
                                <div class="c-text">
                                    <p class="c-text__lv1 c-text__weight--900 c-text--center">仕分け・梱包</p>
                                    <p class="c-text__lv3 c-text__weight--900 c-text--center">出荷の準備梱包</p>
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
@endsection
