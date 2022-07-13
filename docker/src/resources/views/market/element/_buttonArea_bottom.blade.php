<div class="p-fixBottom">
    <div class="c-buttonArea__center">
        <a href="{{ route('industry.home') }}" class="c-button__min c-button__round c-button__line" id="pending_task">作業を一時終了</a>
        <a href="{{ route('industry.home') }}" class="c-button__min c-button__round c-button__line" id="complete_task">作業完了</a>
        <!-- POC緊急時対策用 -->
        <a class="c-button__min c-button__round c-button__line" id="emergency_button">QR確認</a>
        <script>
            $('#emergency_button').on('click', function (e) {
                console.log('ok');
                e.preventDefault();
                $('#js-target-on').css({'opacity': '1', 'height': '30px', 'margin': '8px 0 0 0', 'padding': '4px 8px'});
            })
        </script>
        <!-- ここまで -->
    </div>
    <a href="" class="c-button__wide c-button__round" id="next_task">保存して次の作業へ</a>
</div>

<style>
    #emergency_button {
        opacity: 0.3;
    }

    #emergency_button:hover {
        opacity: 1;
    }
</style>
