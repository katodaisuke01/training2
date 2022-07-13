<script>
    let order
    let client
    let tray

    function isUrl(text) {
        return /(?:[A-Za-z]{3,9})(?::\/\/|@)(?:(?:[A-Za-z0-9\-.]+[.:])|(?:www\.|[-;:&=+$,\w]+@))(?:[A-Za-z0-9.-]+)(?:[/\-+=&;%@.\w_~()]*)(?:[.!/\\\w-?%#~&=+()]*)/i.test(text)
    }

    function addGramOrKG(weight) {
        if (weight < 1000) {
            return weight + 'g'
        } else {
            return Math.floor(weight / 1000) + '.' + (weight + '').slice(-3, -2) + 'kg'
        }
    }

    function reset() {
        order = null
        client = null
        tray = null

        $('.qr-input').val('')

        $('.order-image').css('background-image', null)
        $('.order-product-name').text('')
        $('.order-weight').text('')
        $('.order-client-name').text('')

        resetTray()
    }

    function resetTray() {
        $('.shelf-name').text('')

        $('.area-name').text('')
        $('.tray-code').text('')

        $('.client-name').text('')
        $('.c-direction').removeClass('c-direction')
    }


    // Qrコードが読み込まれたら通信スタート
    $(document).on('input', '.qr-input', function () {
        clearTimeout(timeout);
        let self = this;

        {{-- Qrコードが1文字づつ読み込まれるため、全ての文字を読み込むまで待機する --}}
            timeout = setTimeout(
            function () {
                // トレイ
                {{-- バーコードリーダーの設定により、:が+や'に変換される場合あり --}}
                let rawValue = $(self).val().replace('+//', '://').replace("'//", '://')
                let value = rawValue.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){
                  return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
                });
                if (!isUrl(value) && typeof order !== 'undefined') {
                    $.post({
                        url: "{{ route('worker.accept.sort.associateWithTray') }}",
                        data: {
                            'order_id': order.id,
                            'tray_code': value,
                        },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    }).done(function (data) {
                        resetTray()
                        client = data.client
                        tray = data.tray

                        $('.shelf-name').text(client.shelf.name + client.shelf.position_name)

                        $('.area-name').text(client.area.name)
                        $('.tray-code').text(tray.code)

                        $('.client-name').text(client.name)
                        $('.position-' + client.shelf.position_key).addClass('c-direction')

                        $('.todays-sort-progress').text(data.todaysSortProgress)
                        $('.qr-input').val('')
                    }).fail(function () {
                        $('.list_flash').append(
                            `<li class="flash_error">
                              <article class="link_float">
                                <div class="data_flash">
                                  <p>QRコードの読み込みに失敗しました</p>
                                </div>
                              </article>
                            </li>`)
                        $('.qr-input').val('')
                    })
                } else {
                    $.post({
                        url: "{{ route('worker.accept.sort.sortDataByUrl') }}",
                        data: {
                            'order_stock_url': value,
                        },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    }).done(function (data) {
                        reset()
                        order = data.order

                        $('.order-image').css('background-image', 'url(' + order.image + ')');
                        $('.order-product-name').text(order.order_product_name)
                        $('.order-weight').text(order.cast_weight)
                        $('.order-client-name').text(order.order_client_name)
                    }).fail(function () {
                        $('.list_flash').append(
                            `<li class="flash_error">
                              <article class="link_float">
                                <div class="data_flash">
                                  <p>QRコードの読み込みに失敗しました</p>
                                </div>
                              </article>
                            </li>`)
                        reset()
                    })
                }
            },
            500
        )
    })
</script>
