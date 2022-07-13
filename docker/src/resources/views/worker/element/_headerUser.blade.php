<header class="l-header">
    <div class="p-logo">
        <a href="{{ route('worker.home') }}" class="c-logo"></a>
    </div>
    <div class="c-image__square"></div>
    <div class="c-text">
        <p class="c-text__lv6" id="real_time"></p>
        <script>
            function showtime() {
                var today = new Date();
                $weekday = ['日', '月', '火', '水', '木', '金', '土'];
                month = today.getMonth() + 1;
                $('#real_time').html(today.getFullYear() + "年" + month + "月" + today.getDate() + "日（" + $weekday[today.getDay()] + "） " + today.getHours() + ":" + ('0' + today.getMinutes()).slice(-2));
            }

            setInterval(showtime, 1000);
        </script>
        <p class="c-text__lv2 c-text__weight--700">@yield('title')</p>
    </div>
</header>
