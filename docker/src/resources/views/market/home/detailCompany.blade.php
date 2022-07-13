@extends('layouts.layout_market')

@section('content')
    <div class="l-container__1080 l-page">
        <div class="l">
            <div class="l-auto">
                <section class="p-order">
                    <div class="p-order__head">
                        <a href="{{ route('industry.cultivation') }}" class="c-icon c-icon__back"></a>
                        <h4 class="c-text c-text__lv3 c-text__weight--900">注文情報<small>事業者詳細</small></h4>
                    </div>
                    @if (Session::has('booking_work'))
                        <div class="c-alert c-mgt16" style="">
                            <p>作業中だった注文梱包処理は{{ Session::get('booking_work') }}さんに引き継ぎされました。</p>
                            <p>引き続き、残りの作業をお願いいたします。</p>
                        </div>
                    @endif
                    <div class="p-order__body">
                        <div class="p-companyInfo c-box">
                            <ul class="p-listTable__body p-list__wrap">
                                <li>
                                    <article>
                                        <p class="label">注文日</p>
                                        <p class="c-text__lv5 data">{{ data_get($business_group, 'create_date') }}</p>
                                    </article>
                                </li>
                                <li class="auto">
                                    <article>
                                        <p class="label">注文事業者</p>
                                        <p class="c-text__lv4 c-text__accent c-text__weight--700 data">{{ data_get($business_group, 'business_name') }}</p>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <p class="label">希望配送日</p>
                                        <p class="c-text__lv4 c-text__weight--700 data">{{ data_get($business_group, 'shipping_date')->format('Y/m/d') }}</p>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <p class="label">配送先</p>
                                        <p class="c-text__lv5 data">{{ data_get($business_group, 'm_business.address') }}</p>
                                    </article>
                                </li>
                            </ul>
                            <ul class="p-listTable__body p-list__wrap">
                                <li>
                                    <article>
                                        <p class="label c-text--right">注文個数</p>
                                        <p class="c-text__lv2 c-text__weight--900 c-text--right c-text__main number"
                                           data-unit="個">{{ data_get($business_group, 'orders')->count() }}</p>
                                        <p class="c-text__note c-number__insurance additional_on_off">追加処理+<strong
                                                class="c-text__accent total_addition_count">0</strong></p>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <p class="label stage1">未着手</p>
                                        <p class="c-text__lv3 c-text--right c-text__weight--700 c-text__main data"
                                           data-unit="個">{{ $notStarted }}</p>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <p class="label stage2">梱包完了</p>
                                        <p class="c-text__lv3 c-text--right c-text__weight--700 c-text__main data"
                                           data-unit="個">{{ $alreadyPacking }}</p>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <p class="label stage3">処理済</p>
                                        <p class="c-text__lv3 c-text--right c-text__weight--700 c-text__main data"
                                           data-unit="個">{{ $done }}</p>
                                    </article>
                                </li>
                                <li>
                                    <article>
                                        <p class="label stage3">出荷済</p>
                                        <p class="c-text__lv3 c-text--right c-text__weight--700 c-text__main data"
                                           data-unit="個">{{ $shippingDone }}</p>
                                    </article>
                                </li>
                            </ul>
                        </div>
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
                                            if($current_page == $value[0]->total_order_count) {
                                              $current_page = 0;
                                            }
                                        @endphp
                                        @if($value[0]["user_id"] != null && $value[0]["user_id"] != Auth::id())
                                            <li onclick="ongoing{{$value[0]["simultaneous_order_code"]}}();"
                                                class="ongoing stage4">
                                                <script>
                                                    function ongoing{{$value[0]["simultaneous_order_code"]}}() {
                                                        //ret変数に確認ダイアログの結果を代入する。
                                                        user = $('.user_work_going').data('after');
                                                        ret = confirm(user + 'さんが作業中です。\n作業を開始してもよろしいですか？');
                                                        //確認ダイアログの結果がOKの場合外部リンクを開く
                                                        if (ret === true) {
                                                            location.href = "{!! route('industry.market.workflow', [
                                       'product_id' => $value[0]['order_product_id'],
                                       'order' => $value[0]['simultaneous_order_code'],
                                       'businessGroup' => $business_group->id,
                                       'page' => $current_page + 1
                                    ]) !!}";
                                                        }
                                                    }
                                                </script>
                                        @else
                                            <li data-href="{{ route('industry.market.workflow', [
                                 'product_id' => $value[0]['order_product_id'],
                                 'order' => $value[0]['simultaneous_order_code'],
                                 'businessGroup' => $business_group->id,
                                 'page' => $current_page + 1
                              ]) }}"
                                                @if(!in_array(1, $array_order_status) && !in_array(0, $array_order_status)) class="stage3"
                                                @elseif(in_array(1, $array_order_status)) class="stage2"
                                                @else class="stage1" @endif>
                                                @endif
                                                <article class="user_work_going"
                                                         data-after="{{ $value[0]->user_id != \Auth::user()->id ? $value[0]->getWorkingUserAttribute() : '' }}">
                                                    <div class="c-image"
                                                         style="background-image:url({{ $value[0]->order_product->image_path ? Storage::disk('s3')->temporaryUrl($value[0]->order_product->image_path, Carbon::now()->addMinute()) : '' }});">
                                                        <span class="c-stage"></span>
                                                    </div>
                                                    <div class="c-text">
                                                        <ul class="p-listCard__data">
                                                            <li>
                                                                <div class="data">
                                                                    <label
                                                                        class="c-text__lv5">{{ $value[0]->order_product->title }}</label>
                                                                </div>
                                                                <div class="data">
                                                                    <label
                                                                        class="c-text__lv4 c-text__main c-text__weight--900">{{ $value[0]->quantity }}
                                                                        <small class="c-text__unit">個</small></label>
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
                                                        <div class="c-status__number">
                                                            <div class="p-text">
                                                                <p class="c-text__lv5">{{ $count_array_order[1] + $count_array_order[2] }}
                                                                    <span>/</span>{{ $value[0]->total_order_count }}
                                                                    <span>件</span></p>
                                                                <p class="c-text__unit c-text__weight--700">梱包完了</p>
                                                            </div>
                                                        </div>
                                                    @elseif(!empty($count_array_order[1]))
                                                        <div class="c-status__number">
                                                            <div class="p-text">
                                                                <p class="c-text__lv5">{{ $count_array_order[1] }}<span>/</span>{{ $value[0]->total_order_count }}
                                                                    <span>件</span></p>
                                                                <p class="c-text__unit c-text__weight--700">梱包完了</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </article>
                                            </li>
                                            @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery/jquery-3.4.1.min.js')}}"></script>
<!-- 追加件数の表示 -->
<script>
    $(function () {
        let target = Number($('.total_addition_count').text());

        $('.js_count_total').each(function (index) {
            const counter = Number($(this).text());
            target = target + counter;
        })
        if (target !== 0) {
            $('.total_addition_count').text(target);
        } else {
            $('.additional_on_off').hide();
        }
    })
</script>
