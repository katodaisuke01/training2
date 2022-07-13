@extends('layouts.layout_marketManagement')
@section('content')
    @php
        use \App\Models\Order;
    @endphp
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head c-titleUnderline">
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    注文管理
                </h2>
                <div class="c-right">
                    <div class="total f-wrap">
                        <form action="{{ route('admin.order.index') }}" class="js_submit_order_search"
                              id="js-sort-date" method="GET">
                            <div class="c-input">
                                <div class="c-input c-input--date c-input__150">
                                    <input type="text" name="select_date" class="datepicker" placeholder="2021/01/01"
                                           value="{{ app('request')->input('select_date')?? $today }}">
                                </div>
                                <script>
                                    $(function () {
                                        $('input[name="select_date"]').on('change', function () {
                                            $('.js_submit_order_search').submit();
                                        })
                                    })
                                </script>
                            <!-- <div class="c-input f-a_center">
                        <div class="c-input c-input--date c-input__150">
                           <input type="text" name="select_date_start" class="datepicker" autocomplete="off" placeholder="2021/01/01" id="js-start-documentDate" value="{{ app('request')->input('select_date_start')?? $today }}">
                        </div>
                        <span class="c-wave">〜</span>
                        <div class="c-input c-input--date c-input__150">
                           <input type="text" name="select_date_end" class="datepicker" autocomplete="off" placeholder="2021/01/01" id="js-end-documentDate" value="{{ app('request')->input('select_date_end')?? $today }}">
                        </div>
                     </div> -->
                            </div>
                        </form>
                        <p class="number c-text__lv2 c-text__main"
                           data-unit="件">{{ $order_business_groups->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="p-index__body">
                <ul class="p-list__content">
                    <li class="c-content show c-box">
                        <form action="{{ route('admin.order.scheduleTimeAllUpdate') }}" class="p-sort"
                              id="update_all_schedule_time" method="POST">
                            @csrf
                            <div class="c-input">
                                <div class="c-input f-a_center">
                                    <p class="c-text__unit">出荷時刻の<br/>一括設定</p>
                                    <div class="c-input c-input__130 c-time">
                                        <input type="text" name="schedule_time" placeholder="16 : 00"
                                               class="timepicker">
                                        <p class="c-text__unit">指定の時間に出荷メールが発信されます</p>
                                    </div>
                                </div>
                                <div class="c-input c-input__100">
                                    <div class="c-buttonArea">
                                        <button type="submit" class="c-button__sub c-button__min">出荷時刻を一括更新</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="select_date"
                                   value="{{ app('request')->input('select_date')?? $today }}">
                        </form>

                        <div class="p-scroll p-scroll__yaxis450">
                            <div class="p-scroll__inner">
                                <table class="p-table" style="z-index: 0;">
                                    <thead>
                                    <th>
                                        @if(app('request')->input('sort_created_at') == 'up')
                                            <label class="updown value_sort change" data-sort="order_date">注文日</label>
                                        @else
                                            <label class="updown value_sort" data-sort="order_date">注文日</label>
                                        @endif
                                    </th>
                                    <th>
                                        <label class="">注文事業者</label>
                                    </th>
                                    <th>
                                        @if(app('request')->input('sort_shipping_date') == 'up')
                                            <label class="updown value_sort change"
                                                   data-sort="shipping_date">希望配送日</label>
                                        @else
                                            <label class="updown value_sort" data-sort="shipping_date">希望配送日</label>
                                        @endif
                                    </th>
                                    <th class="w_110">
                                        <label>出荷時刻</label>
                                    </th>
                                    <th>
                                        <label class="">注文個数</label>
                                    </th>
                                    <th>
                                        <label class="label stage1">未着手</label>
                                    </th>
                                    <th>
                                        <label class="label stage2">梱包完了</label>
                                    </th>
                                    <th>
                                        <label class="label stage3">処理済</label>
                                    </th>
                                    <th>
                                        <label class="label stage4">出荷済</label>
                                    </th>
                                    <th>
                                    </th>
                                    </thead>
                                    <form action="{{ route('admin.order.scheduleTimeUpdate') }}"
                                          method="POST" id="update_schedule_time">
                                        @csrf
                                        <tbody>
                                        @foreach($order_business_groups as $order_business_group)
                                            <tr data-href="{{ route('admin.order.detail',  ['business_group' => $order_business_group->id]) }}">
                                                <td>
                                                    <p class="c-text__lv6 data">{{ $order_business_group->getCreateDateAttribute() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__weight--700 data">{{ $order_business_group->m_business->name ?? ''}}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5 data">{{ $order_business_group->shipping_date->format('Y/m/d') }}</p>
                                                </td>
                                                <td>
                                                    <div class="c-input c-time">
                                                        <?php
                                                        $hour = \Carbon\Carbon::parse(data_get($order_business_group, 'shipping_schedule_time'))->format('H');
                                                        $minute = \Carbon\Carbon::parse(data_get($order_business_group, 'shipping_schedule_time'))->format('i');
                                                        ?>
                                                        <input type="text" name="{{ $order_business_group->id }}"
                                                               placeholder="16 : 00"
                                                               class="timepicker" value="">
                                                    </div>
                                                </td>
                                                <script>
                                                    $(window).on('load', function () {
                                                        $('input[name="{{ $order_business_group->id }}"]').val("{{$hour}} : {{$minute}} ");
                                                    });
                                                </script>
                                                <td>
                                                    <p class="c-text__lv3 c-text__main c-text__weight--900 number"
                                                       data-after="個">{{ $order_business_group->total_quantity }}</p>
                                                    @if($order_business_group->additional_total_count != 0)
                                                        <p class="c-text__note c-number__insurance">追加処理+<strong
                                                                class="c-text__accent">{{ $order_business_group->additional_total_count }}</strong>
                                                        </p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__main c-text__weight--900 number"
                                                       data-after="個">{{ $order_business_group->orders->where('shipping_status', Order::TYPE_NOT_START)->count() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__main c-text__weight--900 number"
                                                       data-after="個">{{ $order_business_group->orders->where('shipping_status', Order::TYPE_PROCESS_DONE)->count() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__main c-text__weight--900 number"
                                                       data-after="個">{{ $order_business_group->orders->where('shipping_status', Order::TYPE_PACKING)->count() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__main c-text__weight--900 number"
                                                       data-after="個">{{ $order_business_group->orders->where('shipping_status', Order::TYPE_COMPLETE)->count() }}</p>
                                                </td>
                                                <td>
                                                    <span class="c-icon icon_next"></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <input type="hidden" name="select_date"
                                               value="{{ app('request')->input('select_date')?? $today }}">
                                    </form>
                                </table>
                            </div>
                        </div>
                    </li>
                    <li class="c-content ">
                        <ul class="p-list__split3 p-listTile">
                            @foreach($order_business_groups as $order_business_group)
                                <li class="{{ $order_business_group['add'] }} p-list__split3 p-listTile"
                                    data-href="{{ route('admin.order.detail',  ['business_group' => $order_business_group->id]) }}">
                                    <article class="c-box shadow">
                                        <a href="{{ route('admin.order.detail',  ['business_group' => $order_business_group]) }}"></a>
                                        <ul class="p-list">
                                            <li>
                                                <p class="c-text__unit orderDate">
                                                    <small>注文日</small>{{ $order_business_group->getCreateDateAttribute() }}
                                                </p>
                                            </li>
                                            <li class="border_1">
                                                <p class="c-text__lv4 c-text__weight--700">{{ $order_business_group->m_business->name ?? ''}}</p>
                                                <span class="c-icon__right c-icon c-icon__next"></span>
                                            </li>
                                            <li class="border_2">
                                                <p class="c-text__lv4">{{ Str::limit($order_business_group->m_business->getAddress(), 36) }}
                                                    宛</p>
                                            </li>
                                            <li class="border_2">
                                                <p class="c-text__lv6">{{ $order_business_group->shipping_date->format('Y/m/d') }}
                                                    <span
                                                        class="c-text__unit">配送</span></p>
                                            </li>
                                            <li class="border_1">
                                                <p class="c-text__lv4 c-text__weight--700 c-text__red"><span
                                                        class="c-text__unit">未着手</span>{{ $order_business_group->orders->where('shipping_status', Order::TYPE_NOT_START)->count() }}
                                                    <span
                                                        class="c-text__unit">個</span></p>
                                                <p class="c-text__lv4 c-text__weight--700 c-text__green"><span
                                                        class="c-text__unit">梱包完了</span>{{ $order_business_group->orders->where('shipping_status', Order::TYPE_PACKING)->count() }}
                                                    <span
                                                        class="c-text__unit">個</span></p>
                                                <p class="c-text__lv4 c-text__weight--700 c-text__gray"><span
                                                        class="c-text__unit">処理済</span>{{ $order_business_group->orders->where('shipping_status', Order::TYPE_PROCESS_DONE)->count() }}
                                                    <span
                                                        class="c-text__unit">個</span></p>
                                            </li>
                                            <li class="total">
                                                <div>
                                                    <ul>
                                                        @foreach($order_business_group->orders->groupBy('simultaneous_order_code')->values() as $key => $new_value)
                                                            @break($key == 3)
                                                            <li>
                                                                <p class="c-text__lv5">{{ $new_value[0]->order_product->title }}
                                                                    <strong>{{ $new_value[0]->quantity }}</strong>
                                                                    @if($key == 2)
                                                                        <span class="c-text__unit">個 ほか</span>
                                                                    @else
                                                                        <span class="c-text__unit">個</span>
                                                                    @endif
                                                                </p>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div>
                                                    <p class="c-text__lv2 c-text__main c-text__weight--900 number"
                                                       data-before="注文個数">{{ $order_business_group->total_quantity }}
                                                        <span
                                                            class="c-text__unit">個</span></p>
                                                    @if($order_business_group->additional_total_count != 0)
                                                        <p class="c-text__note c-number__insurance"
                                                           style="margin-top: 10px;">追加処理+<strong
                                                                class="c-text__accent">{{ $order_business_group->additional_total_count }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="p-index__foot">
                <div class="c-buttonArea__end">
                    <input type="submit" class="c-button c-button__wide" value="保存する" id="order_update_btn">
                </div>
            </div>
            <script>
                $(function () {
                    $('#order_update_btn').click(function () {
                        $('#update_schedule_time').submit();
                    })
                })
            </script>
        </section>
    </div>
@endsection
