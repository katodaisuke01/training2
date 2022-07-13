<?php date_default_timezone_set('Asia/Tokyo'); ?>
<header class="l-header l">
    <div class="l-auto">
        <a href="{{ route('warehouse.home') }}" class="logo"></a>
        <h1>倉庫業務システム 管理画面</h1>
        <div class="c-date">
            <p id="real_time"></p>
        </div>
        <script>
            function showtime() {
                var today = new Date();
                $weekday = ['日', '月', '火', '水', '木', '金', '土'];
                month = today.getMonth() + 1;
                $('#real_time').html(today.getFullYear() + "年" + month + "月" + today.getDate() + "日（" + $weekday[today.getDay()] + "） " + today.getHours() + ":" + ('0' + today.getMinutes()).slice(-2));
            }

            setInterval(showtime, 1000);
        </script>
    </div>
    <div class="l-fix f-j_end">
        <p class="name">こんにちは<strong class="c-text__lv5">{{ \Auth::user()->getUserName() }}</strong>さん</p>
        <a href="{{route('warehouse.labor.edit', ['labor' => \Auth::user()->id])}}" class="c-image__circle thumb"></a>
    </div>
</header>
