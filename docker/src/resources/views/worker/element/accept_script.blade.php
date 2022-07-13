<script>
    var timeout = null
    $(function () {
        // Qrコード読み込みにフォーカスを当て続ける
        $(document).ready(function () {
            $('#js-target-on').trigger('focus');
        });

        $(document).on('blur', '#js-target-on', function () {
            $('#js-target-on').trigger('focus');
        })

        // 読み込み済の箱の有無によって
        if ($('.js-order_accept').eq(0).data('package')) {
            var package_id = $('.js-order_accept').eq(0).data('package')
            $('.js-order_accept').eq(0).children('input[name="accept"]').prop('checked', true);
            getOrderList(package_id);
        }

        // 読み込み済の箱の有無によって
        if ($('.js-order_handle').eq(0).data('package')) {
            var package_id = $('.js-order_handle').eq(0).data('package')
            $('.js-order_handle').eq(0).children('input[name="handle"]').prop('checked', true);
            getHandleList(package_id);
        }

        // クリックアクション
        // $('.js-order_accept').each(function() {
        //     $(document).on('click', '.js-order_accept', function() {
        //         var num = $(this).index();
        //         console.log(num); //何番目の要素を操作しているか
        //         // 要素をクリア
        //         $('#js-insert-orderList').children('tr').remove();
        //         $('.order_total_count').text('');
        //         var code = $('.js-order_accept').eq(num).data('code');
        //         console.log(code);
        //         // $(this).children('input[name="accept"]').prop('checked', true);
        //         getOrderList(code)
        //     })
        // })

        // ページ読み込み時に発火
        function getOrderList(package_id) {
            $.ajax({
                type: 'get',
                url: "/worker/accept/getOrderList",
                dataType: 'html',
                data: {
                    'package_id': package_id,
                }
            }).done(function (data) {
                // 要素を挿入
                $('#js-insert-orderList').append(data);
                var text = '<span class="c-text__unit">商品数</span>' + $('#accept_order_list').data('total') + '<span class="c-text__lv5 c-text__deep c-text__weight--700">点</span>';
                $('.order_total_count').append(text);
            })
        }

        function getHandleList(package_id) {
            $.ajax({
                type: 'get',
                url: "/worker/accept/getHandleList",
                dataType: 'html',
                data: {
                    'package_id': package_id,
                }
            }).done(function (data) {
                // 要素を挿入
                $('#js-insert-handleList').append(data);
                console.log($('#accept_handle_list').data('total'));
                var text = '<span class="c-text__unit">商品数</span>' + $('#accept_handle_list').data('total') + '<span class="c-text__lv5 c-text__deep c-text__weight--700">点</span>';
                $('.order_handle_count').append(text);
            })
        }
    })
</script>
@include('worker/element/_handle_script')
@include('worker/element/_sort_script')
