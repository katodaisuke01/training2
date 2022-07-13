<section class="remodal modal_item" data-remodal-id="modal_item{{ $stock->id }}"
         data-remodal-options="hashTracking:false" id="modal_item">
    <div class="p-modal">
        <section class="c-box c-box__600">
            <form action="">
                <a data-remodal-action="close" class="remodal-close"></a>
                <div class="p-modal__head">
                    <div class="text">
                        <p class="c-text__lv3 c-text__main c-text--center c-text__weight--900">商品情報詳細</p>
                    </div>
                    <div class="c-image__wide"
                         style="background-image:url({{ data_get($stock, 'order_product.image_path') ? Storage::disk('s3')->temporaryUrl(data_get($stock, 'order_product.image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                </div>
                <div class="p-modal__body">
                    <div class="l">
                        <div class="l-auto">
                            <ul class="p-list__wrap">
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">商品名</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv4">{{ data_get($stock, 'order_product.title') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">基準重量（1商品あたり）</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv4">{{ data_get($stock, 'order_product.base_weight') }}<span>g</span>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">産地</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ data_get($stock, 'order_product.industry_group.name') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">運送会社</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">ソラシドエア</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="c-text__unit">水揚日</p>
                                    </div>
                                    <div class="data">
                                        <p class="c-text__lv5">{{ date('Y/m/d', strtotime(data_get($stock, 'landing_date'))) }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-modal__foot">
                    <div class="c-buttonArea__center">
                        <a data-remodal-action="close"
                           class="c-button c-button__round c-button__line c-button__min">閉じる</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</section>
