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

        .c-text__min {
            font-size: 11px;
        }

        table {
            width: 100%
        }

        .p-table tbody p, .p-table tfoot * {
            text-align: right
        }

        .c-text__left {
            text-align: left !important
        }

        .float {
            float: left;
            width: 50%;
        }
    </style>
</head>
<body>
<div class="p-document c-box">
    <div class="p-document__head">
        <h1 class="c-text--center c-text__lv2 c-text__weight--900">納品書</h1>
        <p style="position:absolute;top:0;right0;left:inherit">
            <small>作成日</small>
            {{ data_get($business_group, 'shipping_date')->format('Y/m/d') }}<br/>
            <small>配送予定日</small>
            {{ data_get($business_group, 'shipping_date')->format('Y/m/d') }}
        </p>
    </div>
    <div style="border-top:#000 2px solid;">
        <div style="overflow:auto">
            <div class="float">
                <h3>— 販売先情報</h3>
                <ul class="p-list">
                    <li>
                        <p>
                            <small>受注番号</small>{{$business_group->id}}<br/>
                            <small>配送</small>
                            <span class="c-text__lv3 data c-text__weight--900">{{ $business_group->getBusinessName() ?? '' }}
                                <small class="c-text__lv5">御中</small>
                            <br/>
                            <small>担当</small>{{ data_get($business_group, 'm_business.responsible_last_name') . ' ' . data_get($business_group, 'm_business.responsible_first_name') }}<small>様</small><br/>
                            <small>住所</small>
                            {!! $business_group->getBusinessFullAddress() ?? '' !!}
                            <br/>
                            <small>電話番号</small>
                            {{ $business_group->getBusinessTel() ?? '' }}
                            <br/>
                            <small>FAX番号</small>
                            {{ $business_group->getBusinessTel() ?? '' }}
                            <br/>
                            <small>メールアドレス</small>
                            {{ $business_group->getBusinessEmail() ?? '' }}
                        </p>
                    </li>
                </ul>
            </div>

            <div class="float">
                <h3>— 産地事業者</h3>
                <ul class="p-list">
                    <li>
                        <p>
                            <small>出荷日</small>
                            {{ $business_group->shipping_date->format('Y/m/d') }}</span>
                            <br/>
                            <small>納品日</small>
                            {{ $business_group->shipping_date->format('Y/m/d') }}</span>
                            <br/>
                            <small>消費期限（発送から5日以内）</small>
                            {{ $business_group->shipping_date->format('Y/m/d') }}
                            <br/>
                            <small>産地事業者名</small>
                            株式会社リブル
                            <br/>
                            <small>住所</small>
                            〒775-0513<br/>
                            徳島県海部郡海陽町<br/>
                            宍喰浦字那佐337番地55
                            <br/>
                            <small>電話番号</small>
                            0884-70-5888
                            <br/>
                            <small>メールアドレス</small>
                            sample@example.com
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div style="clear:both">
            <div style="background-color:#f1f1f1;padding:8px;">
                <table>
                    <tbody>
                    <tr>
                        <td>
                            <p>
                                <small>箱数合計</small><br/>
                                {{ $packages->count() }}箱
                            </p>
                        </td>
                        <td>
                            <h3 style="text-align:right">
                                <small>合計金額</small><br/>
                                <strong>{{ number_format($total_price) }}</strong> <small>円</small>
                            </h3>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="p-document__foot">
        <h3 class="">— 梱包した箱</h3>
        <ul class="p-list__border">
            <table>
                <tbody>
                <tr>
                    @foreach($packages as $package)
                        <td>
                            <p class="label"><span class="c-text__unit">箱ID：</span>{{$package->package_id}}</p>
                        </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </ul>
    </div>
    <div class="p-document__foot">
        <h3 class="c-text__lv5">— 梱包商品一覧</h3>
        <table class="p-table">
            <thead style="borer-bottom:1px solid;">
            <tr>
                <th style="width:70px"><p class="c-text__min">水揚日</p></th>
                <th style="max-width:100px"><p class="c-text__min">魚種名<br/>産地・梱包日時</p></th>
                <th style="width:80px"><p class="c-text__min">処理<br/>漁法<br/>合計金額</p></th>
                <th style="width:60px"><p class="c-text__min">入荷量<br/>入数</p></th>
            </tr>
            </thead>
            <tbody style="borer-bottom:#000 1px solid;">
            @foreach($orders as $value)
                <tr style="borer-bottom:1px solid;">
                    <td>
                        <p class="c-text__min c-text__left">{{ Carbon\Carbon::parse(data_get($value,'updated_at'))->format('Y/m/d') }}</p>
                    </td>
                    <td>
                        <p class="c-text__min c-text__left">{{ data_get($value,'order_product_name') ?? '' }}</p>
                        <p class="c-text__min c-text__left">鹿児島県漁協
                            佐多支所・{{ Carbon\Carbon::parse(data_get($value,'updated_at'))->format('Y/m/d H:i') }}</p>
                    </td>
                    <td>
                        <p class="c-text__min">{{ data_get($value, 'order_product.m_process.name') }}</p>
                        <p class="c-text__min">定置網漁</p>
                        <p class="c-text__lv5">{{ number_format(data_get($value, 'order_product.price') * data_get($value,'product_count')) }}<small class="c-text__unit">円</small></p>
                    </td>
                    <td>
                        @if(data_get($value, 'total_weight') < 1000)
                          <p class="c-text__min">{{ number_format(data_get($value, 'total_weight')) }}<small>g</small></p>
                        @else
                          <p class="c-text__min">{{ number_format(data_get($value, 'total_weight') * 0.001) }}<small>kg</small></p>
                        @endif
                        <p class="c-text__min">{{ data_get($value,'product_count') }}<small>{{ data_get($value, 'order_product.m_unit.name') }}</small></p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
@php
    $out = ob_get_contents();
    ob_end_flush();
    file_put_contents('styled.html', $out);
@endphp
