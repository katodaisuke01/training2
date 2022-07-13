@extends('layouts.layout_solaseed')
@section('page_class', 'l-solaseed l-page')
@section('title', 'チェックイン登録')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__checkin"></span>
                        チェックイン登録
                    </p>
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            <span class="c-text__lv5 c-text__main">本日の配送</span>{{ $packages->count() ?? 0 }}<span
                                class="c-text__lv5 c-text__accent">ヶ所</span>
                            {{ $package_count ?? 0 }}<span class="c-text__lv5 c-text__accent">箱</span>
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <ul class="p-list__split2">
                        @foreach($packages as $key => $package)
                            <?php
                            $business = \App\Models\MBusiness::find($key);
                            ?>
                            <li data-href="{{ route('solaseed.checkin.list', [$business]) }}">
                                <article class="c-box shadow">
                                    <div class="c-text">
                                        <ul class="p-list__row">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">配送先</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4 c-text__main">{{ data_get($business, 'name') }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">配送箱数</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4 c-text__main">{{ $package->count() ?? 0 }}
                                                        <span class="c-text__unit">箱</span></p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">配送予定時間</p>
                                                </div>
                                                <div class="data f-wrap">
                                                    <p class="c-text__lv5 c-text__main">{{ date('Y/m/d H:i') }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="c-image__wide"
                                         style="background-image:url({{ data_get($business, 'image') }})"></div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </main>
    </div>
@endsection
