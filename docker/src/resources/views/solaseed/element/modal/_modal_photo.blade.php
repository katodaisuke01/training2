<section class="remodal modal_photo" data-remodal-id="modal_photo" data-remodal-options="hashTracking:false"
         id="modal_photo">
    <div class="p-modal">
        <section class="c-box c-box__600">
            <a data-remodal-action="close" class="remodal-close"></a>
            <div class="p-modal__head">
                <div class="c-icon c-icon__question"></div>
                <div class="text">
                    <p class="c-text__lv2 c-text__main c-text__weight--900">{{ data_get($industry, 'name') }}<small>の集荷場所</small>
                    </p>
                </div>
            </div>
            <div class="p-modal__body">
                <div data-remodal-target="modal_photo" style="background-image:url({{ data_get($industry, 'image') }})"
                     class="c-image__wide"></div>
            </div>
            <div class="p-modal__foot">
                <div class="c-buttonArea__center">
                    <a data-remodal-action="close" class="c-button c-button__round c-button__line c-button__min">閉じる</a>
                </div>
            </div>
        </section>
    </div>
</section>
