@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index">
                    <div class="p-index__head">
                        <div class="c-titleUnderline">
                            <!-- <span class="c-icon c-icon__item"></span> -->
                            <h2 class="c-text__lv3 c-text__weight--900">注文管理</h2>
                        </div>
                    </div>
                    <form action="{{ route('warehouse.order.update') }}" class="p-register__form" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="p-index__body c-box shadow">
                            <div class="c-box__head">
                                <p class="c-text__main c-text__lv4 c-text__weight--700">追加注文</p>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-fix l-fix__300 f-col">
                                        <ul class="p-list__wrap">
                                            <li>
                                                <div class="head">
                                                    <p class="label required">追加注文数</p>
                                                </div>
                                                <div class="c-input c-input__end c-input__250 c-input--lg"
                                                     data-after="個">
                                                    <input type="number" name="quantity" placeholder="0" value="">
                                                </div>
                                                @if ($errors->has('quantity'))
                                                    <p class="c-text__error" style="display:block;">
                                                        {{ __($errors->first('quantity')) }}
                                                    </p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">発送日</p>
                                                </div>
                                                <div class="c-input readonly">
                                                    <input readonly type="text" placeholder=""
                                                           value="{{ $order->shipping_date->format('Y/m/d') }}">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">カテゴリー</p>
                                                </div>
                                                <div class="c-input readonly">
                                                    <input readonly type="text" placeholder=""
                                                           value="{{ $order->order_product->getCategoryName() }}">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">魚種</p>
                                                </div>
                                                <div class="c-input readonly">
                                                    <input readonly type="text" placeholder=""
                                                           value="{{ $order->order_product->getFishName() }}">
                                                </div>
                                            </li>
                                            <li class="full">
                                                <div class="head">
                                                    <p class="label required">商品名</p>
                                                </div>
                                                <div class="c-input c-input__full readonly">
                                                    <input readonly type="text" placeholder=""
                                                           value="{{ $order->order_product->title }}">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label">在庫数<small class="c-text__caution">自動表示</small></p>
                                                </div>
                                                <div class="c-input__100 c-input readonly" data-after="個">
                                                    <input type="number" placeholder="0" readonly value="100">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label">注文数<small class="c-text__caution">自動表示</small></p>
                                                </div>
                                                <div class="c-input c-input__100 readonly" data-after="個">
                                                    <input type="number" placeholder="0" readonly
                                                           value="{{ $order->quantity }}">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">加工・締め</p>
                                                </div>
                                                <div class="c-input c-input__200 readonly">
                                                    <input readonly type="text"
                                                           value="{{ $order->order_product->getProcessName() }}">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="l-auto">
                                        <p>注文者情報</p>
                                        <div class="bg-gray">
                                            <ul class="p-list">
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">注文顧客名</p>
                                                    </div>
                                                    <div class="c-input c-input__full readonly">
                                                        <input readonly type="text" value="{{ $order->client->name }}">
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">郵便番号</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__100 readonly">
                                                            <input readonly type="number" placeholder="1234567"
                                                                   value="{{ $order->client->zip_code }}">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">都道府県</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__200 readonly">
                                                            <input readonly type="text" placeholder="東京都"
                                                                   value="{{ $order->client->prefecture_name }}">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">住所</p>
                                                    </div>
                                                    <div class="c-input c-input__full readonly">
                                                        <input readonly type="text" placeholder="中央区銀座1-1-1"
                                                               value="{{ $order->client->address1.' '.$order->client->address2}}">
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">建物名など</p>
                                                    </div>
                                                    <div class="c-input c-input__full readonly">
                                                        <input readonly type="text" placeholder="銀座ビル101"
                                                               value="{{ $order->client->address3 }}">
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">電話番号</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__full readonly">
                                                            <input readonly type="tel" placeholder="1234567"
                                                                   value="{{ $order->client->tel }}">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">メールアドレス</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__full readonly">
                                                            <input readonly type="email"
                                                                   placeholder="sample@example.com"
                                                                   value="{{ $order->client->email }}">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">配送業者</p>
                                                    </div>
                                                    <div class="c-input c-input__full readonly">
                                                        <input readonly type="text" placeholder="配送業者"
                                                               value="{{ $order->getDeliveryPartnarName() }}">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-index__foot">
                            <div class="c-buttonArea__end">
                                <a href="javascript:history.back()"
                                   class="c-button__round c-button__gray c-button__wide">キャンセル</a>
                                <button type="submit" class="c-button__round c-button__white c-button__wide">保存する</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
@endsection
