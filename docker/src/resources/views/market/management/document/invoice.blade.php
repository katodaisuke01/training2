@extends('layouts.layout_marketManagement_nonAside')
@section('page_class', 'l-origin')
@section('content')
    <div class="l-container__768 l-page">
        <section class="p-index">
            <div class="p-index__head">
                <a href="{{ route('admin.document.index') }}" class="c-icon c-icon__back"></a>
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    帳票管理　<small>販売代金請求書の確認</small>
                </h2>
                <div class="c-buttonArea__end">
                    <form
                        action="{{ route('admin.document.sendMail', ['businessGroup' => app('request')->input('businessGroup')]) }}"
                        method="post" class="c-button__sub c-button__min" style="opacity: 0;" id="sendMailInvoice">
                        @csrf
                    </form>
                    <button type="submit" id="sendMailButton" class="c-button__sub c-button__min">メールで送信</button>
                    <script>
                        $('#sendMailButton').on('click', function () {
                            if (confirm('顧客宛にメールが送信されます。よろしいですか？')) {
                                $('#sendMailInvoice').submit();
                            }
                        })
                    </script>
                    <a class="c-button__line c-button__min"
                       href="{{route('admin.document.download', ['business' => data_get($business_group, 'id')])}}">ダウンロード</a>
                    <button class="c-button c-button__min" onclick="window.print();">発行・印刷</button>
                </div>
            </div>
            <div class="p-index__body" id="invoice_for_print">
                <div class="p-document c-box">
                    <div class="p-document__head">
                        <h2 class="c-text--center c-text__lv2 c-text__weight--900">販売代金請求書</h2>
                        <div class="c-number__shoulder">
                            <p class="c-text__unit"
                               data-before="発行日">{{ Carbon\Carbon::parse(data_get($business_group, 'shipping_date'))->format('Y/m/d') }}</p>
                        <!-- <p class="c-text__unit" data-before="振込期日">{{ date('Y/m/d') }}</p> -->
                        </div>
                    </div>
                    <div class="p-document__body">
                        <div class="l">
                            <div class="l-half">
                                <ul class="p-list">
                                    <li>
                                        <article>
                                            <p class="label">受注番号</p>
                                            <p class="c-text__lv5 data">{{ data_get($business_group, 'id') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">事業者名</p>
                                            <p class="c-text__lv3 data c-text__weight--900">{{ data_get($business_group, 'm_business.name') }}
                                                <span class="c-text__lv5">御中</span></p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">担当</p>
                                            <p class="c-text__lv5 data">
                                                {{ data_get($business_group, 'm_business.responsible_last_name') . ' ' . data_get($business_group, 'm_business.responsible_first_name') }}<span class="c-text__unit">様</span>
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">住所</p>
                                            <p class="c-text__lv5 data">
                                                〒{{ data_get($business_group, 'm_business.zip_code') }}<br/>
                                                {{ data_get($business_group, 'm_business.address1') }}
                                                {{ data_get($business_group, 'm_business.address2') }}
                                                {{ data_get($business_group, 'm_business.address3') }}
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">電話番号</p>
                                            <p class="c-text__lv5 data">
                                                {{ data_get($business_group, 'm_business.tel') }}
                                            </p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">メールアドレス</p>
                                            <p class="c-text__lv5 data">
                                                {{ data_get($business_group, 'm_business.email') }}
                                            </p>
                                        </article>
                                    </li>
                                    @php
                                        $price = 0;
                                        $transfer_cost = 0;
                                        foreach($orders as $order){
                                            $price += data_get($order, 'order_product.price') * data_get($order,'product_count');
                                        }
                                        foreach($packages as $package){
                                            $transfer_cost += (1000 + round(data_get($package->package, 'loading_weight')) * 115);
                                        }
                                    @endphp
                                    <li>
                                        <article>
                                            <p class="label">ご請求金額</p>
                                            <p class="c-text__lv2 c-text__weight--900 data">
                                                <span class="c-text__lv6">合計</span>{{ number_format(($price + $transfer_cost) * 1.1 ) }}
                                                <span class="c-text__lv6">円</span>
                                            </p>
                                            <p class="c-text__unit c-text__right">振り込み手数料はご負担願います</p>
                                        </article>
                                    </li>
                                </ul>
                            </div>

                            <div class="l-half">
                                <ul class="p-list">
                                    <li>
                                        <article>
                                            <p class="label">出荷日</p>
                                            <p class="c-text__lv5 data">{{ Carbon\Carbon::parse(data_get($business_group, 'shipping_date'))->format('Y/m/d') }}</p>
                                        </article>
                                    </li>
                                    <li>
                                        <article>
                                            <p class="label">生産者名</p>
                                            <p class="c-text__lv5 data">{{ data_get($industry, 'name') }}</p>
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
                                    <li>
                                        <article>
                                            <p class="label">振込先</p>
                                            <p class="c-text__lv5 data">
                                                <span class="c-text__unit">銀行名</span>鹿児島信用金庫
                                            </p>
                                            <p class="c-text__lv5 data">
                                                <span class="c-text__unit">支店名</span>鹿児島支店
                                            </p>
                                            <p class="c-text__lv5 data">
                                                <span class="c-text__unit">支店番号</span>000
                                            </p>
                                            <p class="c-text__lv5 data">
                                                <span class="c-text__unit">口座番号</span>普通 0123456
                                            </p>
                                            <p class="c-text__lv5 data">
                                                鹿児島漁業協同組合 組合長 山田太郎
                                            </p>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="l">
                        <div class="l-auto">
                                <p class="c-text__lv5">ご注文明細</p>
                                <table class="p-table">
                                    <thead>
                                        <tr>
                                            <th class="w_70"><p class="c-text__min">注文日</p></th>
                                            <th><p class="c-text__min">品名</p></th>
                                            <th class="w_80"><p class="c-text__min">重量</p></th>
                                            <th class="w_60"><p class="c-text__min">出荷数</p></th>
                                            <th class="w_60"><p class="c-text__min">単価</p></th>
                                            <th class="w_60"><p class="c-text__min">金額</p></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key => $order)
                                            <tr>
                                                <td>
                                                    <p class="c-text__min">{{ Carbon\Carbon::parse(data_get($business_group, 'created_at'))->format('Y/m/d') }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">{{ data_get($order, 'order_product.title') }}</p>
                                                </td>
                                                <td>
                                                    @if(data_get($order, 'total_weight') < 1000)
                                                      <p class="c-text__min">{{ number_format(data_get($order, 'total_weight')) }}g</p>
                                                    @else
                                                      <p class="c-text__min">{{ number_format(data_get($order, 'total_weight') * 0.001) }}kg</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="c-text__min">{{ data_get($order, 'product_count') }}</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">{{ number_format(data_get($order, 'order_product.price')) ?? '0' }}<span class="c-text__unit">円</span></p>
                                                </td>
                                                <td>
                                                    <p class="c-text__min">{{ number_format(data_get($order, 'product_count', 0) * data_get($order, 'order_product.price', 0)) }}<span class="c-text__unit">円</span></p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <ul>
                                    <li>
                                        <div class="l">
                                            <div class="l-auto">
                                                <div class="f-j_end">
                                                    <div class="">
                                                        <p class="c-text__lv5 c-text--right"><span
                                                                class="c-text__unit">小計</span>{{ number_format($price) }}
                                                            <span class="c-text__unit">円</span></p>
                                                        <p class="c-text__lv3 c-text__weight--700"><span
                                                                class="c-text__lv6">合計</span>{{ number_format($price * 1.1) }}
                                                            <span class="c-text__lv6">円(税込)</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <div class="p-document__foot">
                        <table class="p-table">
                            <caption><p class="c-text__lv5">運送料金明細</p></caption>
                            <thead>
                            <th><p>日付</p></th>
                            <th class="w_100"><p>箱数</p></th>
                            <th><p>重量</p></th>
                            <th><p>配達料</p></th>
                            <th><p>取扱料</p></th>
                            <th><p>運賃合計</p></th>
                            </thead>
                            <tbody>
                            @foreach($packages as $package)
                                <tr>
                                    <td>
                                        <p class="c-text__lv6">{{ Carbon\Carbon::parse(data_get($package->package, 'shipping_date'))->format('Y/m/d') }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6 c-text--right">1<span class="c-text__unit">箱</span></p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6 c-text--right">{{ number_format(data_get($package->package, 'loading_weight')) }}<span class="c-text__unit">kg</span></p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6 c-text--right">{{ number_format(round(data_get($package->package, 'loading_weight')) * 115)}}<span class="c-text__unit">円</span></p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6 c-text--right">1,000<span class="c-text__unit">円</span></p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6 c-text--right">{{ number_format(round(data_get($package->package, 'loading_weight')) * 115 + 1000) }}<span class="c-text__unit">円</span></p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p class="c-text__lv5 c-text--right"><span class="c-text__unit">小計</span>
                                        {{ number_format($transfer_cost) }}<span class="c-text__unit">円</span></p>
                                    <p class="c-text__lv3 c-text__weight--700 c-text--right"><span class="c-text__lv6">合計</span>
                                        {{ number_format($transfer_cost * 1.1) }}<span class="c-text__lv6">円(税込)</span></p>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
