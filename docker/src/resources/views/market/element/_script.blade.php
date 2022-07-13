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
        $('.c_dealing_type').each(function (index) {
            console.log(index + ': ' + $(this).data('check'));
            if (index + ': ' + $(this).data('check') == index + ': ' + 'checkTrue') {
                $(this).addClass('c-icon__check');
            }
        })
    })
</script>
<script>
    $(function () {
        var clickEventType = ((window.ontouchstart !== null) ? 'click' : 'touchend');
        if (clickEventType = 'click') {
            $("input[type='radio']").on('click', function () {
                console.log($("input[type='radio']:checked"));
                $('#item-order-form').submit();
            })

            $('.item-order-button').on('click', function () {
                $('#item-order-form').submit();
            })

        } else {
            $("input[type='radio']").on('touchend', function () {
                console.log($("input[type='radio']:checked"));
                $('#item-order-form').submit();
            })

            $('.item-order-button').on('touchend', function () {
                $('#item-order-form').submit();
            })
        }
    })
</script>
<script>
    $(function () {
        $('#operation_yes').on('click', function () {
            $('.js_toggle_content').show();
        })
        $('#operation_no').on('click', function () {
            $('.js_toggle_content').hide();
        })
    })
</script>

<script>
    $(function () {
        var clickEventType = ((window.ontouchstart !== null) ? 'click' : 'touchend');

        if (clickEventType = 'click') {
            $('#js-item-push').on('click', function () {
                $('#js-register-item').show();
                var whatCategory = $('.switch').data('category');

                $('#which_category').val(whatCategory);

                // if($('#which_category').val(whatCategory) == 'business_category') {
                //     $('.business_category_item').show();
                // }
            })

            $('#js-category-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('click', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', $(this).data('id'));
                    $('.category_type').attr('value', 'big_category');
                })

                $('.js-category-delete').on('click', function () {
                    $('.delete_flg').attr('value', '1');

                    $('#js-change-master').submit();
                })
            })

            $('#js-fish-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('click', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', $(this).data('id'));
                    $('.category_type').attr('value', 'fish_category');
                })

                $('.js-category-delete').on('click', function () {
                    $('.delete_flg').attr('value', '1');

                    $('#js-change-master').submit();
                })

            })

            // $('#js-business-edit li').each(function(index) {
            //     $(this).addClass(index + ':category-edit');
            //     var categoryEdit = $(this).addClass(index + ':category-edit');
            //     categoryEdit.on('click', function() {
            //         $('#js-register-item').show();
            //         $('#js-target-box').val($(this).data('item'));
            //         $('.master_id').attr('value', index + 1);
            //         $('.category_type').attr('value', 'business_category');
            //     })

            //     $('.js-category-delete').on('click', function() {
            //         $('.delete_flg').attr('value', '1');

            //         $('#js-change-master').submit();
            //     })
            // })

            $('#js-process-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('click', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', $(this).data('id'));
                    $('.category_type').attr('value', 'process_category');
                })

                $('.js-category-delete').on('click', function () {
                    $('.delete_flg').attr('value', '1');

                    $('#js-change-master').submit();
                })
            })
        } else {
            $('#js-item-push').on('touchend', function () {
                $('#js-register-item').show();
                var whatCategory = $('.switch').data('category');

                $('#which_category').val(whatCategory);

                // if($('#which_category').val(whatCategory) == 'business_category') {
                //     $('.business_category_item').show();
                // }
            })
            $('#js-category-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('touchend', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', index + 1);
                    $('.category_type').attr('value', 'big_category');
                })
            })
            $('#js-fish-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('touchend', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', index + 1);
                    $('.category_type').attr('value', 'fish_category');
                })
            })
            $('#js-business-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('touchend', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', index + 1);
                    $('.category_type').attr('value', 'business_category');
                })
            })
            $('#js-process-edit li').each(function (index) {
                $(this).addClass(index + ':category-edit');
                var categoryEdit = $(this).addClass(index + ':category-edit');
                categoryEdit.on('touchend', function () {
                    $('#js-register-item').show();
                    $('#js-target-box').val($(this).data('item'));
                    $('.master_id').attr('value', index + 1);
                    $('.category_type').attr('value', 'process_category');
                })
            })
        }
    })
</script>

<script>
    $(function () {
        // デフォルト表示
        $('.c-iconBox').eq(0).addClass('switch')
        $('.p-listCard').eq(1).addClass('show')

        $('.js-iconBox').each(function () {
            $(document).on('click', '.js-iconBox', function () {
                var num = $(this).index() + 1;
                console.log(num); //何番目の要素を操作しているか

                // 選択された箱の中身を表示
                $('.p-listCard').removeClass('show').eq(num).addClass('show');
            });
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
    function partialPrint() {
        //印刷する要素代入
        $('.p-nav').attr('class', 'print-off');
        $('.button_for_print').attr('class', 'c-buttonArea__end button_for_print print-off');
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

        // スタイルを元に戻す
        $('#print').remove();
        $('.print-off').removeClass('print-off');
    }
</script>

<script>
    $(function () {
        if ($('input[name="dealing_type"]').val() == 0) {
            $('.max_quantity_form').hide();
        }
    })

    $($('input[name="dealing_type"]')).on('click', function () {
        if ($(this).val() == 1) {
            $('.max_quantity_form').show();
        } else {
            $('.max_quantity_form').hide();
            $('input[name="max_quantity"]').val('');
        }
    })
</script>

<script>
    function workLogView(code) {
        console.log(code);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'get',
            url: "workList",
            dataType: 'json',
            data: {
                'order_code': code,
            }
        })
            //通信が成功したとき
            .done((res) => {
                $('.work_log_list').empty();
                $(res).each(function (index, elem) {
                    html = `
                <tr>
                    <td>
                    <p class="c-text__lv6 work_manager"></p>
                    </td>
                    <td>
                    <p class="c-text__lv6 work_start_time"></p>
                    </td>
                    <td>
                    <p class="c-text__lv6 work_end_time"></p>
                    </td>
                </tr>
            `;
                    var startDate = new Date(elem.start_at);
                    var startYear = startDate.getFullYear();
                    var startMonth = startDate.getMonth() + 1;
                    var startDay = startDate.getDate();
                    var startHour = startDate.getHours();
                    var startMinute = startDate.getMinutes();
                    var endDate = new Date(elem.end_at);
                    var endYear = endDate.getFullYear();
                    var endMonth = endDate.getMonth() + 1;
                    var endDay = endDate.getDate();
                    var endHour = endDate.getHours();
                    var endMinute = endDate.getMinutes();
                    if (startMonth < 10) {
                        startMonth = "0" + startMonth;
                    }
                    if (startDay < 10) {
                        startDay = "0" + startDay;
                    }
                    if (startHour < 10) {
                        startHour = "0" + startHour;
                    }
                    if (startMinute < 10) {
                        startMinute = "0" + startMinute;
                    }
                    if (endMonth < 10) {
                        endMonth = "0" + endMonth;
                    }
                    if (endDay < 10) {
                        endDay = "0" + endDay;
                    }
                    if (endHour < 10) {
                        endHour = "0" + endHour;
                    }
                    if (endMinute < 10) {
                        endMinute = "0" + endMinute;
                    }
                    $(".work_log_list").append(html);
                    $('.work_manager').eq(index).text(elem.last_name + ' ' + elem.first_name);
                    $('.work_start_time').eq(index).text(startYear + '-' + startMonth + '-' + startDay + ' ' + startHour + ':' + startMinute);
                    $('.work_end_time').eq(index).text(endYear + '-' + endMonth + '-' + endDay + ' ' + endHour + ':' + endMinute);
                    $("#js-work-log-view").css('display', 'block');
                })
            })
    }
</script>

<script>
    $('#js-start-documentDate').on('change', function () {
        $('#document_select_date').submit();
    })
    $('#js-end-documentDate').on('change', function () {
        $('#document_select_date').submit();
    })
</script>

<style>
    .print-off {
        display: none;
    }
</style>
