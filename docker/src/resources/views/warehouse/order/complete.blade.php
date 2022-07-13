@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index p-store">
                    <div class="p-index__head">
                        <div class="c-titleUnderline">
                            <span class="c-icon c-icon__item"></span>
                            <h2 class="c-text__lv3 c-text__weight--900">商品注文完了</h2>
                        </div>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box c-box__600">
                            <p class="c-text__lv2 c-text--center c-text__main c-text__weight--900">注文が完了しました。</p>
                            <p class="c-text__lv4 c-text--center c-text__weight--700">ご注文ありがとうございます。<br/>引き続きご利用のほど、よろしくお願いいたします。
                            </p>
                        </div>
                    </div>
                    <div class="p-index__foot c-borderTop">
                        <div class="c-buttonArea__center">
                            <a href="{{route('warehouse.home')}}" class="c-button__round c-button__line c-button__wide">トップへ戻る</a>
                            <a href="{{route('warehouse.order.index')}}"
                               class="c-button__round c-button__wide">再度注文する</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
