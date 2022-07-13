<section class="remodal modal_order_delete" data-remodal-id="modal_order_delete{{ $order->simultaneous_order_code }}"
         data-remodal-options="hashTracking:false" id="modal_order_delete">
    <div class="p-modal">
        <section class="c-box">
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
                    <form action="{{ route('warehouse.order.destroy') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="order_delete_id"
                               value="{{ $order->simultaneous_order_code }}">
                        <button type="submit" class="c-button c-button__round c-button__gray c-button__min">削除する</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>
