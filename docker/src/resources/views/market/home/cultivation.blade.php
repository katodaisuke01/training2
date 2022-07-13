@extends('layouts.layout_market')

@section('content')
    <div class="l-container l-home l-cultivation">
        <div class="l">
            <div class="l-auto">
                <section class="p-home">
                    <div class="p-home__head f-a_center">
                        <h2 class="title">ダッシュボード</h2>
                        <div class="c-buttonArea">
                            <a href="{{ route('industry.market.taskCalender') }}" class="c-button__line c-button__min">作業カレンダーを確認</a>
                        </div>
                        <div class="total">
                            <form action="{{ route('industry.cultivation') }}" method="GET" id="js-sort-date">
                                <div class="c-input__center">
                                    <p class="c-text__unit">期間設定</p>
                                    <div class="c-input c-input--date c-input__150">
                                        <input type="text" name="start_date" class="datepicker" placeholder="2021/01/01"
                                               style="height:40px" id="js-push-start"
                                               value="{{ $query['start_date'] ?? $day->format('Y/m/d') }}"
                                               autocomplete="off">
                                    </div>
                                    <span class="c-wave">〜</span>
                                    <div class="c-input c-input--date c-input__150">
                                        <input type="text" name="end_date" class="datepicker" placeholder="2021/01/01"
                                               style="height:40px" id="js-push-end"
                                               value="{{ $query['end_date'] ?? $day->format('Y/m/d') }}"
                                               autocomplete="off">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-home__body c-box shadow">

                        <div class="p-tab">
                            <input id="dashboard_tab_1" type="radio" name="dashboard_tab" checked="checked"/>
                            <label class="p-tab__label" for="dashboard_tab_1">業務フロー進捗状況</label>
                            <div class="p-tab__content">
                                <div class="c-box__head">
                                    <h3 class="c-text__lv4 c-text__weight--700">業務フロー進捗状況</h3>
                                    <div class="total">
                                        <p class="c-text__lv3 c-text__weight--700 c-text__main"
                                           data-before="計">{{ round($total_orders, 1) }}<small
                                                class="c-text__lv6 c-text__main">個</small></p>
                                    </div>
                                </div>
                                <div class="c-box__body">
                                    <div class="p-workFlow">
                                        <ul class="p-workFlow__list">
                                            <li class="stage1">
                                                <article class="c-box c-border">
                                                    <div class="c-icon shadow"></div>
                                                    <div class="text">
                                                        <p class="c-text__lv4 item">未着手</p>
                                                        <p class="number">{{ $notStarted }}
                                                            <span>/</span><small>{{ $total_orders }}</small></p>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="stage2">
                                                <article class="c-box c-border">
                                                    <div class="c-icon shadow"></div>
                                                    <div class="text">
                                                        <p class="c-text__lv4 item">梱包完了</p>
                                                        <p class="number">{{ $done }}
                                                            <span>/</span><small>{{ $total_orders }}</small></p>
                                                    </div>
                                                </article>
                                            </li>
                                            <li class="stage3">
                                                <article class="c-box c-border">
                                                    <div class="c-icon shadow"></div>
                                                    <div class="text">
                                                        <p class="c-text__lv4 item">処理済</p>
                                                        <p class="number">{{ $alreadyPacking }}
                                                            <span>/</span><small>{{ $total_orders }}</small></p>
                                                    </div>
                                                </article>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <input id="dashboard_tab_2" type="radio" name="dashboard_tab"/>
                            <label class="p-tab__label" for="dashboard_tab_2">タスクリスト</label>
                            <div class="p-tab__content">
                                <div class="c-box__head">
                                    <h3 class="c-text__lv4 c-text__weight--700">タスクリスト</h3>
                                    <div class="total">
                                        <p class="c-text__lv3 c-text__weight--700 c-text__main"
                                           data-before="計">{{ round($total_orders, 1) }}<small
                                                class="c-text__lv6 c-text__main">個</small></p>
                                    </div>
                                </div>
                                <div class="p-scroll p-scroll__yaxis200">
                                    <div class="p-scroll__inner">
                                        <table class="p-table">
                                            <thead>
                                            <th class="w_80">
                                                <p class="label">希望配送日</p>
                                            </th>
                                            <th>
                                                <p class="label">商品名</p>
                                            </th>
                                            <th class="w_150">
                                                <p class="label">処理済数 / 注文個数</p>
                                            </th>
                                            <th class="w_150">
                                                <p class="label">水揚数 / 日程</p>
                                            </th>
                                            <th class="w_150">
                                                <p class="label">浄化数 / 日程</p>
                                            </th>
                                            </thead>
                                            <tbody>
                                            @foreach($dateArray as $value)
                                                @php
                                                    $task_order = (clone $task_orders)->where('shipping_date', $value)->groupBy('order_product_id');
                                                @endphp
                                                @foreach($task_order as $val)
                                                    @php
                                                        $task_total_quantity = 0;
                                                        $task_done_quantity = 0;
                                                    @endphp
                                                    @foreach($val as $task)
                                                        @php
                                                            if($task->shipping_status == 2 || $task->shipping_status == 1) {
                                                               $task_done_quantity += 1;
                                                            }
                                                            if($loop->last){
                                                               $task_total_quantity = $loop->iteration;
                                                            }
                                                        @endphp
                                                    @endforeach
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <p class="c-text__unit">{{ $val[0]->shipping_date->format('Y/m/d') }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="c-text__lv6">{{ $val[0]->order_product->title }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="c-text__unit"><strong
                                                                    class="c-text__lv4 c-text__weight--900 c-text__main">{{ $task_done_quantity }}</strong>
                                                                / <span>
                                                            <p class="c-text__unit"><strong
                                                                    class="c-text__lv4 c-text__weight--900 c-text__main">{{ $task_total_quantity }}</strong>個
                                                            </p>
                                                            </span></p>
                                                        </td>
                                                        <td>
                                                            <p class="c-text__unit"><strong
                                                                    class="c-text__lv4 c-text__weight--900 c-text__main">{{ $task_total_quantity }}</strong>個
                                                                <span
                                                                    class="c-text__lv6">{{ $val[0]->getLandingDateAttribute() }}</span>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="c-text__unit"><strong
                                                                    class="c-text__lv4 c-text__weight--900 c-text__main">{{ $task_total_quantity }}</strong>個
                                                                <span
                                                                    class="c-text__lv6">{{ $val[0]->getPurificationDateAttribute() }}</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>

        <div class="l">
            <div class="l-auto">
                <section class="p-order">
                    <div class="p-order__head">
                        <div class="c-titleUnderline">
                            <h4 class="c-text c-text__lv4 c-text__weight--900">業者別注文情報</h4>
                            <div class="total">

                                <div class="c-buttonArea">
                                    <ul class="c-list__tab">
                                        <li class="tab active">
                                            <div class="c-icon c-icon__list"></div>
                                        </li>
                                        <li class="tab ">
                                            <div class="c-icon c-icon__tile"></div>
                                        </li>
                                    </ul>
                                </div>
                                <p class="number c-text__lv2 c-text__main"
                                   data-unit="件">{{ $order_business_groups->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-order__body">
                        <ul class="c-list__content">
                            <li class="c-content show">
                                <ul class="p-list__wrap c-listLabels">
                                    <li class="fix-100">
                                        <article>
                                            @if(app('request')->input('sort_created_at') == 'up')
                                                <p class="label updown value_sort change" data-sort="order_date">注文日</p>
                                            @else
                                                <p class="label updown value_sort" data-sort="order_date">注文日</p>
                                            @endif
                                        </article>
                                    </li>
                                    <li class="auto">
                                        <article>
                                            <p class="label ">注文事業者</p>
                                        </article>
                                    </li>
                                    <li class="fix-110">
                                        <article>
                                            @if(app('request')->input('sort_shipping_date') == 'up')
                                                <p class="label updown value_sort change" data-sort="shipping_date">
                                                    発送日</p>
                                            @else
                                                <p class="label updown value_sort" data-sort="shipping_date">発送日</p>
                                            @endif
                                        </article>
                                    </li>
                                    <li class="fix-100">
                                        <article>
                                            <p class="label ">注文個数</p>
                                        </article>
                                    </li>
                                    <li class="fix-90">
                                        <article>
                                            <p class="label stage1">未着手</p>
                                        </article>
                                    </li>
                                    <li class="fix-90">
                                        <article>
                                            <p class="label stage2">梱包完了</p>
                                        </article>
                                    </li>
                                    <li class="fix-90">
                                        <article>
                                            <p class="label stage3">処理済</p>
                                        </article>
                                    </li>
                                    <li class="fix-60">
                                    </li>
                                </ul>
                                <div class="p-scroll">
                                    <div class="p-scroll__inner">
                                        <ul class="p-listTable">
                                            @foreach($order_business_groups as $value)
                                                <li data-href="{{ route('industry.market.detail', ['business_group' => $value]) }}">
                                                    <article>
                                                        <ul class="p-listTable__body p-list__wrap">
                                                            <li class="fix-100">
                                                                <article>
                                                                    <p class="c-text__lv5 data">{{ $value->getCreateDateAttribute() }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="auto">
                                                                <article>
                                                                    <p class="c-text__lv4 c-text__weight--700 data">{{ $value->getBusinessName() ?? '' }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="fix-110">
                                                                <article>
                                                                    <p class="c-text__lv4 c-text__weight--700 data">{{ $value->shipping_date->format('Y/m/d') }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="fix-100">
                                                                <article>
                                                                    <p class="c-text__lv3 c-text__weight--900 c-text__main"
                                                                       data-unit="個">{{ $value->orders->count() }}</p>
                                                                    @if($value->additional_total_count != 0)
                                                                        <p class="c-text__note c-number__insurance">
                                                                            追加処理+<strong
                                                                                class="c-text__accent">{{ $value->additional_total_count }}</strong>
                                                                        </p>
                                                                    @endif
                                                                </article>
                                                            </li>
                                                            <li class="fix-90">
                                                                <article>
                                                                    <p class="c-text__lv3 c-text__weight--700 c-text__main "
                                                                       data-unit="個">{{ data_get($value, 'not_start_order_count') }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="fix-90">
                                                                <article>
                                                                    <p class="c-text__lv3 c-text__weight--700 c-text__main "
                                                                       data-unit="個">{{ data_get($value, 'already_packing_order_count') }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="fix-90">
                                                                <article>
                                                                    <p class="c-text__lv3 c-text__weight--700 c-text__main "
                                                                       data-unit="個">{{ data_get($value, 'process_done_order_count') }}</p>
                                                                </article>
                                                            </li>
                                                            <li class="fix-60">
                                                                <span class="icon_next"></span>
                                                            </li>
                                                        </ul>
                                                    </article>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="c-content">
                                <div class="p-scroll">
                                    <div class="p-scroll__inner">
                                        <ul class="p-list__split3 p-listTile">
                                            @foreach($order_business_groups as $value)
                                                <li class=""
                                                    data-href="{{ route('industry.market.detail', ['business_group' => $value->id]) }}">
                                                    <article class="c-box shadow">
                                                        <ul class="p-list">
                                                            <li>
                                                            </li>
                                                            <li class="border_1">
                                                                <p class="c-text__lv4 c-text__weight--700">{{ $value->getBusinessName() }}</p>
                                                                <span class="c-icon__right c-icon c-icon__next"></span>
                                                            </li>
                                                            <!-- <li class="border_2">
                                                               <p class="c-text__lv4">宛</p>
                                                               <p class="c-text__lv6" style="margin-left:auto"><span class="c-text__unit">配送</span></p>
                                                            </li> -->
                                                            <li class="border_1">
                                                                <p class="c-text__lv5 c-text__weight--700 c-text__red">
                                                                    <span
                                                                        class="c-text__unit">未着手</span>{{ data_get($value, 'not_start_order_count') }}
                                                                    <span class="c-text__unit">個</span></p>–
                                                                <!-- <p class="c-text__lv5 c-text__weight--700 c-text__blue"><span class="c-text__unit">処理中</span>0<span class="c-text__unit">個</span></p>– -->
                                                                <p class="c-text__lv5 c-text__weight--700 c-text__green">
                                                                    <span
                                                                        class="c-text__unit">梱包完了</span>{{ data_get($value, 'already_packing_order_count') }}
                                                                    <span class="c-text__unit">個</span></p>–
                                                                <p class="c-text__lv5 c-text__weight--700 c-text__gray">
                                                                    <span
                                                                        class="c-text__unit">処理済</span>{{ data_get($value, 'process_done_order_count') }}
                                                                    <span class="c-text__unit">個</span></p>
                                                            </li>
                                                            <li class="">
                                                                <div class="c-border__bottom--bold">
                                                                    <ul>
                                                                        @foreach($value->orders->groupBy('simultaneous_order_code')->values() as $key => $new_value)
                                                                            @break($key == 3)
                                                                            <li>
                                                                                <p class="c-text__lv5">{{ $new_value[0]->order_product->title }}
                                                                                    <strong>{{ $new_value[0]->quantity }}</strong>
                                                                                    @if($key == 2)
                                                                                        <span
                                                                                            class="c-text__unit">個 ほか</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="c-text__unit">個</span>
                                                                                    @endif
                                                                                </p>
                                                                            </li>

                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="c-right">
                                                                    <div class="f-a_end">
                                                                        @if($value->additional_total_count != 0)
                                                                            <p class="c-text__note c-number__insurance">
                                                                                追加処理+<strong
                                                                                    class="c-text__accent">{{ $value->additional_total_count }}</strong>
                                                                            </p>
                                                                        @endif
                                                                        <p class="c-text__lv2 c-text__main c-text--right c-text__weight--900 number f"
                                                                           data-before="注文個数">{{ $value->total_quantity }}
                                                                            <span class="c-text__unit">個</span></p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </article>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                    </div>
                    <!-- <div class="p-order__foot">
                       <div class="p-pagination">
                          <ul class="c-listPagination">
                             <li><span class="c-icon icon_back"></span></li>
                             <li><span class="number">1</span></li>
                             <li><a class="number">2</a></li>
                             <li><a class="number">3</a></li>
                             <li><a class="c-icon icon_next"></a></li>
                          </ul>
                       </div>
                    </div> -->
                </section>
            </div>
        </div>
    </div>
@endsection
