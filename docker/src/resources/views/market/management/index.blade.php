@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container">
        @foreach($request_orders as $order)
            <a href="{{ route('admin.order.detail', ['businessGroup' => $order->order_business_group_id]) }}"
               class="c-alert">
                <p class=""><span>{{ date('Y/m/d H:i', strtotime($order->updated_at)) }} </span>商品の注文・価格について問い合わせが来ています
                </p>
            </a>
        @endforeach
        {{--
        <a class="c-alert">
           <p class=""><span>{{ date('Y/m/d H:m') }} </span>株式会社OOの価格検討商品は注文が確定されました</p>
        </a>
        <a class="c-alert">
           <p class=""><span>{{ date('Y/m/d H:m') }} </span>株式会社AAAの価格検討商品は注文がキャンセルされました</p>
        </a>
        --}}
        <div class="l">
            <div class="l-auto">
                <section class="p-index" style="width:100%">
                    <div class="p-index__head">
                        <span class="c-icon c-icon__item"></span>
                        <h2 class="title f-a_end">ダッシュボード <span class="c-text__lv4">注文数予測と実績</span></h2>
                        <div class="c-buttonArea__end">
                            <a data-remodal-target="modal_box" class="c-button c-button__min">梱包の箱を設定する</a>
                        </div>
                    </div>
                    <div class="p-index__body c-box shadow">
                        <div class="f-a_center">
                            <h2 class="c-text__lv4 c-text__weight--700">注文量推移の比較</h2>
                            <div class=" c-right">
                                <form action="" id="">
                                    <div class="c-input__center">
                                        <p class="c-text__unit">起点日付の<br/>前後1ヶ月</p>
                                        <div class="c-input c-input--date c-input__150">
                                            <input type="text" name="select_date" class="datepicker"
                                                   placeholder="2021/01/01">
                                        </div>
                                        <div class="c-input c-input__100">
                                            <div class="c-buttonArea">
                                                <button type="submit" class="c-button c-button__min">更新</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- グラフ_start -->
                        @include('market.management._graph')
                    </div>
                </section>
            </div>
        </div>
        <div class="l">
            <div class="l-auto">
                <div class="c-right">
                    <form action="{{ route('admin.home') }}" id="">
                        <div class="c-input__center">
                            <div class="c-input c-input--date c-input__150">
                                <input type="text" name="select_date" class="datepicker" placeholder="2021/01/01"
                                       autocomplete="off"
                                       value="{{ app('request')->input('select_date') ?? \Carbon::today()->format('Y/m/d') }}">
                            </div>
                            <div class="c-input c-input__100">
                                <div class="c-buttonArea">
                                    <button type="submit" class="c-button c-button__min">更新</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="l">
            <div class="l-half">
                <section class="p-order">
                    <div class="p-order__head">
                        <div class="c-titleUnderline">
                            <h4 class="c-text c-text__lv3 c-text__weight--900">業者別注文情報</h4>
                            <div class="total">
                                <p class="number c-text__lv2 c-text__main"
                                   data-unit="件">{{ $total_business_orders }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-order__body">
                        <div class="c-box">
                            <div class="p-scroll">
                                <div class="p-scroll__inner">
                                    <table class="p-table">
                                        <thead>
                                        <th class="w_90"><label>注文日</label></th>
                                        <th><label>事業者名</label></th>
                                        <th><label>処理個数</label></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $value)
                                            <tr data-href="{{ route('admin.order.detail', ['business_group' => $value]) }}">
                                                <td>
                                                    <p class="c-text__lv6">{{ $value->getCreateDateAttribute() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5">{{  $value->getBusinessName() ?? '' }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv3 c-text__weight--900 c-text__main number"
                                                       data-after="個">{{ data_get($value,'orders')->count() }}</p>
                                                    @if($value->additional_total_count != 0)
                                                        <p class="c-text__note c-number__insurance">追加処理+<strong
                                                                class="c-text__accent">{{ $value->additional_total_count }}</strong>
                                                        </p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="c-icon icon_next"></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="l-half">
                <section class="p-order">
                    <div class="p-order__head">
                        <div class="c-titleUnderline">
                            <h4 class="c-text c-text__lv3 c-text__weight--900">魚種別注文情報</h4>
                            <div class="total">
                                <p class="number c-text__lv2 c-text__main" data-unit="件">{{ $fish_orders_count }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-order__body">
                        <div class="c-box">
                            <div class="p-scroll">
                                <div class="p-scroll__inner">
                                    <table class="p-table">
                                        <thead>
                                        <th><label>商品名</label></th>
                                        <th class="w_80"><label>注文個数</label></th>
                                        <th class="w_130"><label>注文業者</label></th>
                                        <!-- <th></th> -->
                                        </thead>
                                        <tbody>
                                        @forelse($fish_category as $key => $value)
                                            <tr>
                                                <td>
                                                    <p class="c-text__lv5 c-text__weight--700">{{ $value[0]->getProductTitleAttribute() }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv3 c-text__weight--900 c-text__main number"
                                                       data-after="個">{{ count($value) }}</p>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li><p class="c-text__lv6">KDDI株式会社</p></li>
                                                    </ul>
                                                </td>
                                                <!-- <td>
                                                   <span class="c-icon icon_next"></span>
                                                </td> -->
                                            </tr>
                                        @empty

                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="c-buttonArea__center">
                               <a href="" class="c-button__full c-button__sm c-button__round c-button__lineBlack">全て見る</a>
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
