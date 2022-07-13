<script>
    $(function () {
        var clickEventType = ((window.ontouchstart !== null) ? 'click' : 'touchend');
        if (clickEventType = 'click') {
            $('#labor_delete').on('click', function () {
                $('#delete_id').val($(this).data('id'));
                $('#delete_button').on('click', function () {
                    $('#delete_form').attr('action', '/warehouse/labor/destroy');
                    $('#delete_form').submit();
                })
            })
        } else {
            $('#labor_delete').on('touchend', function () {
                $('#delete_id').val($(this).data('id'));
                $('#delete_button').on('touchend', function () {
                    $('#delete_form').attr('action', '/warehouse/labor/destroy');
                    $('#delete_form').submit();
                })
            })
        }
    })
</script>

<script>
    $(function () {
        if ($('#js-client-selector').val() == 'new_client') {
            $('.client_name_input').show();
        } else {
            $('.client_name_input').hide();
        }
        // 注文顧客の登録制御
        $('#js-client-selector > option').each(function (index) {
            var selectClient = $(this).addClass(index + 'select-client');
        })

        function changeClient(_this) {
            $('#client_information input').val('');
            $('select[name="prefecture_name"]').val("");
            $('select[name="delivery_partnar"]').val("");

            if ($(_this).val() == 'new_client') {
                $('.client_name_input').show();
                $('#client_information input').prop('readonly', false);
                $("select[name='prefecture_name']").css('pointer-events', '');
            } else {
                $('#client_information input').prop('readonly', true);
                $('.client_name_input').hide();

                // データの挿入
                var selectDataId = $('#js-client-selector').val();
                console.log(selectDataId);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/warehouse/order/clientSelect",
                    type: 'POST',
                    data: {'client_id': selectDataId}
                })
                    // Ajaxリクエストが成功した場合
                    .done(function (data) {
                        $('#zipcode').val(data[0]['zip_code']);
                        $("select[name='prefecture_name']").val(data[0]['prefecture_name']);
                        $("select[name='prefecture_name']").css('pointer-events', 'none');
                        $('#address1').val(data[0]['address1']);
                        $('#address2').val(data[0]['address2']);
                        $('#address3').val(data[0]['address3']);
                        $('#telephone').val(data[0]['tel']);
                        $('#email').val(data[0]['email']);
                        $('#delivery_partnar').val(data[0]['delivery_partnar_id']);
                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function (data) {
                        alert(data.responseJSON);
                    });
            }
        }

        $('#js-client-selector').on('change', function () {
            changeClient(this);
        })

        $('#js-client-selector').ready(function () {
            if ($('#js-client-selector').val() == 'new_client') {
                $('.client_name_input').show();
                $('#client_information input').removeAttr('readonly');
            } else {
                changeClient(this);
            }
        })

        // カレンダー日付選択
        $('.fc-today-button').text('今日');
        $(document).on('click', '.fc-day-top', function () {
            var selectDate = $(this).data('date');
            $('.fc-day-top').css('background', 'unset');
            $('#shipping_date').val(selectDate);
            $(this).css('background', '#09ffed');
        })

    })
</script>

<script>
    // Enter無効化
    $(function () {
        $("input").keydown(function (e) {
            if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
                return false;
            } else {
                return true;
            }
        });
    });
</script>

<script>
    $('#js-select-date').on('change', function () {
        $('#order_select_date').submit();
    })
</script>

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
                $(updown_form).appendTo($('#order_select_date'));
                if ($(this).hasClass('change')) {
                    $('#select_updown').val('up');
                } else {
                    $('#select_updown').val('down');
                }
                $('#order_select_date').submit();
            })
        })
    })
</script>
