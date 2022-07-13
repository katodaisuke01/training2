@foreach($orders as $order)
    <tr id="accept_handle_list" data-total="{{ $orders->count() }}">
        <td>
            <img
                src="{{ data_get($order, 'image_path') ? Storage::disk('s3')->temporaryUrl(data_get($order, 'image_path'), Carbon::now()->addMinute()) : '' }}"
                height="50" alt="">
        </td>
        <td>
            <p class="c-text__lv5 c-text__weight--700">{{ data_get($order, 'order_product.title') }}</p>
        </td>
        <td>
            <p class="c-text__lv5">{{ data_get($order, 'weight') }}g</p>
        </td>
        <td>
            <!-- <p class="c-text__lv5">800<span class="c-text__unit">円</span></p> -->
            <p class="c-text__lv5">{{ number_format(data_get($order, 'order_product.price')) }}<span
                    class="c-text__unit">円</span></p>
        </td>
        <td>
            <p class="c-text__lv6">
                {{ data_get($order, 'client.name') }}
            </p>
            <p class="c-text__unit">
                {{ data_get($order, 'client.display_address') }}
            </p>
        </td>
        <td>
            <div class="c-buttonArea">
                <a data-remodal-target="modal_report" class="c-button__alert c-button__min">異常あり</a>
            </div>
        </td>
        <td>
            <div class="c-checkbox">
                <input type="checkbox" name="select_item" id="item--{{$order->id}}" value="{{$order->id}}">
                <label for="item--{{$order->id}}"></label>
            </div>
        </td>
    </tr>
@endforeach
