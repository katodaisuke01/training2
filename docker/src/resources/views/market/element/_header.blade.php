<?php date_default_timezone_set('Asia/Tokyo'); ?>
<header class="l-header l">
    <div class="l-auto">
        <a href="{{route('industry.home')}}" class="logo"></a>

        <h1>産地スタッフ<br/>ワークシステム</h1>
        <div class="c-date">
            <?php
            $array = ['日', '月', '火', '水', '木', '金', '土']
            ?>
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
    @if(\Auth::check())
        <div class="l-fix__350 f-j_end">
            <p class="name">こんにちは<strong class="c-text__lv4 ">{{ \Auth::user()->getUserName() }}</strong>さん</p>
            <div class="c-buttonArea">
                <form method="post" action="{{ $logoutUrl }}">
                    @csrf
                    <button type="submit" class="c-button__text">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>
    @endif
</header>
