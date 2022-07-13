<section class="remodal modal_item_delete" data-remodal-id="modal_item_delete" data-remodal-options="hashTracking:false"
         id="modal_delete_item">
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
                    <form action="{{ route('admin.item.destroy', [$product]) }}" id="delete_item_form" method="post">
                        @csrf
                        <input type="hidden" name="id" id="item_delete_id" value="">
                        <button type="submit"
                                class="c-button c-button__round c-button__gray c-button__min js-item-delete js-item-post"
                                id="delete_item_button">削除する
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>
