@extends('layouts.layout_solaseed')
<script>
    function hide_alert() {
        const text_alert = document.getElementById('text_alert');
        text_alert.style.display = 'none';
    }
</script>
@section('page_class', 'l-solaseed l-home')
@section('title', 'ダッシュボード')

@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                @if($not_pickuped_package_count > 0)
                    <a id="text_alert" class="c-alert" tabindex="-1">
                        <p onclick="hide_alert()" class="c-text__alert"><span>{{ date('Y/m/d') }} – </span>産地：鹿児島県魚連
                            佐多岬支所の箱ステータスが更新されました。</p>
                    </a>
                @endif
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__dashboard"></span>
                        ダッシュボード
                    </p>
                    <div class="c-right">
                        <p class="c-text__lv5">
                            <span class="c-text__unit">こんにちは</span>
                            {{ data_get($user, 'name') }}
                            <span class="c-text__unit">さん</span>
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <ul class="p-list">
                        @can('isAdmin')
                            <li class="order" data-href="{{ route('solaseed.order.index') }}">
                                <div class="c-box shadow">
                                    <div class="c-box__body">
                                        <div class="c-box shadow">
                                            <div class="c-image__wide"></div>
                                        </div>
                                        <div class="c-text">
                                            <p class="title c-text__lv1 c-text__weight--900 c-text__main">注文状況</p>
                                            <div class="c-right">
                                                <p class="c-text__lv1 c-text__weight--900 c-text__accent">
                                                    <span class="c-text__unit">本日の発注件数</span>{{ $order_count }}<span
                                                        class="c-text__lv4 c-text__accent">件</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endcan
                        <li class="pickup" data-href="{{ route('solaseed.pickup.index') }}">
                            <div class="c-box shadow">
                                <div class="c-box__body">
                                    <div class="c-box shadow">
                                        <div class="c-image__wide"></div>
                                    </div>
                                    <div class="c-text">
                                        <p class="title c-text__lv1 c-text__weight--900 c-text__main">集荷登録</p>
                                        <div class="c-right">
                                            <p class="c-text__lv1 c-text__weight--900 c-text__accent">
                                                <span class="c-text__unit">本日の集荷見込 商品件数</span>{{ $package_count }}<span
                                                    class="c-text__lv4 c-text__accent">箱</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @can('isAdmin')
                            <li class="item" data-href="{{ route('solaseed.transport.index') }}">
                                <div class="c-box shadow">
                                    <div class="c-box__body">
                                        <div class="c-box shadow">
                                            <div class="c-image__wide"></div>
                                        </div>
                                        <div class="c-text">
                                            <p class="title c-text__lv1 c-text__weight--900 c-text__main">輸送情報管理</p>
                                            <div class="c-right">
                                                <p class="c-text__lv1 c-text__weight--900 c-text__accent">
                                                    <span class="c-text__unit">本日の集荷箱数</span>{{ $package_count }}<span
                                                        class="c-text__lv4 c-text__accent">箱</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endcan
                        <li class="checkin" data-href="{{ route('solaseed.checkin.index') }}">
                            <div class="c-box shadow">
                                <div class="c-box__body">
                                    <div class="c-box shadow">
                                        <div class="c-image__wide"></div>
                                    </div>
                                    <div class="c-text">
                                        <p class="title c-text__lv1 c-text__weight--900 c-text__main">チェックイン</p>
                                        <div class="c-right">
                                            <p class="c-text__lv1 c-text__weight--900 c-text__accent">
                                                <span class="c-text__unit">本日の配送済箱数</span>{{ $checkin_count }}<span
                                                    class="c-text__lv4 c-text__accent">箱</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </main>
    </div>
@endsection
