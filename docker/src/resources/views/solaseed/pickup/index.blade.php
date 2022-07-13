@extends('layouts.layout_solaseed')
@section('page_class', 'l-solaseed l-page')
@section('title', '集荷登録')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__pickup"></span>
                        集荷登録
                    </p>
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            <span class="c-text__lv5 c-text__main">本日の集荷</span>
                            {{ $packages->count() ?? 0 }}<span class="c-text__lv5 c-text__accent">ヶ所</span>
                            {{ $count ?? 0 }}<span class="c-text__lv5 c-text__accent">個口</span>
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <ul class="p-list__split2">
                        @foreach($packages as $key => $package)
                            <?php
                            $industry = \App\Models\IndustryGroup::find($package->industry_group_id);
                            ?>
                            <li data-href="{{ route('solaseed.pickup.list', [$industry]) }}">
                                <article class="c-box shadow">
                                    <div class="c-text">
                                        <ul class="p-list__wrap p-list__row">
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">集荷先</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4 c-text__main">{{ data_get($industry, 'name') }}</p>
                                                </div>
                                            </li>
                                            {{--<li>
                                               <div class="head">
                                                  <p class="c-text__label">集荷箱数</p>
                                               </div>
                                               <div class="data">
                                                  <p class="c-text__lv4 c-text__main">{{ data_get($industry, 'reserve_packages')->count() }}<span class="c-text__unit">箱</span></p>
                                               </div>
                                            </li>--}}
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">集荷数</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv4 c-text__main">{{ data_get($industry, 'reserve_packages')->count() }}
                                                        <span class="c-text__unit">個口</span></p>
                                                </div>
                                            </li>
                                            <!-- 箱内の商品の種別は現在の要件に含まれていないので一旦非表示 -->
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">集荷予定時間</p>
                                                </div>
                                                <div class="data f-wrap">
                                                    <p class="c-text__lv5 c-text__main">{{ date('Y/m/d 13:00') }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="c-image__wide"
                                         style="background-image:url({{ $industry->image }})"></div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </main>
    </div>
@endsection
