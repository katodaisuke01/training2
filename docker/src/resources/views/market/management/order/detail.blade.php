@extends('layouts.layout_marketManagement')
@section('content')
    @php
        use \App\Models\Order;
    @endphp
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <a href="javascript:history.back()" class="c-icon c-icon__back"></a>
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    注文管理<small>詳細</small>
                </h2>
            </div>
            <div class="p-index__body">
                <div class="p-companyInfo c-box">
                    <ul class="p-list__wrap">
                        <li>
                            <article>
                                <p class="label">注文日</p>
                                <p class="c-text__lv5 data">{{ $business_group->getCreateDateAttribute() }}</p>
                            </article>
                        </li>
                        <li class="auto">
                            <article>
                                <p class="label">注文事業者</p>
                                <p class="c-text__lv4 c-text__accent c-text__weight--700 data">{{ $business_group->getBusinessName() }}</p>
                            </article>
                        </li>
                        <li>
                            <article>
                                <p class="label">注文個数</p>
                                <p class="c-text__lv3 c-text__weight--900 c-text__main number"
                                   data-after="個">{{ data_get($business_group, 'orders')->count() }}</p>
                                @if($business_group->additional_total_count)
                                    <p class="c-text__note c-number__insurance">追加処理+<strong
                                            class="c-text__accent total_addition_count">{{ $business_group->additional_total_count }}</strong>
                                    </p>
                                @endif
                            </article>
                        </li>
                        <li>
                            <article>
                                <p class="label stage1">未着手</p>
                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                   data-after="個">{{ $business_group->orders->where('shipping_status', Order::TYPE_NOT_START)->count() }}</p>
                            </article>
                        </li>
                        <li>
                            <article>
                                <p class="label stage2">梱包完了</p>
                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                   data-after="個">{{ $business_group->orders->where('shipping_status', Order::TYPE_PROCESS_DONE)->count() }}</p>
                            </article>
                        </li>
                        <li>
                            <article>
                                <p class="label stage3">処理済</p>
                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                   data-after="個">{{ $business_group->orders->where('shipping_status', Order::TYPE_PACKING)->count() }}</p>
                            </article>
                        </li>
                        <li>
                            <article>
                                <p class="label stage4">出荷済</p>
                                <p class="c-text__lv3 c-text__weight--700 c-text__main data"
                                   data-after="個">{{ $business_group->orders->where('shipping_status', Order::TYPE_COMPLETE)->count() }}</p>
                            </article>
                        </li>
                    </ul>
                    <div class="l-bg__gray p-index">
                        <form action="{{ route('admin.order.approvalLimitPrice') }}" method="POST"
                              id="approvalUpdateForm">
                            @csrf
                            <div class="p-index__head">
                                <p class="c-text__lv4 c-text__weight--700">価格変更依頼</p>
                            </div>
                            <div class="p-index__body">

                                <table class="p-table">
                                    <thead>
                                    <th>
                                        <p class="c-text__label">商品名</p>
                                    </th>
                                    <th class="w_80">
                                        <p class="c-text__label">商品単価</p>
                                    </th>
                                    <th class="w_60">
                                        <p class="c-text__label">注文数</p>
                                    </th>
                                    <th class="w_80">
                                        <p class="c-text__label">希望単価</p>
                                    </th>
                                    <th class="w_210">
                                        <p class="c-text__label">承認</p>
                                    </th>
                                    <th class="w_130">
                                        <p class="c-text__label">販売可能単価</p>
                                    </th>
                                    </thead>
                                    <?php $counter = 0;?>
                                    <tbody>
                                    @forelse($request_orders as $key => $r_order)
                                        <tr>
                                            <td>
                                                <p>{{ data_get($r_order, 'order_product.title') }}</p>
                                            </td>
                                            <td>
                                                <p>{{ number_format(data_get($r_order, 'order_product.price')) }}
                                                    <span>円</span></p>
                                            </td>
                                            <td>
                                                <p>{{ data_get($r_order, 'quantity') }}</p>
                                            </td>
                                            <td>
                                                <p>{{ data_get($r_order, 'limit_price') }}<span>円</span></p>
                                            </td>
                                            <td>
                                                <div class="c-radio">
                                                    <input type="radio"
                                                           id="acceptance_{{data_get($r_order, 'simultaneous_order_code')}}"
                                                           name="{{data_get($r_order, 'simultaneous_order_code')}}"
                                                           value="1"
                                                           @if(data_get($r_order, 'approval_flg') == 1) checked @endif
                                                    >
                                                    <label
                                                        for="acceptance_{{data_get($r_order, 'simultaneous_order_code')}}">承認する</label>
                                                    <input type="radio"
                                                           id="cancel_{{data_get($r_order, 'simultaneous_order_code')}}"
                                                           name="{{data_get($r_order, 'simultaneous_order_code')}}"
                                                           value="0"
                                                           @if(data_get($r_order, 'approval_flg') == 0 ) checked @endif
                                                    >
                                                    <label
                                                        for="cancel_{{data_get($r_order, 'simultaneous_order_code')}}">承認しない</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="c-input c-input__end">
                                                    <div class="c-input c-input__100">
                                                        <!-- 承認するのときはreadonly 承認しないのとき解除-->
                                                        <input type="number" placeholder="0" action=""
                                                               name="{{$counter}}"
                                                               value="{{data_get($r_order, 'sell_down_price') ?? data_get($r_order, 'order_product.price')}}"
                                                               @if(data_get($r_order, 'approval_flg') == 1) readonly
                                                               @endif
                                                               id="sell_down_price{{data_get($r_order, 'simultaneous_order_code')}}"
                                                        >
                                                    </div>
                                                    <span class="c-text__unit">円</span>
                                                </div>
                                            </td>
                                            <script>
                                                $('#cancel_{{data_get($r_order, 'simultaneous_order_code')}}').click(function () {
                                                    $('#sell_down_price{{data_get($r_order, 'simultaneous_order_code')}}').prop('readonly', false);
                                                })
                                                $('#acceptance_{{data_get($r_order, 'simultaneous_order_code')}}').click(function () {
                                                    $('#sell_down_price{{data_get($r_order, 'simultaneous_order_code')}}').prop('readonly', true);
                                                    $('#sell_down_price{{data_get($r_order, 'simultaneous_order_code')}}').val('');
                                                })
                                            </script>
                                        </tr>
                                        <?php $counter += 2;?>
                                    @empty
                                        <tr>
                                            <td>
                                                <p>値引き依頼はありません。</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if(!$request_orders->isEmpty())
                                <div class="p-index__foot">
                                    <div class="c-buttonArea__end">
                                        <button type="submit" class="c-button__line c-button__min"
                                                id="approvalUpdate_btn">保存する
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="p-tab c-mgt16">
                    <input id="tab_item" type="radio" name="TAB" checked="checked"/>
                    <label class="p-tab__label" for="tab_item">注文商品</label>
                    <div class="p-tab__content">
                        @if($business_group->total_quantity != $business_group->orders->where('shipping_status', Order::TYPE_PACKING)->count())
                            <div class="c-alert c-mgt16">
                                <p>処理数が注文数に達していない商品があります。</p>
                                <p>在庫不足などにより注文を処理済みとする場合は該当商品にチェックを入れ、更新するボタンを押下してください。</p>
                            </div>
                        @endif
                        <div class="p-scroll c-box c-mgt8" id="js-work-log-view" style="display: none;">
                            <div class="p-scroll__inner">
                                <table class="p-table">
                                    <thead>
                                    <th>
                                        <p class="label">作業者</p>
                                    </th>
                                    <!-- <th>
                                       <p class="label">作業数量</p>
                                    </th> -->
                                    <th>
                                        <p class="label">作業開始時間</p>
                                    </th>
                                    <th>
                                        <p class="label">作業終了時間</p>
                                    </th>
                                    </thead>
                                    <tbody class="work_log_list">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <form
                            action="{{ route('admin.order.update', ['businessGroup' => app('request')->input('businessGroup')]) }}"
                            method="POST">
                            @csrf
                            <div class="p-listCard">
                                <div class="p-listFish">
                                    <ul class="c-listCard">
                                        @foreach($business_group->orders->groupBy('simultaneous_order_code') as $key => $value)
                                            @php
                                                $array_additional_order = 0;
                                                foreach($value as $min_val) {
                                                   if($min_val->additional_order_flg_2 == 1) {
                                                   $array_additional_order += 1;
                                                   }
                                                }
                                                $array_order_status = [];
                                                $working_user = [];
                                                foreach($value as $smallVal){
                                                   $array_order_status[] = $smallVal->shipping_status;
                                                   if($smallVal->user_id) {
                                                      $working_user[] = $smallVal->user_id;
                                                   }
                                                }
                                                $count_array_order = array_count_values($array_order_status);
                                                $current_page = 0;
                                                if(!empty($count_array_order[1])) {
                                                   $current_page += $count_array_order[1];
                                                }
                                                if(!empty($count_array_order[2])) {
                                                   $current_page += $count_array_order[2];
                                                }
                                                if($current_page == $value[0]->quantity) {
                                                   $current_page = 0;
                                                }
                                            @endphp
                                            @if($value[0]["user_id"] != null && $value[0]["user_id"] != Auth::id())
                                                <li onclick="workLogView({{ $value[0]->simultaneous_order_code }})"
                                                    class="stage4">
                                                    <article class="user_work_going"
                                                             data-after="{{ $value[0]->getWorkingUserAttribute() ?? '' }}">
                                            @else
                                                <li onclick="workLogView({{ $value[0]->simultaneous_order_code }})"
                                                    @if(!in_array(1, $array_order_status) && !in_array(0, $array_order_status)) class="stage3"
                                                    @elseif(in_array(1, $array_order_status)) class="stage2"
                                                    @else class="stage1" @endif>
                                                    @endif
                                                    <article>
                                                        <div class="c-image"
                                                             style="background-image:url({{ $value[0]->order_product->image_path ? Storage::disk('s3')->temporaryUrl($value[0]->order_product->image_path, Carbon::now()->addMinute()) : '' }});">
                                                            <span class="c-stage"></span>
                                                        </div>
                                                        <div class="c-text">
                                                            <ul class="p-listCard__data">
                                                                <li>
                                                                    <div class="data">
                                                                        <label
                                                                            class="c-text__lv6">{{ $value[0]->order_product->title }}</label>
                                                                    </div>
                                                                    <div class="data">
                                                                        <label
                                                                            class="c-text__lv5">{{ $value[0]->quantity }}
                                                                            <small
                                                                                class="c-text__unit">個</small></label>
                                                                        @if($array_additional_order != 0)
                                                                            <p class="c-text__note c-number__insurance">
                                                                                追加処理+<strong
                                                                                    class="c-text__accent js_count_total">{{ $array_additional_order }}</strong>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="data">
                                                                        <label
                                                                            class="c-text__lv5">{{ $value[0]->order_product->m_process->name }}</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @if(!empty($count_array_order[1]) && !empty($count_array_order[2]))
                                                            <div class="c-status__number f-a_center">
                                                                <div class="c-checkbox">
                                                                    <input type="checkbox"
                                                                           name="status_check{{ $loop->index }}"
                                                                           id="onGoing_{{ $key }}"
                                                                           value="{{ $value[0]->simultaneous_order_code }}">
                                                                    <label for="onGoing_{{ $key }}"></label>
                                                                </div>
                                                                <div class="p-text">
                                                                    <p class="c-text__lv5">{{ $count_array_order[1] + $count_array_order[2] }}
                                                                        <span>/</span>{{ $value[0]->quantity }}
                                                                        <span>件</span></p>
                                                                    <p class="c-text__unit c-text__weight--700">梱包完了</p>
                                                                </div>
                                                            </div>
                                                        @elseif(!empty($count_array_order[1]))
                                                            <div class="c-status__number f-a_center">
                                                                <div class="c-checkbox ">
                                                                    <input type="checkbox"
                                                                           name="status_check{{ $loop->index }}"
                                                                           id="onGoing_{{ $key }}"
                                                                           value="{{ $value[0]->simultaneous_order_code }}">
                                                                    <label for="onGoing_{{ $key }}"></label>
                                                                </div>
                                                                <div class="p-text">
                                                                    <p class="c-text__lv5">{{ $count_array_order[1] }}
                                                                        <span>/</span>{{ $value[0]->quantity }}
                                                                        <span>件</span></p>
                                                                    <p class="c-text__unit c-text__weight--700">梱包完了</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($loop->last)
                                                            <input type="hidden" name="check_last"
                                                                   value="{{ $loop->index }}">
                                                        @endif
                                                    </article>
                                                </li>
                                                @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="p-index__foot p-bottom c-border__top">
                                <div class="c-buttonArea__end">
                                    <button type="submit" class="c-button__wide">更新する</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <input id="tab_box" type="radio" name="TAB"/>
                    <label class="p-tab__label" for="tab_box">梱包箱</label>
                    <div class="p-tab__content">


                        <div class="l-workflow__foot">
                            <div class="p-scrollBox">
                                <div class="p-scroll">
                                    <div class="p-scroll__inner">
                                        <ul class="p-listBox p-list__scroll">
                                            @foreach($pack_orders as $key => $value)
                                                <li class="js-iconBox" data-number="{{ $key }}">
                                                    @if($value[0]->package_id != null)
                                                        <div class="c-icon c-iconBox__close tab"></div>
                                                    @else
                                                        <div class="c-icon c-iconBox tab"></div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="p-frame">
                                <p class="c-text__lv4 c-text__weight--900 c-text__main">梱包内容</p>

                                @foreach($pack_orders as $order_key => $order_value)
                                    <div class="p-listCard c-content">
                                        <ul class="c-listCard">
                                            @foreach($order_value as $key => $val)
                                                <li @if($val->shipping_status == 2) class="stage3"
                                                    @elseif($val->shipping_status == 1) class="stage2" @endif>
                                                    <article>
                                                        <span
                                                            data-remodal-target="modal_product_delete_{{ $val->page_number.'_'.$val->simultaneous_order_code }}"
                                                            class="c-button__gray">削除</span>
                                                        <div class="c-image"
                                                             style="background-image:url({{ $val->image_path ? Storage::disk('s3')->temporaryUrl($val->image_path, Carbon::now()->addMinute()) : '' }});">
                                                        </div>
                                                        <div class="c-text">
                                                            <ul class="p-list">
                                                                <li>
                                                                    <div class="data">
                                                                        <label
                                                                            class="c-text__lv6">{{ $val->order_product->title }}</label>
                                                                    </div>
                                                                </li>
                                                                @if(isset($val->weight))
                                                                    <li>
                                                                        <div class="data">
                                                                            <label
                                                                                class="c-text__lv5 c-text__main c-text__weight--900">{{ $val->weight ?? '' }}
                                                                                <small
                                                                                    class="c-text__unit">g</small></label>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </article>
                                                    @include('market.element.modal._modal_product_delete_admin', [
                                                      'delete_order' => $val,
                                                    ])
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </div>
@endsection
