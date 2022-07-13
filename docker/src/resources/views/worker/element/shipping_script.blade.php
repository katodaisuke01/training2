<script>

    // Qrコードが読み込まれたら通信スタート
    $(document).on('input', '.client-package-url', function () {
        clearTimeout(timeout);
        let self = this;
        {{-- Qrコードが1文字づつ読み込まれるため、全ての文字を読み込むまで待機する --}}
            timeout = setTimeout(
                function () {
                    {{-- バーコードリーダーの設定により、:が+や'に変換される場合あり --}}
                    let value = $(self).val().replace('+//', '://').replace("'//", '://')
                    {{-- 全角英数を半角英数に変換 --}}
                    let formated_url = value.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){
                        return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
                    });                    
                    $.post({
                    url: "{{ route('worker.shipping.getClientPackage') }}",
                    headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                    data: {
                        'client-package-url': formated_url,
                    },
                }).done(function (data) {
                        if(data[1] == 0){
                            $(`.client_id_${data[0]}`).addClass('checked')
                            if (!$(`.c-list__content > .area_${data[2]} .check-client-button:not(.checked)`).length) {
                                $(`.c-list__tab > .area_${data[2]}`).addClass('checked')
                                $(`.c-list__content > .area_${data[2]}`).addClass('checked')
                            }
                        }
                }).fail(function () {
                    $('.list_flash').append(`<li class="flash_error">
                  <article class="link_float">
                    <div class="data_flash">
                      <p>QRコードの読み込みに失敗しました</p>
                    </div>
                  </article>
                </li>`)
                })
            },
            500
        )
    })


    $(function () {
        $(document).on('click', '.check-client-button', function () {
            $.post({
                url: "{{ route('worker.shipping.update') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    'client_id': $(this).data('client-id'),
                },
                context: this,
            }).done(function (data) {
                if (!$('.c-list__content > .show .check-client-button:not(.checked)').length) {
                    $('.c-list__tab > .active').addClass('checked')
                    $('.c-list__content > .show').addClass('checked')
                }
            }).fail(function () {
                $(this).removeClass('checked')
            })
        })
    })
</script>
