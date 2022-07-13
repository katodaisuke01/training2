@php
    ob_start();
@endphp
    <!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        @font-face {
            font-family: ipag;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipag.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: ipag;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipag.ttf') }}') format('truetype');
        }

        body {
            font-family: ipag !important;
        }

        small {
            color: #666;
            font-size: 13px
        }

        h1 {
            text-align: center
        }

        h1, h2, h3, h4 {
            font-weight: bold
        }

        ul {
            list-style: none;
        }

        table {
            width: 100%
        }

        .p-table tbody p, .p-table tfoot * {
            text-align: right
        }

        .float {
            float: left;
            width: 50%;
        }
    </style>
</head>
<body>
<div class="p-index__body" id="invoice_for_print">
    <div class="p-document__head">
        <h1 class="c-text--center c-text__lv2 c-text__weight--900">販売代金請求書</h1>
        <p style="position:absolute;top:0;right0;left:inherit"><small>発行日</small>
            {{ Carbon\Carbon::parse(data_get($business_group, 'shipping_date'))->format('Y/m/d') }}</p>
    </div>
    <div style="border-top:#000 2px solid;">
        <div style="overflow:auto">
            <div class="float">
                <h3>— 販売先情報</h3>
                <ul>
                    <li>
                        <p>
                            <small>受注番号</small>{{ data_get($business_group, 'id') }}<br/>
                            <small>事業者名</small>
                            <span class="c-text__lv3 data c-text__weight--900">{{ data_get($business_group, 'm_business.name') }}
                            <small class="c-text__lv5">御中</small>
                        <br/>
                        <small>担当</small>{{ data_get($business_group, 'm_business.responsible_last_name') . ' ' . data_get($business_group, 'm_business.responsible_first_name') }}<small>様</small><br/>
                            <small>住所</small>
                                〒{{ data_get($business_group, 'm_business.zip_code') }}
                                {{ data_get($business_group, 'm_business.address1') }}
                                {{ data_get($business_group, 'm_business.address2') }}
                                {{ data_get($business_group, 'm_business.address3') }}
                        <br/>
                            <small>電話番号</small>
                            {{ data_get($business_group, 'm_business.tel') }}
                        <br/>
                            <small>メールアドレス</small>
                            {{ data_get($business_group, 'm_business.email') }}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="float">
                <h3>— 産地事業者</h3>
                <ul>
                    <li>
                        <p>
                            <small>出荷日</small>{{ Carbon\Carbon::parse(data_get($business_group, 'shipping_date'))->format('Y/m/d') }}</span>
                            <br/>
                            <small>生産者名</small>{{ data_get($industry, 'name') }}
                            <br/>
                            <small>住所</small>
                            〒{{substr(data_get($industry, 'zip_code'), 0, 3)}}
                            -{{substr(data_get($industry, 'zip_code'), -4)}} {{data_get($industry, 'display_address')}} {{data_get($industry, 'display_address2')}}
                            <br/>
                            <small>電話番号</small>
                            {{data_get($industry, 'industry_tel')}}
                            <br/>
                            <small>メールアドレス</small>
                            {{data_get($industry, 'email')}}<br/>
                            <small>振込先 —</small><br/>
                            <small>　銀行名</small>鹿児島信用金庫<br/>
                            <small>　支店名</small>鹿児島支店<br/>
                            <small>　支店番号</small>000<br/>
                            <small>　口座番号</small>普通 0123456<br/>
                            <small>　鹿児島漁業協同組合 組合長 山田太郎
                        </p>
                    </li>
                </ul>
            </div>
            @php
              $transfer_price = 0;
              foreach($packages as $package){
                $transfer_price += (1000 + round(data_get($package->package, 'loading_weight')) * 115);
              }  
            @endphp
            <div style="clear:both">
                <h2 style="border-top:1px solid;clear:both;text-align:right">
                    <small>ご請求金額</small>
                    {{ number_format(($total_price + $transfer_price) * 1.1) }}<small>円</small>
                </h2>
                <p style="text-align:right"><small>（振込手数料500円）振り込み手数料はご負担願います</small></p>
            </div>
        </div>
        <div class="p-document__foot">
            <h3 class="c-text__lv5 c-mgb8">— 注文明細</h3>
            <ul class="p-list__border">
                <?php
                $total = 0;
                ?>
                @foreach($orders as $key => $order)
                    <?php
                    $total += data_get($order, 'order_product.price') * data_get($order, 'product_count');
                    ?>
                    <li style="border-bottom:#ccc 1px solid">
                        <div class="data">
                            <p>
                                <small>注文日：</small>{{ Carbon\Carbon::parse(data_get($business_group, 'created_at'))->format('Y/m/d') }}
                                <br/>
                                <small>品名：</small>{{ data_get($order, 'order_product.title') }}<br/>
                                @if(data_get($order, 'total_weight') < 1000)
                                    <small>重量：</small>{{ number_format(data_get($order, 'total_weight')) }}g</p>
                                @else
                                    <small>重量：</small>{{ number_format(data_get($order, 'total_weight') * 0.001) }}kg</p>
                                @endif
                                <small>単価：</small>{{ number_format(data_get($order, 'order_product.price')) ?? '0' }}
                                <small>円/個</small>　
                                <small>出荷数：</small>{{ data_get($order, 'product_count') }}<small class="c-text__unit">件</small>　
                                <small>金額：</small>{{ number_format( data_get($order, 'order_product.price') * data_get($order, 'product_count')) }}
                                <small class="c-text__unit">円</small>　
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul>
                <li>
                    <p style="text-align:right"><small>小計：</small>{{ number_format($total) }}<small class="c-text__lv6">円</small>
                </li>
                <li style="border-top:#000 2px solid;">
                    <h2 style="text-align:right"><span class="c-text__lv6">合計</span>{{ number_format($total*1.1) }}<span
                            class="c-text__lv6">円</span></h2>
                </li>
            </ul>
        </div>
        <div class="p-document__foot">
            <table class="p-table">
                <caption><p class="c-text__lv5">運送料金明細</p></caption>
                <thead style="borer-bottom:1px solid;">
                <tr>
                    <th style="width:130px"><p>日付</p></th>
                    <th style="width:50px"><p>箱数</p></th>
                    <th style="width:100px"><p>重量</p></th>
                    <th style="width:100px"><p>配達料</p></th>
                    <th style="width:100px"><p>取扱量</p></th>
                    <th style=""><p>運賃合計</p></th>
                </tr>
                </thead>
                <tbody style="borer-bottom:#000 1px solid;">
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
                        <p class="c-text__lv5 c-text--right"><small>小計</small>
                            {{ number_format($transfer_price) }}<small>円</small></p>
                        <h2><small>合計</small>{{ number_format($transfer_price * 1.1) }}<small>円</small></h2>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>
