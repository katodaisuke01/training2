<section class="remodal modal_order" data-remodal-id="modal_order_{{ data_get($product, 'id') }}"
         data-remodal-options="hashTracking:false" id="modal_order">
    <div class="p-modal">
        <section class="c-box">
            <a data-remodal-action="close" class="remodal-close"></a>
            <div class="p-modal__head">
                <div class="c-icon c-icon__item"></div>
                <div class="text">
                    <p class="c-text__lv2 c-text__main c-text__weight--900">商品説明</p>
                </div>
            </div>
            <div class="p-modal__body">
                <div class="l">
                    <div class="l-fix l-fix__300">
                        <div class="c-image"
                             style="background-image:url({{ $product->image_path ? Storage::disk('s3')->temporaryUrl($product->image_path, Carbon::now()->addMinute()) : '' }});"></div>
                    </div>
                    <div class="l-auto">
                        <div class="c-text">
                            <p class="c-text__lv4 c-text__weight--700 c-text__main">{{ data_get($product, 'title') }}</p>
                            <p class="c-text__lv5">
                                {{ nl2br(e(data_get($product, 'article'))) }}
                            </p>
                            <p class="c-text__lv5">販売価格：<strong
                                    class="c-text__lv3 c-text__main">{{ data_get($product, 'price') }}</strong><span
                                    class="c-text__unit">円（税込）</span></p>
                            {{--<p class="c-text__lv5">在庫状態：<strong class="c-text__lv4">在庫あり</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-modal__foot">
                <div class="c-buttonArea__center">
                    <a data-remodal-action="close" class="c-button c-button__round c-button__line c-button__min">閉じる</a>
                </div>
            </div>
        </section>
    </div>
</section>
