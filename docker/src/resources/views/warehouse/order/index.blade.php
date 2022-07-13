@extends('layouts.layout_admin')
@section('content')
    <div class="l-container">
        <div class="l">
            <div class="l-auto">
                <section class="p-index p-store">
                    <div class="p-index__head">
                        <div class="c-titleUnderline">
                            <span class="c-icon c-icon__item"></span>
                            <h2 class="c-text__lv3 c-text__weight--900">注文管理</h2>
                            <div class="c-right">
                                <p class="c-text__lv1 c-text__main c-text__weight--900"><span class="c-text__unit">ご注文依頼は</span>8:30<span
                                        class="c-text__unit">までにお願いします</span></p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('warehouse.order.fix') }}" method="post" id="selectOrderForm">
                        @csrf
                        <div class="p-index__body">
                            <ul class="p-list__split5 p-listTile">
                                @forelse($stocks as $key => $val)
                                    <li>
                                        <article class="c-box shadow">
                                            <a data-remodal-target="modal_order_{{ data_get($val, 'order_product.id') }}"></a>
                                            <div class="c-image"
                                                 style="background-image:url({{ data_get($val, 'order_product.image_path') ? Storage::disk('s3')->temporaryUrl(data_get($val, 'order_product.image_path'), Carbon::now()->addMinute()) : '' }});"></div>
                                            <div class=c-info>
                                                <p class="c-text__lv5">{{ data_get($val, 'order_product.title') }}</p>
                                                <input type="hidden"
                                                       name="order[{{ data_get($val, 'order_product.id') }}][product_name]"
                                                       value="{{ data_get($val, 'order_product.title') }}">
                                                <input type="hidden"
                                                       name="order[{{ data_get($val, 'order_product.id') }}][industry_group_id]"
                                                       value="{{ data_get($val->order_product, 'industry_group_id') }}">       
                                                <input type="hidden"
                                                       name="order[{{ data_get($val, 'order_product.id') }}][id]"
                                                       value="{{ data_get($val->order_product, 'id') }}">
                                                <ul class="p-list__row">
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">商品価格（税込）：</p>
                                                        </div>
                                                        <div class="data">
                                                            <p class="c-text__lv5 c-text__main c-text__weight--700">
                                                                {{ number_format(data_get($val, 'order_product.price')) }}
                                                                <span
                                                                    class="c-text__unit">円/{{ data_get($val, 'order_product.m_unit.name') }}</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">基準重量：</p>
                                                        </div>
                                                        <div class="data">
                                                            @if(data_get($val, 'order_product.base_weight') < 1000)
                                                            <p class="c-text__lv5 c-text__main c-text__weight--700">
                                                                {{ data_get($val, 'order_product.base_weight') }}<span
                                                                    class="c-text__unit">g/{{ data_get($val, 'order_product.m_unit.name') }}</span>
                                                            @else
                                                            <p class="c-text__lv5 c-text__main c-text__weight--700">
                                                                {{ data_get($val, 'order_product.base_weight')*0.001 }}<span
                                                                    class="c-text__unit">kg/{{ data_get($val, 'order_product.m_unit.name') }}</span>
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    {{--<li>
                                                       <div class="head">
                                                          <p class="c-text__note">1gあたりの価格：</p>
                                                       </div>
                                                       <div class="data">
                                                          <p class="c-text__lv5 c-text__main c-text__weight--700">
                                                             {{ round(data_get($val, 'order_product.base_weight') / data_get($val, 'order_product.price'), 1) }}<span class="c-text__unit">円</span>
                                                          </p>
                                                       </div>
                                                    </li>--}}
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">在庫状況：</p>
                                                        </div>
                                                        <div class="data">
                                                            <p class="c-text__lv6 c-text__weight--700">
                                                                {{ data_get($val, 'count') }}
                                                                <span
                                                                    class="c-text__unit">{{ data_get($val, 'order_product.m_unit.name') }}</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note">注文数<br/>または重量</p>
                                                        </div>
                                                        <div class="data">
                                                            <div class="c-input c-input__end">
                                                                <input type="number"
                                                                       name="order[{{ data_get($val, 'order_product.id') }}][quantity]"
                                                                       placeholder="0" value="" style="z-index: 1;">
                                                                <input type="hidden"
                                                                       name="order[{{ data_get($val, 'order_product.id') }}][stock_id]"
                                                                       value="{{ data_get($val, 'stock_id') }}">
                                                                <span
                                                                    class="c-text__unit">{{ data_get($val, 'order_product.m_unit.name') }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="head">
                                                            <p class="c-text__note"></p>
                                                        </div>
                                                        <div class="data">
                                                            <div class="c-input c-input__end">
                                                                <input type="number"
                                                                       name="order[{{ data_get($val, 'order_product.id') }}][weight]"
                                                                       placeholder="0" value="" style="z-index: 1;"
                                                                       data-base="{{data_get($val, 'order_product.base_weight')}}">
                                                                <span class="c-text__unit">kg</span>
                                                            </div>
                                                            <p class="c-text__error min_weight_{{ data_get($val, 'order_product.id') }}"
                                                               style="display:none;">
                                                                {{data_get($val, 'order_product.base_weight')}}
                                                                g以上で設定して下さい。
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </li>
                                    <script>
                                        $('input[name="order[{{ data_get($val, 'order_product.id') }}][quantity]"]').on('change', function () {
                                            if ($(this).val() == '') {
                                                $('input[name="order[{{ data_get($val, 'order_product.id') }}][weight]').prop('disabled', false);
                                                $('#orderConfirmButton').prop('disabled', false);
                                            } else if ($(this).val() == 0) {
                                                $('input[name="order[{{ data_get($val, 'order_product.id') }}][weight]').prop('disabled', false);
                                                $('#orderConfirmButton').prop('disabled', true);
                                            } else {
                                                $('input[name="order[{{ data_get($val, 'order_product.id') }}][weight]').prop('disabled', true);
                                                $('.min_weight_{{ data_get($val, 'order_product.id') }}').css('display', 'none');
                                                $('#orderConfirmButton').prop('disabled', false);
                                            }
                                        })
                                        $('input[name="order[{{ data_get($val, 'order_product.id') }}][weight]"]').on('change', function () {
                                            if ($(this).val() < $(this).data('base')) {
                                                $('.min_weight_{{ data_get($val, 'order_product.id') }}').css('display', 'block');
                                                $('#orderConfirmButton').prop('disabled', true);
                                            } else {
                                                $('.min_weight_{{ data_get($val, 'order_product.id') }}').css('display', 'none');
                                                $('#orderConfirmButton').prop('disabled', false);
                                            }
                                            if ($(this).val() == '') {
                                                $('input[name="order[{{ data_get($val, 'order_product.id') }}][quantity]').prop('disabled', false);
                                                $('#orderConfirmButton').prop('disabled', false);
                                            } else if ($(this).val() == 0) {
                                                $('input[name="order[{{ data_get($val, 'order_product.id') }}][quantity]').prop('disabled', false);
                                                $('#orderConfirmButton').prop('disabled', true);
                                            } else {
                                                $('input[name="order[{{ data_get($val, 'order_product.id') }}][quantity]').prop('disabled', true);
                                            }
                                        })
                                    </script>
                                    @include('warehouse.element.modal._modal_order', [
                                       'product' => data_get($val, 'order_product')
                                       ])
                                @empty
                                    @include('market.element._noContent')
                                @endforelse
                            </ul>
                        </div>
                    </form>
                    <div class="p-index__foot c-borderTop">
                        <div class="c-buttonArea__center">
                            <a class="c-button__gray c-button__wide c-button__round">リセット</a>
                            <button type="submit" class="c-button__round c-button__wide" id="orderConfirmButton">注文確認へ
                            </button>
                        </div>
                    </div>
            </div>
        </div>

        <script>
            $('#orderConfirmButton').on('click', function () {
                $('#selectOrderForm').submit();
            })
        </script>

        <div class="l-auto">
            <section class="p-index">
                <div class="p-index__head">
                    <div class="c-titleUnderline">
                        <span class="c-icon c-icon__item"></span>
                        <h2 class="c-text__lv3 c-text__weight--900">注文履歴</h2>
                        <div class="c-total f-a_end">
                            <?php $todaysDate = $today->format('Y/m/d');  ?>
                            <p class="c-text__lv6 c-text__main">本日の注文数</p>
                            <p class="c-text__lv1 c-text__main c-text__weight--900">{{ number_format($orders->count()) }}</p>
                            <p class="c-text__lv6 c-text__main">点</p>
                        </div>
                    </div>
                </div>
                <div class="p-index__body">
                    <div class="c-box__head f-wrap">
                        <form action="{{ route('warehouse.order.index') }}" method="GET" id="order_select_date">
                            <ul class="p-list__row">
                                <li>
                                    <div class="head">
                                        <p class="label">注文日検索</p>
                                    </div>
                                    <div class="c-input__center">
                                        <div class="c-input c-input--date">
                                            <input type="text" name="select_date" class="datepicker" autocomplete="off"
                                                   placeholder="2021/01/01" id="js-select-date"
                                                   value="{{ app('request')->input('select_date') ?? $todaysDate }}">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="head">
                                        <p class="label">検索</p>
                                    </div>
                                    <div class="c-input c-input__center">
                                        <div class="c-input">
                                            <input type="text" name="keyword" class="" autocomplete="off"
                                                   placeholder="キーワードを入力"
                                                   value="{{ app('request')->input('keyword') }}">
                                            <div class="c-icon__glass c-icon__w24">
                                            </div>
                                        </div>
                                        <div class="c-input">
                                            <div class="c-buttonArea">
                                                <!-- <button type="submit" class="c-button__min" style="height:35px;">絞り込む</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                        {{--<div class="c-buttonArea__end">
                           <a href="{{route('warehouse.order.create')}}" class="c-button c-button__round c-button__min">発注登録</a>
                        </div>--}}
                    </div>
                    <div class="c-box__body c-box">
                        <div class="p-scroll">
                            <div class="p-scroll__inner--900">
                                <table class="p-table">
                                    <thead>
                                    <th>
                                        @if(app('request')->input('sort_created_at') == 'up')
                                            <p class="label updown value_sort change" data-sort="order_date">注文日</p>
                                        @else
                                            <p class="label updown value_sort" data-sort="order_date">注文日</p>
                                        @endif
                                    </th>
                                    <th>
                                        <p class="label">注文顧客名</p>
                                    </th>
                                    <th>
                                        <p class="label">顧客電話番号</p>
                                    </th>
                                    <th>
                                        <p class="label">顧客メールアドレス</p>
                                    </th>
                                    <!-- <th>
                                       <p class="label">配送業者</p>
                                    </th> -->
                                    <th>
                                        @if(app('request')->input('sort_shipping_date') == 'up')
                                            <p class="label updown value_sort change" data-sort="shipping_date">発送日</p>
                                        @else
                                            <p class="label updown value_sort" data-sort="shipping_date">発送日</p>
                                        @endif
                                    </th>
                                    <th>
                                        <p class="label">注文数</p>
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $value)
                                        <tr data-href="{{ route('warehouse.order.detail', ['order' => $value->id]) }}">
                                            <td>
                                                <p class="c-text__lv6">{{ $value->getCreateDateAttribute() }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5 c-text__weight--900">{{ $value->getClientName() }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ $value->client->tel }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ $value->client->email }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv6">{{ $value->shipping_date->format('Y/m/d') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv4 c-text__main c-text__weight--900 data"
                                                   data-after="尾">{{ data_get($value, 'orders')->count() }}</p>
                                                {{--<p class="c-text__note c-number__insurance">追加処理+<strong class="c-text__main">16</strong></p>--}}
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
    </div>
    </div>
@endsection
