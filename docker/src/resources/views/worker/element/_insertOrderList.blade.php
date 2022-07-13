@foreach($orders as $order)
    <tr id="accept_order_list" data-total="{{ $orders->count() }}">
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
                東京都中央区銀座1-11-23
            </p>
        </td>
    </tr>
@endforeach
