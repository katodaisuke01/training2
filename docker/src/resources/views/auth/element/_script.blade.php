<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(function () {
        var clickEventType = ((window.ontouchstart !== null) ? 'click' : 'touchend');
        if (clickEventType = 'click') {
            $('#js-manager').on('click', function () {
                $(this).parents('form').attr('action', $(this).data('action'));
            })

            $('#js-stuff').on('click', function () {
                $(this).parents('form').attr('action', $(this).data('action'));
            })
        } else {
            $('#js-manager').on('touchend', function () {
                $(this).parents('form').attr('action', $(this).data('action'));
            })

            $('#js-stuff').on('touchend', function () {
                $(this).parents('form').attr('action', $(this).data('action'));
            })
        }

        // 二重送信防止対策
        $('#login_form').submit(function () {
            $(this).find('input[type="submit"], button[type="submit"]').prop('disabled', 'true');
        })

    });
</script>
