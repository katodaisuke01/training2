<section class="remodal modal_delete"
         data-remodal-id="modal_product_delete_{{ $delete_order->page_number.'_'.$delete_order->simultaneous_order_code }}"
         data-remodal-options="hashTracking:false" id="modal_delete_product">
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
                    <form action="{{ route('industry.market.deleteProduct') }}"
                          id="product_delete_form{{$delete_order->page_number.'_'.$delete_order->simultaneous_order_code }}"
                          method="post">
                        @csrf
                        <input type="hidden" name="group_id" id="group_id"
                               value="{{ $delete_order->simultaneous_order_code }}">
                        <input type="hidden" name="delete_page_id" id="page_id"
                               value="{{ $delete_order->page_number }}">
                        <input type="hidden" name="order_product_id" value="{{ app('request')->input('product_id') }}">
                        <input type="hidden" name="order_group_id" value="{{ app('request')->input('order') }}">
                        <input type="hidden" name="business_group_id"
                               value="{{ app('request')->input('businessGroup') }}">
                        <input type="hidden" name="page_id" value="{{ app('request')->input('page') }}">
                        <a class="c-button c-button__round c-button__gray c-button__min" id="product_delete_button"
                           onClick="productDelete{{$delete_order->page_number.'_'.$delete_order->simultaneous_order_code }}()">削除する</a>
                    <!-- <button class="c-button c-button__round c-button__gray c-button__min" id="product_delete_button" form="product_delete_form{{$delete_order->page_number.'_'.$delete_order->simultaneous_order_code }}">削除する</a> -->
                        <script>
                            function productDelete{{$delete_order->page_number.'_'.$delete_order->simultaneous_order_code}}() {
                                $(this).css('pointer-events', 'none');
                                if ($('#product_delete_form{{$delete_order->page_number.'_'.$delete_order->simultaneous_order_code }}').length) {
                                    $('#product_delete_form{{$delete_order->page_number.'_'.$delete_order->simultaneous_order_code }}').submit();
                                } else {
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                        },
                                        type: 'POST',
                                        url: "workflow/deleteProduct",
                                        dataType: 'json',
                                        data: {
                                            'group_id': {{ $delete_order->simultaneous_order_code }},
                                            'delete_page_id': {{ $delete_order->page_number }},
                                            'order_product_id': {{ app('request')->input('product_id') }},
                                            'order_group_id': {{ app('request')->input('order') }},
                                            'business_group_id': {{ app('request')->input('businessGroup') }},
                                            'page_id': {{ app('request')->input('page') }},
                                            'xhr_post': 'on',
                                        }
                                    })
                                        .done(function (data) {
                                            console.log(data);
                                            var newUrl = "workflow?product_id=" + data.product_id + "&order=" + data.order + "&businessGroup=" + data.businessGroup + "&page=" + data.page;
                                            location.href = newUrl;
                                        })
                                }
                            }
                        </script>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>
