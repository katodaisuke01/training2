@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-home')
@section('title', 'ダッシュボード')

@section('content')
    <div class="l-base">
        @include('worker.element._asideUser')
        <main class="l-main">

            <div class="p-dashboard">
                <div class="p-dashboard__head">
                    <div class="c-box shadow">
                        <div class="c-box__head">
                            <div class="c-graph">
                                @include('warehouse.element._pieChart1')
                            </div>
                        </div>
                        <div class="c-box__body">
                            <div class="title c-titleUnderline">
                                <p class="c-text__lv3 c-text__weight--900 c-text__deep">本日の業務完了進捗率</p>
                                <p class="c-text__lv1 c-text__weight--700 c-text__user">{{ $m_business->progress_rate }}<span class="c-text__lv2 c-text__weight--700 c-text__user">%</span></p>
                            </div>
                            <div class="c-status">
                                <ul class="p-list__wrap">
                                    <li class="red">
                                        <div class="head">
                                            <p class="c-text__lv5">荷受け済み</p>
                                        </div>
                                        <div class="data">
                                            <p class="c-text__lv2 c-text__weight--700">{{ $m_business->count_not_confirmed }}
                                                <span class="c-text__unit">件</span></p>
                                        </div>
                                    </li>
                                    <li class="orange">
                                        <div class="head">
                                            <p class="c-text__lv5">荷捌き済み</p>
                                        </div>
                                        <div class="data">
                                            <p class="c-text__lv2 c-text__weight--700">{{ $m_business->count_confirmed }}
                                                <span class="c-text__unit">件</span></p>
                                        </div>
                                    </li>
                                    <li class="yellow">
                                        <div class="head">
                                            <p class="c-text__lv5">エリア・店舗別仕分け済み</p>
                                        </div>
                                        <div class="data">
                                            <p class="c-text__lv2 c-text__weight--700">{{ $m_business->count_sorted }}
                                                <span class="c-text__unit">件</span></p>
                                        </div>
                                    </li>
                                    <li class="green">
                                        <div class="head">
                                            <p class="c-text__lv5">摘み取り済み</p>
                                        </div>
                                        <div class="data">
                                            <p class="c-text__lv2 c-text__weight--700">{{ $m_business->count_picked }}
                                                <span class="c-text__unit">件</span></p>
                                        </div>
                                    </li>
                                    <li class="blue">
                                        <div class="head">
                                            <p class="c-text__lv5">出荷チェック済み</p>
                                        </div>
                                        <div class="data">
                                            <p class="c-text__lv2 c-text__weight--700">{{ $m_business->count_shipped }}
                                                <span class="c-text__unit">件</span></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-dashboard__body">
                    <div class="p-work__division">
                        <ul class="p-list__split4">
                            <li class="handling">
                                <article class="c-box shadow">
                                    <div class="c-text">
                                        <p class="c-text__lv7 c-text__weight--700">Acceptance/Handling</p>
                                        <p class="c-text__lv4 c-text__weight--900 c-text__deep">荷受け・荷捌き業務</p>
                                    </div>
                                    <div class="c-box shadow">
                                        <div class="c-image__square"></div>
                                    </div>
                                    <div class="c-text">
                                        <p class="c-text__weight--700 c-text__user">作業画面へ</p>
                                    </div>
                                    <a href="{{ route('worker.accept.handle.index') }}"></a>
                                </article>
                            </li>
                            <li class="sorting">
                                <article class="c-box shadow">
                                    <div class="c-text">
                                        <p class="c-text__lv7 c-text__weight--700">Sorting</p>
                                        <p class="c-text__lv4 c-text__weight--900 c-text__deep">エリア・店舗別仕分業務</p>
                                    </div>
                                    <div class="c-box shadow">
                                        <div class="c-image__square"></div>
                                    </div>
                                    <div class="c-text">
                                        <p class="c-text__weight--700 c-text__user">作業画面へ</p>
                                    </div>
                                    <a href="{{ route('worker.accept.sort.index') }}"></a>
                                </article>
                            </li>
                            <li class="picking">
                                <article class="c-box shadow">
                                    <div class="c-text">
                                        <p class="c-text__lv7 c-text__weight--700">Picking</p>
                                        <p class="c-text__lv4 c-text__weight--900 c-text__deep">摘み取り業務</p>
                                    </div>
                                    <div class="c-box shadow">
                                        <div class="c-image__square"></div>
                                    </div>
                                    <div class="c-text">
                                        <p class="c-text__weight--700 c-text__user">作業画面へ</p>
                                    </div>
                                    <a href="{{ route('worker.picking.index') }}"></a>
                                </article>
                            </li>
                            <li class="shipping">
                                <article class="c-box shadow">
                                    <div class="c-text">
                                        <p class="c-text__lv7 c-text__weight--700">Shipping Check</p>
                                        <p class="c-text__lv4 c-text__weight--900 c-text__deep">出荷チェック業務</p>
                                    </div>
                                    <div class="c-box shadow">
                                        <div class="c-image__square"></div>
                                    </div>
                                    <div class="c-text">
                                        <p class="c-text__weight--700 c-text__user">作業画面へ</p>
                                    </div>
                                    <a href="{{ route('worker.shipping.index') }}"></a>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
