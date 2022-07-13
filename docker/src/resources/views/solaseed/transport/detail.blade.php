@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '貨物情報登録詳細')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="{{ route('solaseed.transport.entry', [$package]) }}" method="post">
                    @csrf
                    <div class="p-index__head">
                        @if($from == 'checkin')
                            <a class="c-icon__back" href="{{ url()->previous() }}"></a>
                        @else
                            <a class="c-icon__back" href="{{ route('solaseed.transport.index') }}"></a>
                        @endif
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            貨物情報登録<small class="c-text__lv5 c-text__main">詳細</small>
                        </p>
                        <div class="c-right">
                            <div class="c-buttonArea">
                                <a href="" class="c-button__min c-button__neon">請求書確認</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box p-detail">
                            <div class="p-detail__head">
                                <div class="l">
                                    <div class="l-auto">
                                        <ul class="p-list__row">
                                            <li>
                                                <p class="c-text__lv4">{{ data_get($package, 'm_business.name') }}<span
                                                        class="c-text__unit">様からのご注文</span></p>
                                            </li>
                                            {{--<li>
                                               <div class="head">
                                                  <p class="c-text__label">集荷先</p>
                                               </div>
                                               <div class="data">
                                                  <p class="c-text__lv6">{{ data_get($package, 'industry_group.display_pickup_address') }}</p>
                                               </div>
                                            </li>--}}
                                            <li>
                                                <div style="display: flex; margin-right: 10px;">
                                                    <div class="head">
                                                        <p class="c-text__label">箱ID</p>
                                                    </div>
                                                    <div class="data">
                                                        <p class="c-text__lv6">{{ data_get($package, 'id') }}</p>
                                                    </div>
                                                </div>
                                                <div style="display: flex;">
                                                    <div class="head">
                                                        <p class="c-text__label">航空機番号</p>
                                                    </div>
                                                    <div class="data">
                                                        <p class="c-text__lv6">{{ data_get($package, 'shipping_number') }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @if(data_get($package, 'saved_type'))
                                                <li>
                                                    <div class="head">
                                                        <p class="c-text__label">種別</p>
                                                    </div>
                                                    <div class="data">
                                                        <p class="c-text__lv6">{{ \App\Models\Package::SAVED_TYPE_LIST[data_get($package, 'saved_type')] }}</p>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="l-fix__190">
                                        <?php
                                        $order_datetime = $package->orders->first();
                                        ?>
                                        <div class>
                                            <p class="c-text__unit">注文日時<span
                                                    class="c-text__lv6 c-text--right">{{ date('Y/m/d H:i', strtotime(data_get($order_datetime, 'created_at'))) }}</span>
                                            </p>
                                            {{--<p class="c-text__unit">送状番号<span class="c-text__lv6 c-text--right">1234567</span></p>--}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="p-detail__body">
                                <div class="bg-gray">
                                    <ul class="p-list__row">
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">貨物室確保</p>
                                            </div>
                                            <div class="data">
                                                <div class="switch c-checkbox">
                                                    <input type="checkbox" id="switch_space" name="transport_space"
                                                           value="1"
                                                           @if(data_get($package, 'transport_space') == \App\Models\Package::TYPE_RESERVED_SPACE)
                                                             checked="checked"
                                                           @endif
                                                           @if($user->type != "MANAGER")
                                                             disabled
                                                           @endif
                                                    >
                                                    <label for="switch_space"></label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">貨物サイズ<small>高さ×幅×奥行き(cm)</small></p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input__center">
                                                    <div class="c-input c-input_50">
                                                        <input name="package_height" type="number" placeholder="0" @if($user->type != "MANAGER") disabled @endif
                                                               value="{{ data_get($package, 'package_height') }}">
                                                    </div>
                                                    <span>×</span>
                                                    <div class="c-input c-input_50">
                                                        <input name="package_width" type="number" placeholder="0" @if($user->type != "MANAGER") disabled @endif
                                                               value="{{ data_get($package, 'package_width') }}">
                                                    </div>
                                                    <span>×</span>
                                                    <div class="c-input c-input_50">
                                                        <input name="package_depth" type="number" placeholder="0" @if($user->type != "MANAGER") disabled @endif
                                                               value="{{ data_get($package, 'package_depth') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">仮重量登録</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input__end c-input_100">
                                                    <input name="temporary_weight" type="number" placeholder="0.0" @if($user->type != "MANAGER") disabled @endif
                                                           value="{{ data_get($package, 'temporary_weight') }}"
                                                           readonly>
                                                    <span class="c-text__unit">kg</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">航空機積載時重量</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input__end c-input_100 c-input">
                                                    <input name="loading_weight" type="text" placeholder="0.0" @if($user->type != "MANAGER") disabled @endif
                                                           value="{{ data_get($package, 'loading_weight') }}">
                                                    <span class="c-text__unit">kg</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">物流費</p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input__end c-input_100">
                                                    <input name="logistic_cost" type="hidden" placeholder="0" value="">
                                                    <p class="c-text__lv4" id="js_insert_cost">—
                                                        <!-- 現在の物流費は115 円/kgなのでその計算で航空機積載時重量に対応して表示 -->
                                                        <span class="c-text__unit">円</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-detail__foot">
                                <table class="p-table data-table__300" id="data-table">
                                    <thead>
                                    <th>
                                        <p class="c-text__label">商品名</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">計量値　　　　</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">異常報告　　　　</p>
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($package->orders as $k => $v)
                                        <tr>
                                            <td>
                                                <p class="c-text__lv5">{{ data_get($v, 'order_product.title') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5">{{ data_get($v, 'cast_weight_value') }}
                                                    <span class="c-text__unit">
                                             @if(data_get($v, 'weight') < 1000)
                                                            g
                                                        @else
                                                            kg
                                                        @endif
                                          </span>
                                                </p>
                                            </td>
                                            <td>
                                                <p class="c-text">—</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="p-index__foot">
                        <div class="c-buttonArea__end f-a_end">
                            @if($from == 'checkin')
                                <a href="{{ url()->previous() }}"
                                class="c-button__gray c-button__min">戻る</a>
                            @else
                                <a href="{{ route('solaseed.transport.index') }}"
                                class="c-button__gray c-button__min">戻る</a>
                            @endif
                            <input type="submit" class="c-button__wide c-button__accent" @if($user->type != "MANAGER") disabled @endif value="保存する">
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
