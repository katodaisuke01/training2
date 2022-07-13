<aside class="l-sidebar">
    <div class="l-sidebar__head">
        <div class="c-logo"></div>
        <div class="c-date">
            <p class="c-text__lv5" id="real_time"></p>
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
    <div class="l-sidebar__body">
        <div class="info">
            <ul class="p-list">
                <li>
                    <div class="head f-a_center">
                        <p class="c-text__lv6">ユーザー名</p>
                        <div class="c-buttonArea__end">
                            <a href="{{ route('worker.account.mypage') }}" class="c-button__ghost">確認する</a>
                        <!-- <a href="{{ route('worker.account.mypage') }}" class="c-button__ghost">確認する</a> -->
                        </div>
                    </div>
                    <div class="data">
                        <p class="c-text__lv4 c-text__weight--700">{{ data_get($user, 'user_name') }}</p>
                    </div>
                </li>
                <li>
                    <div class="head">
                        <p class="c-text__lv6">本日の入荷商品数</p>
                    </div>
                    <div class="data">
                        <p class="c-text__lv2 c-text__weight--700">{{ $m_business->packages->sum('orders_count') }}<span
                                class="c-text__lv6">件</span></p>
                    </div>
                </li>
                {{--
                <li>
                        <div class="head">
                            <p class="c-text__lv6">本日入荷の生鮮商品</p>
                        </div>
                        <div class="data">
                            <p class="c-text__lv2 c-text__weight--700">722<span class="c-text__lv6">件</span></p>
                        </div>
                </li>
                <li>
                        <div class="head">
                            <p class="c-text__lv6">本日入荷の冷凍商品</p>
                        </div>
                        <div class="data">
                            <p class="c-text__lv2 c-text__weight--700">512<span class="c-text__lv6">件</span></p>
                        </div>
                </li>
            --}}
            </ul>
        </div>
    </div>
    <div class="l-sidebar__foot">
        <div class="c-buttonArea__center">
            <form method="post" action="{{ route('worker.logout') }}">
                @csrf
                <button href="" class="c-button__ghost">ログアウト</button>
            </form>
        </div>
    </div>
</aside>
