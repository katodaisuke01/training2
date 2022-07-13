@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index" style="width:100%">
                    <div class="p-index__head">
                        <div class="c-titleUnderline">
                            <!-- <span class="c-icon c-icon__item"></span> -->
                            <h2 class="c-text__lv3 c-text__weight--900">注文管理 <span
                                    class="c-text__lv4 c-text__weight--700 c-text__main">— 顧客別注文確認 —</span></h2>
                            {{--<div class="c-buttonArea__end">
                                <a href="{{ route('warehouse.order.create', ['client_id' => $group_order['client_id']]) }}"
                                   class="c-button__round c-button__min">追加発注登録</a>
                            </div>--}}
                        </div>
                        <div class="p-companyInfo c-box">
                            <div class="c-box__head">
                                <ul class="p-listTable__body p-list__row">
                                    <li class="add">
                                        <article>
                                            <p class="label">注文日</p>
                                            <p class="c-text__lv5 data">{{ $group_order->getCreateDateAttribute() }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">注文顧客名</p>
                                            <p class="c-text__lv5 c-text__accent c-text__weight--700 data">{{ $group_order->getClientName() }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">顧客電話番号</p>
                                            <p class="c-text__lv5 c-text__weight--700 data">{{ $group_order->getClientTel() }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">顧客メールアドレス</p>
                                            <p class="c-text__lv5 c-text__weight--700 data">{{ $group_order->getClientEmail() }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">配送情報</p>
                                            <p class="c-text__lv5 c-text__weight--700 data">{{ $group_order->getDeliveryPartnarName() }}</p>
                                        </article>
                                    </li>
                                    <li class="auto">
                                        <article>
                                            <p class="label">発送日</p>
                                            <p class="c-text__lv5 c-text__weight--700 data">{{ $group_order->shipping_date->format('Y/m/d') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">注文個数</p>
                                            <p class="c-text__lv3 c-text__weight--900 c-text__main number"
                                               data-after="個">{{ data_get($group_order, 'orders')->count() }}</p>
                                            {{--<p class="c-text__note c-number__insurance">追加処理+<strong class="c-text__accent">16</strong></p>--}}
                                        </article>
                                    </li>
                                </ul>
                            </div>
                            @if(!$request_orders->isEmpty())
                                <div class="c-box__body bg-gray">
                                    <p class="c-text__lv5 c-text__weight--900 c-text__main">メッセージが届いています</p>
                                    <p class="">
                                        いつもお世話になっております。<br/>
                                        ご注文いただきました中の価格につきまして、ご希望の価格での販売は難しいのですが、<br/>
                                        @foreach($request_orders as $order)
                                            <span
                                                class="c-text__lv6">{{ data_get($order, 'order_product.title') }}</span>
                                            ：<span class="c-text__lv5">{{ data_get($order, 'sell_down_price') }}</span>円
                                            <br/>
                                        @endforeach
                                        以上の価格ですと販売可能となっております。ご検討のほど、よろしくお願い申し上げます。<br><br/>
                                        @if(!is_null($approvaled_orders))
                                            また以下の商品につきましては、希望単価での注文を確定させて戴きましたので、ご確認をお願い致します。<br/>
                                            @foreach($approvaled_orders as $order)
                                                <span
                                                    class="c-text__lv6">{{ data_get($order, 'order_product.title') }}</span>
                                                ：<span class="c-text__lv5">{{ data_get($order, 'limit_price') }}</span>円
                                                <br/>
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                                <div class="c-box__foot c-mgt16">
                                    <form action="{{ route('warehouse.order.giveOrCancel') }}" method="POST"
                                          id="giveOrCancelForm">
                                        @csrf
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
                                            <th class="w_80">
                                                <p class="c-text__label">販売可能単価</p>
                                            </th>
                                            <th class="w_200"></th>
                                            </thead>
                                            <tbody>
                                            @foreach($request_orders as $order)
                                                <tr>
                                                    <td>
                                                        <p>{{ data_get($order, 'order_product.title') }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="c-text__lv5 c-text__weight--900 c-text__main">{{ number_format(data_get($order, 'order_product.price')) }}
                                                            <span class="c-text__unit">円</span></p>
                                                    </td>
                                                    <td>
                                                        <p>{{ data_get($order, 'quantity') }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="c-text__lv6 c-text__weight--900 c-text__user">{{ number_format(data_get($order, 'limit_price')) }}
                                                            <span class="c-text__unit">円</span></p>
                                                    </td>
                                                    <td>
                                                        <p class="c-text__lv5 c-text__weight--900 c-text__main">{{ number_format(data_get($order, 'sell_down_price')) }}
                                                            <span class="c-text__unit">円</span></p>
                                                    </td>
                                                    <td>
                                                        <div class="c-radio">
                                                            <input type="radio" checked
                                                                   id="yes_{{data_get($order, 'simultaneous_order_code')}}"
                                                                   name="{{data_get($order, 'simultaneous_order_code')}}"
                                                                   value="1"
                                                            >
                                                            <label
                                                                for="yes_{{data_get($order, 'simultaneous_order_code')}}">注文する</label>
                                                            <input type="radio"
                                                                   id="no_{{data_get($order, 'simultaneous_order_code')}}"
                                                                   name="{{data_get($order, 'simultaneous_order_code')}}"
                                                                   value="0"
                                                            >
                                                            <label
                                                                for="no_{{data_get($order, 'simultaneous_order_code')}}">注文しない</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="c-buttonArea__end c-mgt16">
                                            <button class="c-button__user c-button__min c-button__round"
                                                    id="giveOrCancelSubmitbtn">注文確定
                                            </button>
                                        </div>
                                    </form>
                                    <script>
                                        $(function () {
                                            $('#giveOrCancelSubmitbtn').on('click', function () {
                                                if (confirm('注文が確定しますがよろしいですか？')) {
                                                    $('#giveOrCancelForm').submit();
                                                } else {
                                                    return false;
                                                }
                                            })
                                        })
                                    </script>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="p-index__body">

                        <div class="c-box">
                            <div class="p-scroll c-box__body">
                                <div class="p-scroll__inner--900">
                                    <table class="p-table">
                                        <thead>
                                        <th class="w_90"><p class="label">登録画像</p></th>
                                        <th><p class="label">カテゴリー</p></th>
                                        <th><p class="label">魚種</p></th>
                                        <th><p class="label">名称</p></th>
                                        <th class="w_80"><p class="label">注文数</p></th>
                                        <th class="w_60"><p class="label">追加注文</p></th>
                                        <th class="w_70"><p class="label">ステータス</p></th>
                                        <th class="w_80"><p class="label">項目削除</p></th>
                                        </thead>
                                        <tbody>
                                        @foreach($group_order->orders->groupBy('simultaneous_order_code') as $value)
                                            <tr>
                                                <td>
                                                    <div class="c-image"
                                                         style="background-image:url({{ $value[0]->order_product->image_path ? Storage::disk('s3')->temporaryUrl($value[0]->order_product->image_path, Carbon::now()->addMinute()) : '' }})"></div>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">{{ $value[0]->order_product->getCategoryName() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">{{ $value[0]->order_product->getFishName() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6 c-break">{{ $value[0]->order_product->title }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv4 c-text__main c-text__weight--900">{{ $value[0]->quantity }}
                                                        <span
                                                            class="c-text__unit">{{ $value[0]->order_product->getUnitName() }}</span>
                                                    </p>
                                                    {{--<p class="c-text__note c-number__insurance">追加処理+<strong class="c-text__accent">4</strong></p>--}}
                                                </td>
                                                <td>
                                                    <p @if($value[0]->additional_order_flg == 1) class="c-text c-text__lv5 add"
                                                       @endif style="display:none">
                                                        <span class="c-text__icon ">追加</span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">{{\App\Models\Order::SHIPPING_STATUS_LIST[$value[0]->shipping_status]}}</p>
                                                </td>
                                                {{--<td>
                                                    <div class="c-buttonarea">
                                                        <a class="c-button__min c-button__round c-button__line"
                                                           href="{{route('warehouse.order.edit', ['order' => $value[0]->id])}}">追加で注文する</a>
                                                    </div>
                                                </td>--}}
                                                <td>
                                                    <div class="c-buttonArea">
                                                        @if($value[0]->shipping_status == 0)
                                                        <a data-remodal-target="modal_order_delete{{ $value[0]->simultaneous_order_code }}"
                                                           class="c-button__min c-button__round c-button__gray">削除する</a>
                                                        @else
                                                        {{-- 梱包まで済んでいる商品は注文履歴の詳細で削除ボタンを表示しない --}}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('warehouse.element.modal._modal_order_delete', [
                                               'order' => $value[0]
                                            ])
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    </div>

@endsection
