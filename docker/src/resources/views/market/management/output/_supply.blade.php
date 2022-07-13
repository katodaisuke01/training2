@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-origin')
@section('content')
    <div class="l-container__768 l-page">
        <section class="p-index">
            <div class="p-index__head">
                <a href="{{ route('admin.document.index') }}" class="c-icon c-icon__back"></a>
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    帳票管理　<small>納品書の確認</small>
                </h2>
                <div class="c-buttonArea__end">
                    <form
                        action="{{ route('admin.document.sendSupplyMail', ['businessGroup' => app('request')->input('businessGroup')]) }}"
                        method="post" class="c-button__sub c-button__min" style="opacity: 0;" id="sendMailSupply">
                        @csrf
                    </form>
                    <a class="c-button__line c-button__min"
                    href="{{route('output.download', ['business' => data_get($business_group, 'id'),'industryGroupId' => $industryGroupId ])}}">ダウンロード</a>
                    <button class="c-button c-button__min" onclick="window.print();">発行・印刷</button>
                </div>
            </div>
            <div class="p-index__body">
                <div class="p-document c-box">
                    <div class="p-document__head">
                        <h2 class="c-text--center c-text__lv2 c-text__weight--900">納品書</h2>
                        <div class="c-number__shoulder">
                            <p class="c-text__unit"
                               data-before="作成日">{{ data_get($business_group, 'shipping_date')->format('Y/m/d') }}</p>
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
                                            <p class="label">配送</p>
                                            <p class="c-text__lv3 data c-text__weight--900">{{ $business_group->getBusinessName() ?? '' }}
                                                <span class="c-text__lv5">様宛</span></p>
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
                                            <p class="label">FAX番号</p>
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
                                            <p class="label">納品日</p>
                                            <p class="c-text__lv5 data">{{ $business_group->shipping_date->format('Y/m/d') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">産地事業者名</p>
                                            <p class="c-text__lv5 data">{{ data_get($industry, 'name') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">担当</p>
                                            <p class="c-text__lv5 data">{{ data_get($industry, 'responsible_last_name') . '　' . data_get($industry, 'responsible_first_name')}}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">住所</p>
                                            <p class="c-text__lv5 data">
                                                〒{{substr(data_get($industry, 'zip_code'), 0, 3)}}
                                                -{{substr(data_get($industry, 'zip_code'), -4)}}<br/>
                                                {{data_get($industry, 'display_address')}}<br/>
                                                {{data_get($industry, 'display_address2')}}
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">電話番号</p>
                                            <p class="c-text__lv5 data">
                                                {{data_get($industry, 'industry_tel')}}
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">メールアドレス</p>
                                            <p class="c-text__lv5 data">
                                                {{data_get($industry, 'email')}}
                                            </p>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="c-mgt16">
                            <div class="c-bg__gray">
                                <ul class="p-list__wrap">
                                    <li class="">
                                        <article>
                                            <p class="label">箱数合計</p>
                                            <p class="c-text__lv5 data">
                                                {{ $packages->count() }} <small class="c-text__unit">箱</small>
                                            </p>
                                        </article>
                                    </li>
                                    {{--<li>
                                       <article class="l">
                                          <div class="l-auto">
                                             <div class>
                                                <p class="label">送料</p>
                                                <p class="c-text__lv5 data">
                                                2,000 <small class="c-text__unit">円（税込）</small>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="l-fix l-fix__150">
                                             <div class>
                                                <p class="label">資材</p>
                                                <p class="c-text__lv5 data">
                                                0 <small class="c-text__unit">円（税込）</small>
                                                </p>
                                                </div>
                                          </div>
                                       </article>
                                    </li>--}}
                                    <li class="c-right">
                                        <article>
                                            <p class="label">合計金額</p>
                                            <p class="c-text__lv3 data">
                                                {{ number_format($total_price) }} <small
                                                    class="c-text__unit">円（税込）</small>
                                            </p>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-document__foot">
                        <div class="f-wrap">
                            <div style="width: 100%">
                                <p class="c-text__lv5">梱包した箱</p>
                            </div>
                            @foreach($packages as $package)
                                <?php
                                $package_url = route('itemList', ['package' => $package->package_id]);
                                ?>
                                <div style="margin: 10px 70px 10px 0px">
                                    <p class="label"><span class="c-text__unit">箱ID：</span>{{$package->package_id}}</p>
                                    <div>
                                        <div class="c-icon"
                                            style="background-image:url('https://api.qrserver.com/v1/create-qr-code/?data={{$package_url}}&size=100x100'); margin: 0 10px;"
                                            id="package_list_view{{ $package->package_id }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="l">
                            <div class="l-auto">
                                <p class="c-text__lv5">梱包商品一覧
                                    {{--<span class="c-text__note c-number__insurance">追加処理+<strong class="c-text__accent">16</strong></span>--}}
                                </p>
                                <table class="p-table">
                                    <thead>
                                    <tr>
                                        <th class="w_70"><p class="c-text__min">水揚日</p></th>
                                        <th><p class="c-text__min">魚種名<br/>産地・梱包日時</p></th>
                                        <th class="w_80"><p class="c-text__min">処理<br/>漁法<br/>合計金額</p></th>
                                        <th class="w_120"><p class="c-text__min">総重量(kg)<br/>総数(尾数・パック数)</p></th>
                                        {{--<th class="w_80"><p class="c-text__min">梱包<br />1尾あたり重量<br />kg単価</p></th>--}}
                                        {{--<th><p class="c-text__min">サイズデプログ<br />B品記入欄</p></th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $value)
                                        <tr>
                                            <td>
                                                <p class="c-text__min">{{ Carbon\Carbon::parse(data_get($value, 'updated_at'))->format('Y/m/d') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__min">{{ data_get($value, 'order_product.title') }}</p>
                                                <p class="c-text__min">{{ data_get($value, 'order_product.industry_group.name') }}
                                                    ・{{ data_get($value, 'order_package.updated_at') ? data_get($value, 'order_package.updated_at')->format('Y/m/d') : '' }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__min">{{ data_get($value, 'order_product.m_process.name') }}</p>
                                                <p class="c-text__min">定置網漁</p>
                                                <p class="c-text__lv5">{{ number_format(data_get($value, 'order_product.price') * data_get($value,'product_count')) }}
                                                    <small class="c-text__unit">円</small></p>
                                            </td>
                                            <td>
                                                @if(!is_null(data_get($value, 'total_weight')))
                                                    @if(data_get($value, 'total_weight') < 1000)
                                                      <p class="c-text__min">{{ number_format(data_get($value, 'total_weight')) }}<small>g</small></p>
                                                    @else
                                                      <p class="c-text__min">{{ number_format(data_get($value, 'total_weight') * 0.001) }}<small>kg</small></p>
                                                    @endif
                                                @endif
                                                <p class="c-text__min">
                                                    {{ data_get($value,'product_count') }}<small>{{ data_get($value, 'order_product.m_unit.name') }}</small>
                                                </p>
                                                {{--<p class="c-text__min"><small>箱</small></p>--}}
                                            </td>
                                            {{--<td>
                                               <p class="c-text__min">包装</p>
                                               <p class="c-text__min">{{ data_get($value, 'te') }}<small>kg</small></p>
                                               <p class="c-text__min"><small>円</small></p>
                                            </td>--}}
                                            {{--<td>
                                               @if(false)
                                               <p class="c-text__min"><span>・</span>サイズデプログ出力項目です</p>
                                               <p class="c-text__min"><span>・</span>これはB品でした</p>
                                               @endif
                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
