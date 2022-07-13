<script>
    let orders
    let pack
    let alerted_order

    // Qrコードが読み込まれたら通信スタート
    $(document).on('input', '.package-url', function () {
        clearTimeout(timeout);
        let url = this.value;
        // 全角を半角に変換
        var formated_url = url.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){
          return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
          });

        {{-- Qrコードが1文字づつ読み込まれるため、全ての文字を読み込むまで待機する --}}
            timeout = setTimeout(
            function () {
                $.get({
                    url: "{{ route('worker.accept.handle.getPackage') }}",
                    data: {
                        'package-url': formated_url,
                    }
                }).done(function (data) {
                    pack = data.package
                    $('.c-finished').toggle(pack.pack_status === {{ App\Models\Package::TYPE_HANDLE }})
                    $('.pack-name').text(pack.industry_group_name)

                    orders = data.orders
                    $('.order_count').text(orders.length).append(`<span class="c-text__unit">点</span>`)

                    $('.orders').empty()
                    $('.package-url').val('')
                    for (let [key, order] of Object.entries(orders)) {
                        let checked = order.instock_status === {{ App\Models\Order::TYPE_CONFIRMED }} ? 'checked' : ''
                        $('.orders').append(
                            `<tr>
                                <td>
                                   <div class="c-image" style="background-image:url(${order.image})"></div>
                                </td>
                                <td>
                                   <p class="c-text__lv4 c-text__weight--700">${order.order_product_name}</p>
                                </td>
                                <td>
                                   <p class="c-text__lv3 c-text__weight--900">${order.cast_weight}</p>
                                </td>
                                <td>
                                   <p class="c-text__lv6">${order.delivery_partnar_name}</p>
                                </td>
                                <td class="">
                                   <div class="c-buttonArea">
                                      <div class="c-button__line--user c-button__check order-check-button ${checked}" id="${order.id}" data-order-id="${order.id}">確認</div>
                                   </div>
                                </td>
                                <td>
                                   <div class="c-radio">
                                      <a data-remodal-target="modal_report" class="c-button__gray c-button__min " id="select__${order.id}" data-order-value="${key}" onclick="callOrder(${key});return false;">異常報告</a>
                                      <label for="select__${order.id}"></label>
                                   </div>
                                </td>
                             </tr>`
                        )
                    }
                }).fail(function () {
                    $('.list_flash').append(`<li class="flash_error">
                  <article class="link_float">
                    <div class="data_flash">
                      <p>QRコードの読み込みに失敗しました</p>
                    </div>
                  </article>
                </li>`)

                    pack = []
                    $('.c-finished').hide()
                    $('.pack-name').text('')

                    orders = []
                    $('.order_count').empty().append(`<span class="c-text__unit">点</span>`)

                    $('.orders').empty()
                    $('.package-url').val('')
                })
            },
            500
        )
    })

    $(document).on('click', '.order-check-button', function () {

        // チェックする前に異常報告されていたらチェックできないようにする
        if ($(this).hasClass('order_alert')) {
            return true;
        }
        $.post({
            url: "{{ route('worker.accept.handle.order.check') }}",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                'order_id': $(this).data('order-id'),
            },
            context: this,
        }).done(function (data) {
            $(this).addClass('checked')
            if (data.is_processed) {
                $('.c-finished').show()
            }
        })
    })

    function callOrder(value) {
        $('.order-alerts').empty()
        $('.p-list__alert').empty()
        alerted_order = orders[value]
        $('.order-alerts').append(
            `<div class="f-a_center f-j_center c-full">
                <div class="c-image" style="background-image:url(${alerted_order.image})"></div>
                <div class="c-text">
                <p class="c-text__lv5 c-text__weight--700">${alerted_order.order_product_name}</p>
                <p class="c-text__lv5 c-text__weight--700">${alerted_order.cast_weight}</p>
                </div>
                <div class="c-text">
                <p class="c-text__lv7 ">${pack.industry_group_name}</p>
                <p class="c-text__lv7 ">${alerted_order.delivery_partnar_name}</p>
                </div>
            </div>`
        )
        $('.p-list__alert').append(
            `<ul class="p-list__wrap">
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="package_damaged">
                    <label for="package_damaged">商品パッケージの損傷</label>
                    </div>
                </li>
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="undelivered">
                    <label for="undelivered">商品の未着</label>
                    </div>
                </li>
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="damaged">
                    <label for="damaged">商品そのものの損傷</label>
                    </div>
                </li>
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="different">
                    <label for="different">商品が違う</label>
                    </div>
                </li>
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="incorrect_delivery">
                    <label for="incorrect_delivery">商品の誤配送</label>
                    </div>
                </li>
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="shipping_defects">
                    <label for="shipping_defects">配送上の不備</label>
                    </div>
                </li>
                <li>
                    <div class="c-checkbox">
                    <input type="checkbox" name="alert" id="other">
                    <label for="other">その他</label>
                    </div>
                </li>
            </ul>`
        )
    }

    $(document).on('click', '.order-alert-button', function () {
        $(this).prop("disabled", true);
        $.post({
            url: "{{ route('worker.accept.handle.order.alert') }}",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                'order_id': alerted_order.id,
                'alerts': $("[name=alert]:checked").map(function () {
                    return $(this).attr('id')
                }).get(),
            },
            context: this,
        }).done(function (data) {
            if (data.success) {
                $('[data-remodal-id=modal_report]').remodal().close()
                $('.list_flash').append(`<li class="flash_success">
                  <article class="link_float">
                    <div class="data_flash">
                      <p>商品の異常を報告いたしました</p>
                    </div>
                  </article>
                </li>`)
                const target_id = alerted_order.id;
                const data = document.querySelectorAll('[data-order-id="' + target_id + '"]');
                // チェックされている商品のidを取得して、その商品にクラス名を足す
                for (var i = 0; i < data.length; i++) {
                    const target_div = document.getElementById(data[i].id);
                    target_div.className += ' order_alert';
                }

            }

            $(this).prop("disabled", false);
        })
    })
</script>
