<div class="p-nav">
    <nav class="navi" id="navi">
        <ul class="p-list__nav">
            <li class="dashboard">
                <a href="{{ route('solaseed.home') }}" class="c-text__lv6">
                    <span class="tag"></span>
                    ダッシュボード
                </a>
            </li>
            <li class="pickup">
                <a href="{{ route('solaseed.pickup.index') }}" class="c-text__lv6">
                    <span class="tag"></span>
                    集荷登録
                </a>
            </li>
            <li class="checkin">
                <a href="{{ route('solaseed.checkin.index') }}" class="c-text__lv6">
                    <span class="tag"></span>
                    チェックイン
                </a>
            </li>
            @can('isAdmin')
                <li class="list_order">
                    <a href="{{ route('solaseed.order.index') }}" class="c-text__lv6">
                        <span class="tag"></span>
                        注文状況
                    </a>
                </li>
                <li class="transport">
                    <a href="{{ route('solaseed.transport.index') }}" class="c-text__lv6">
                        <span class="tag"></span>
                        輸送情報登録
                    </a>
                </li>
                <li class="document">
                    <a href="{{ route('solaseed.document.index') }}" class="c-text__lv6">
                        <span class="tag"></span>
                        請求書管理
                    </a>
                </li>
                <li class="partner">
                    <a href="{{ route('solaseed.partner.index') }}" class="c-text__lv6">
                        <span class="tag"></span>
                        荷主管理
                    </a>
                </li>
                <li class="account">
                    <a href="{{ route('solaseed.account.index') }}" class="c-text__lv6">
                        <span class="tag"></span>
                        スタッフ管理
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
    <div class="nav_toggle" id="nav_toggle">
        <span></span>
        <span></span>
    </div>
</div>
