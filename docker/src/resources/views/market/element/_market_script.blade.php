<script>
    // 降順・昇順ソート
    $(function () {
        $('.value_sort').each(function (index) {
            var target = $(this).data('sort');
            $(this).on('click', function () {
                if (target == 'order_date') {
                    var updown_form = '<input type="hidden" name="sort_created_at" value="" id="select_updown"/>';
                } else if (target == 'shipping_date') {
                    var updown_form = '<input type="hidden" name="sort_shipping_date" value="" id="select_updown"/>';
                }
                $(updown_form).appendTo($('#js-sort-date'));
                if ($(this).hasClass('change')) {
                    $('#select_updown').val('up');
                } else {
                    $('#select_updown').val('down');
                }
                $('#js-sort-date').submit();
            })
        })
    })
</script>
<script>
    $(function () {
        $('#js-push-start').on('change', function () {
            $('#js-sort-date').submit();
        })
        $('#js-push-end').on('change', function () {
            $('#js-sort-date').submit();
        })
    })
</script>
<!-- フォーム追加 -->
<script>
    $(function () {
        const qr_form = '<input type="text" name="qr_code" value="" id="js-target-on" placeholder="QRコードを読み取る" inputmode="none" autocomplete="off" style="opacity: 0; height: 0; margin: 0; padding: 0; display: block;" /><label for="new_order_package" class="c-text__error">QRコードを読み取りできません。箱を指定してください。</label>';
        var choice_packs = '<input type="hidden" name="order_package" value="" id="choices_pack"/>';
        var choice_new_packs = '<input type="hidden" name="order_package" value="new" id="choices_pack"/>';
        // 読み込み時、最後の要素にQRフォーカスを当てる
        $(qr_form).appendTo($('.p-listCard').eq(-1));
        $('#js-target-on').trigger('focus');
        $(choice_packs).appendTo($('.c-listCard').eq(-1));
        var data_package = $('#choices_pack').closest('.c-listCard').data('package');
        if (data_package == null) {
            $('#choices_pack').val('new');
        } else {
            $('#choices_pack').val(data_package);
        }

        $(document).ready(function () {
            $('#js-target-on').trigger('focus');
        });

        $(document).on('blur', '#js-target-on', function () {
            $('#js-target-on').trigger('focus');
        })
        // 作業一時終了
        $('#pending_task').on('click', function () {
            $('#pend_work_flow').val('on')
            $('#form_work_flow').submit();
        })
        // 作業完了
        $('#complete_task').on('click', function () {
            $('#complete_work_flow').val('on')
            $('#form_work_flow').submit();
        })
        // 保存して次へ
        $('#next_task').on('click', function () {
            $('#form_work_flow').submit();
        })

        // 配列の最後をデフォルト表示
        $('.c-icon__w32').eq(-1).addClass('switch')
        if ($('.p-listCard').length == 1) {
            $('.p-listCard').eq(0).addClass('show')
        } else {
            $('.p-listCard').eq(-1).addClass('show')
        }

        // 作業対象の商品の表示位置を配列の最後の要素にする
        $lengeOfNewproduct = $('.new_content').length;
        // if ($lengeOfNewproduct != 1) {

        // }

        setInterval(function () {
            $('div.c-icon__w32').each(function () {
                $(this).on('click', function () {
                    $('div.c-icon__w32').each(function (index, element) {
                        $(element).removeClass('switch');
                    })
                    $(this).addClass('switch');
                })
            })
        }, 1000);

        $(document).on('click', '.c-icon__plus', function () {
            var tr_form = '<li class="js-iconBox">' +
                '<div class="c-icon__w32 c-icon__box tab"></div>' +
                '</li>';

            var packs = '<div class="p-listCard c-content">' +
                '<ul class="c-listCard" id="add_new_package">' +
                '</ul>' +
                '</div>';
            $('div.c-icon__w32').each(function (index, element) {
                $(element).removeClass('switch');
            })
            $(tr_form).appendTo($('.p-listBox'));
            $(packs).appendTo($('.p-frame'));

            $('.js-iconBox').eq(-1).trigger("click");
            $('.js-iconBox').eq(-1).children('div.c-icon__w32').addClass("switch");

            // 作業中の商品を新しい箱に移動する
            if ($('.new_content') != null) {
                var new_packs = '<input type="hidden" name="add_new_order_package" value="on" />';
                $('.new_content').appendTo('#add_new_package');
                $(new_packs).appendTo('.new_content');
            }

        })

        $('.js-iconBox').each(function () {
            $(document).on('click', '.js-iconBox', function () {
                var num = $(this).index();
                console.log(num); //何番目の要素を操作しているか

                // 選択中の箱クリア
                $('#choices_pack').each(function () {
                    $('#choices_pack').remove();
                })

                // 選択された箱の中身を表示
                $('.p-listCard').removeClass('show').eq(num).addClass('show');

                // qrコード代入用のフォームを追加
                if (!($('#js-target-on').length)) {
                    $(qr_form).appendTo($('.p-listCard').eq(num));

                    // フォーカスを当てる
                    $('#js-target-on').trigger('focus');
                } else {
                    $('#js-target-on').remove();
                    $(qr_form).appendTo($('.p-listCard').eq(num));

                    // フォーカスを当てる
                    $('#js-target-on').trigger('focus');
                }

                $('.new_content').prependTo($('.c-listCard').eq(num));

                if ($('.new_content').length > 1) {
                    $('.new_content').eq(0).remove();
                }

                // 選択中の箱にフォーカス
                if ($('.c-listCard').eq(num).closest("#add_new_package").length > 0) {
                    $(choice_new_packs).appendTo($('.c-listCard').eq(num));
                } else if ($('.c-listCard').eq(num).closest(".p-listCard").hasClass('show')) {
                    $(choice_packs).appendTo($('.c-listCard').eq(num));
                    var data_package = $('#choices_pack').closest('.c-listCard').data('package');
                    if (data_package == null) {
                        $('#choices_pack').val('new');
                    } else {
                        $('#choices_pack').val(data_package);
                    }
                } else {
                    $('#choices_pack').remove();
                }

            });
        })

        {{-- Qrコードが1文字づつ読み込まれるため、全ての文字を読み込むまで待機する --}}
        let timeout = null;
        $(document).on('input', '#js-target-on', function () {
            clearTimeout(timeout);
            let self = this;

            timeout = setTimeout(
                function () {
                    const qrValue = $(self).val()
                    if (isUrl(qrValue)) {
                        $(self).val(getPackageIdFromUrl(qrValue))
                        $('#form_work_flow').submit();
                    }
                },
                500
            )
        })

    });

    function isUrl(text) {
        return /(?:[A-Za-z]{3,9})(?::\/\/|@)(?:(?:[A-Za-z0-9\-.]+[.:])|(?:www\.|[-;:&=+$,\w]+@))(?:[A-Za-z0-9.-]+)(?:[/\-+=&;%@.\w_~()]*)(?:[.!/\\\w-?%#~&=+()]*)/i.test(text)
    }

    function getPackageIdFromUrl(url) {
        const parsedUrl = new URL(url)
        return parsedUrl.pathname.split('/').pop()
    }
</script>
<!-- ! フォーム削除 -->
<script>
    $(document).on('click', '.button_minus', function () {
        let This = $(this),
            Wrap = This.parent(),
            Pare = This.parents('.p-listBox > li');
        // 削除
        Wrap.remove();
        let Id = Pare.find('.minus').length + 1;
        for (let i = 0; i < Id; i++) {
            let Num = i + 1;
        }
    });
</script>

<!-- ! ラベル印刷 -->
<script>
    $(function () {
        setInterval(function () {
            if (!isNaN($('input[name="determined_weight"]').val()) &&
                $('.canvas_image').data('file') == 'on') {
                $('#print_lavel').prop('disabled', false);
            }
        }, 3000);

        $('#order_weight').text($('#load_weight').val() + 'g');
    })

    function partialPrint() {
        //印刷する要素代入
        $('.button_for_print').attr('class', 'c-buttonArea__end button_for_print print-off');
        $('.js_padd_off').attr('class', 'c-box js_padd_off padding_top_off')
        var printPage = $('#qr_lavel_for_print').html();

        //「すべての要素に非表示用のclass「print-off」を指定し、非表示
        var not_print_element = document.querySelectorAll("body > *")
        for (var i = 0; i < not_print_element.length; ++i) {
            not_print_element[i].classList.add("print-off")
        }

        //プリント用の要素「#print」を作成
        document.body.insertAdjacentHTML('beforeend', '<div id="print" style="max-width: 510px"></div>')
        //印刷エリアの要素を代入
        document.getElementById("print").insertAdjacentHTML('beforeend', printPage)

        //印刷
        window.print();
        window.close();

        // スタイルを元に戻す
        $('#print').remove();
        $('.flash_success').css('display', 'none');
        $('.print-off').removeClass('print-off');
        $('.js_padd_off').removeClass('padding_top_off')
    }

    function partialPrintAndPacking() {
        //印刷する要素代入
        $('.button_for_print').attr('class', 'c-buttonArea__end button_for_print print-off');
        $('.label_image').css('display', 'none');
        $('.js_padd_off').attr('class', 'c-box js_padd_off padding_top_off')
        var printPage = $('#qr_lavel_for_print').html();

        //「すべての要素に非表示用のclass「print-off」を指定し、非表示
        var not_print_element = document.querySelectorAll("body > *")
        for (var i = 0; i < not_print_element.length; ++i) {
            not_print_element[i].classList.add("print-off")
        }

        //プリント用の要素「#print」を作成
        document.body.insertAdjacentHTML('beforeend', '<div id="print" style="max-width: 510px"></div>')
        //印刷エリアの要素を代入
        document.getElementById("print").insertAdjacentHTML('beforeend', printPage)

        //印刷
        window.print();
        window.close();

        // スタイルを元に戻す
        $('#print').remove();
        $('.flash_success').css('display', 'none');
        $('.print-off').removeClass('print-off');
        $('.js_padd_off').removeClass('padding_top_off')
        $('#store_packing_button').trigger('click');
    }

    $(function () {
        $('#store_packing_button').on('click', function () {
            console.log('ok')
            $('#store_packing_form').submit();
        })
    })
</script>
<style>
    .print-off {
        display: none;
    }

    .padding_top_off {
        padding: 0 20px 20px 20px;
    }

    .c-text__error, .error {
        display: none;
    }
</style>

<script>
    $(function () {
        // カレンダー日付選択
        $('.fc-today-button').text('今日');
        $(document).on('click', '.fc-day-top', function () {
            var selectDate = $(this).data('date');
            $('.fc-day-top').css('background', 'unset');
            $('#task_date').val(selectDate);
            $(this).css('background', '#09ffed');

            $('#getTaskForm').submit();
        })
    })
</script>
