<section class="remodal modal_box" data-remodal-id="modal_box" data-remodal-options="hashTracking:false">
    <div class="p-modal">
        <section class="c-box c-box__600">
            <a data-remodal-action="close" class="remodal-close"></a>
            <form action="{{ route('admin.pdf') }}" method="get" target="_blank">
                @csrf
                <div class="p-modal__head">
                    <div class="c-icon c-icon__box--open"></div>
                    <div class="text">
                        <p class="c-text__lv2 c-text__main c-text__weight--900">梱包の箱数を設定</p>
                    </div>
                </div>
                <div class="p-modal__body">
                    <!-- 10枚単位で増えたり減ったり -->
                    <div class="c-input c-input__end">
                        <div class="c-input c-input_200">
                            <input class="number c-text__main" name="quantity" value="10" type="number"
                                   id="Qr-code-quantity" placeholder="0">
                        </div>
                        <p class="c-text__lv3 unit">箱分</p>
                    </div>
                </div>
                <div class="p-modal__foot">
                    <div class="c-buttonArea__center">
                        <button type="submit" class="c-button c-button__round c-button__wide c-button__sm"
                                id="js-print">QR発行・印刷して閉じる</a>
                            <!-- <a data-remodal-action="close" class="c-button c-button__round c-button__wide c-button__sm">QR発行・印刷して閉じる</a> -->
                    </div>
                </div>
            </form>
        </section>
    </div>
</section>
