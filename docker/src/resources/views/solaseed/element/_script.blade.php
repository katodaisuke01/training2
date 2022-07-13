<script>
    $('#oneTimeClickBtn').on('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        var shipping_number = $('input[name="shipping_number"]').val();
        var schedule_time = $('input[name="schedule_time"]').val();

        if ($('select[name="register_type"]').val() == 'all') {
            $('.transport_table').each(function (index, element) {
                $(element).find('#js-insert_shipping_number').val(shipping_number)
                $(element).find('#js-insert_schedule_time').val(schedule_time)
            })
        } else if ($('select[name="register_type"]').val() == 'select') {
            $('.transport_table').each(function (index, element) {
                if ($(element).data('checked') == '1') {
                    $(element).find('#js-insert_shipping_number').val(shipping_number)
                    $(element).find('#js-insert_schedule_time').val(schedule_time)
                }
            })
        }
    })

    $(function () {
        $('.js_start_date').on('change', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $('#insert_start_date').val($(this).val());
            $('#transportForm').submit();
        })
        $('.js_end_date').on('change', function (e) {
            e.stopPropagation();
            e.preventDefault();
            $('#insert_end_date').val($(this).val());
            $('#transportForm').submit();
        })
    })
</script>

<script>
    $(function () {
        var default_cost = $('input[name="loading_weight"]').val() * 115;
        $('input[name="logistic_cost"]').val(default_cost);
        $('#js_insert_cost').text(default_cost + ' ' + '円');

        $('input[name="loading_weight"]').on('change', function () {
            var cost = $(this).val() * 115;
            $('input[name="logistic_cost"]').val(cost);
            $('#js_insert_cost').text(cost + ' ' + '円');
        })
    })
</script>
