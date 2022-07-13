<section class="remodal modal_delete" data-remodal-id="modal_delete" data-remodal-options="hashTracking:false"
         id="modal_delete_master">
    <div class="p-modal">
        <section class="c-box c-box__600">
            <a data-remodal-action="close" class="remodal-close"></a>
            <div class="p-modal__head">
                <div class="c-icon c-icon__question"></div>
                <div class="text">
                    <p class="c-text__lv2 c-text__main c-text__weight--900">本当に削除しますか？</p>
                </div>
            </div>
            <div class="p-modal__body">
                <p class="c-text__lv6">一度削除すると登録内容は<br/>すべて抹消されます。</p>
            </div>
            <div class="p-modal__foot">
                <div class="c-buttonArea__center">
                    <a data-remodal-action="close"
                       class="c-button c-button__round c-button__line c-button__min">キャンセル</a>
                    <form action="" id="delete_form" method="post">
                        @csrf
                        <input type="hidden" name="id" id="staff_delete_id">
                        <a class="c-button c-button__round c-button__gray c-button__min js-master-delete js-master-post"
                           id="delete_button">削除する</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>
