@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-origin')
@section('content')
    <div class="l-container__768 l-page">
        <section class="p-index">
            <div class="p-index__head">
                <a href="javascript:history.back()" class="c-icon c-icon__back"></a>
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    帳票管理　<small>確認</small>
                </h2>
                <div class="c-buttonArea__end">
                    <button class="c-button__sub c-button__min">メールで送信</button>
                    <a class="c-button__line c-button__min" href="./sample.pdf" download="sample.pdf">ダウンロード</a>
                    <button class="c-button c-button__min" onclick="window.print();">発行・印刷</button>
                </div>
            </div>
            <div class="p-index__body">
                <div class="p-document c-box">
                    <div class="p-document__head">
                        <h2 class="c-text--center c-text__lv2 c-text__weight--900"></h2>
                        <div class="c-number__shoulder">
                            <p class="c-text__unit" data-before="配送予定日">{{ date('Y/m/d') }}</p>
                        </div>
                    </div>
                    <div class="p-document__body">
                        <div class="l">
                            <div class="l-half">
                                <ul class="p-list">
                                    <li>
                                        <article>
                                            <p class="label">受注番号</p>
                                            <p class="c-text__lv5 data">{{$business_group->id}}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">消費地事業者名</p>
                                            <p class="c-text__lv3 data c-text__weight--900">{{ $business_group->getBusinessName() ?? '' }}
                                                <span class="c-text__lv5">様</span></p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">住所</p>
                                            <p class="c-text__lv5 data">
                                                {!! $business_group->getBusinessFullAddress() ?? '' !!}
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">電話番号</p>
                                            <p class="c-text__lv5 data">
                                                {{ $business_group->getBusinessTel() ?? '' }}
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">メールアドレス</p>
                                            <p class="c-text__lv5 data">
                                                {{ $business_group->getBusinessEmail() ?? '' }}
                                            </p>
                                        </article>
                                    </li>
                                </ul>
                            </div>

                            <div class="l-half">
                                <ul class="p-list">
                                    <li>
                                        <article>
                                            <p class="label">出荷日</p>
                                            <p class="c-text__lv5 data">{{ $business_group->shipping_date->format('Y/m/d') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">消費期限<small>発送から5日以内</small></p>
                                            <p class="c-text__lv5 data">{{ $business_group->shipping_date->format('Y/m/d') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">産地事業者名</p>
                                            <p class="c-text__lv5 data">株式会社リブル</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">住所</p>
                                            <p class="c-text__lv5 data">
                                                〒775-0513<br/>
                                                徳島県海部郡海陽町<br/>
                                                宍喰浦字那佐337番地55
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">電話番号</p>
                                            <p class="c-text__lv5 data">
                                                0884-70-5888
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">メールアドレス</p>
                                            <p class="c-text__lv5 data">
                                                sample@example.com
                                            </p>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-document__foot">
                        <div class="l">
                            <div class="l-auto">
                                <p class="c-text__lv5">梱包した箱の一覧</p>
                                <ul class="p-list__row">
                                    @foreach($packages as $package)
                                        <li>
                                            <article>
                                                <p class="label"><span
                                                        class="c-text__unit">箱ID：</span>{{$package->package_id}}</p>
                                                <div class="c-icon"
                                                     style="background-image:url('https://api.qrserver.com/v1/create-qr-code/?data={{$package->package_id}}&size=100x100'); margin: 0 10px;">
                                                </div>
                                            </article>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="l">
                            <div class="l-auto">
                                <p class="c-text__lv5">梱包商品一覧
                                    {{--<span class="c-text__note c-number__insurance">追加処理+<strong class="c-text__accent">16</strong></span>--}}
                                </p>
                                <ul class="p-list__split3">
                                    @foreach($orders as $value)
                                        <li>
                                            <article>
                                                <div class="c-image"
                                                     style="background-image:url({{ $value['image_path'] ? Storage::disk('s3')->temporaryUrl($value['image_path'], Carbon::now()->addMinute()) : '' }})">
                                                </div>
                                                <div class="c-icon qr"
                                                     style="background-image:url('https://api.qrserver.com/v1/create-qr-code/?data={{$value->id}}&size=100x100');">
                                                </div>
                                                <div class="c-text">
                                                    <ul class="p-listCard__data">
                                                        <li>
                                                            <div class="data">
                                                                <p class="c-text">{{ $value['updated_at']->format('Y/m/d H:i') }}</p>

                                                                <p class="c-text__lv6">{{ $value->getOrderProductName() ?? '' }}</p>
                                                                <p class="c-text__lv4 c-text__main c-text__weight--900">{{ $value['weight'] }}
                                                                    <small class="c-text__unit">g</small></@>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
