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
                    <form action="{{ route('warehouse.order.store') }}" method="POST" class="p-register__form">
                        @csrf
                        <div class="p-index__body c-box shadow">
                            <div class="c-box__head">
                                <p class="c-text__main c-text__lv4 c-text__weight--700">注文情報登録</p>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-fix l-fix__500 f-col">
                                        <ul class="p-list__wrap">
                                            <li>
                                                <div class="head">
                                                    <p class="label required">発送日選択</p>
                                                </div>
                                                <input type="hidden" name="shipping_date"
                                                       value="{{old('shipping_date')}}" id="shipping_date">
                                                <div id="calendar" class="p-calendar"></div>
                                                @if ($errors->has('shipping_date'))
                                                    <p class="c-text__error" style="display:inline-block;">
                                                        {{ __($errors->first('shipping_date')) }}
                                                    </p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">カテゴリー</p>
                                                </div>
                                                <div class="c-input_250 c-input--select">
                                                    <select id="m-categories-select">
                                                        <option value>選択してください</option>
                                                        @foreach($categoryList as $value)
                                                            <option
                                                                value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            <script>
                                                $("#m-categories-select").change(function () {
                                                    let id = $(this).val();
                                                    let data = @json($fishCategories);
                                                    $('#m-fish-categories-select').empty();
                                                    $('#products-select').empty();
                                                    $('#products-select').append('<option value>商品名を選択</option>');
                                                    if (id == '') {
                                                        $('#m-fish-categories-select').append('<option value>魚種を選択</option>');
                                                    } else {
                                                        $('#m-fish-categories-select').append('<option value>選択してください</option>');
                                                        $.each(data, function (index, value) {
                                                            if (value['m_category_id'] == id) {
                                                                html = `<option value="${value.id}">${value.name}</option>`;
                                                                $('#m-fish-categories-select').append(html);
                                                            }
                                                        })
                                                    }
                                                })
                                            </script>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">魚種</p>
                                                </div>
                                                <div class="c-input_200 c-input--select">
                                                    <select id="m-fish-categories-select">
                                                        <option value>魚種を選択</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <script>
                                                $("#m-fish-categories-select").change(function () {
                                                    let id = $(this).val();
                                                    let data = @json($products);
                                                    $('#products-select').empty();
                                                    if (id == '') {
                                                        $('#products-select').append('<option value>商品名を選択</option>');
                                                    } else {
                                                        $('#products-select').append('<option value>選択してください</option>');
                                                        $.each(data, function (index, value) {
                                                            if (value['m_fish_category_id'] == id) {
                                                                html = `<option value="${value.id}">${value.title}</option>`;
                                                                $('#products-select').append(html);
                                                            }
                                                        })
                                                    }
                                                })
                                            </script>
                                            <li class="full">
                                                <div class="head">
                                                    <p class="label required">商品名</p>
                                                </div>
                                                <div class="c-input c-input_full c-input--select">
                                                    <select name="product_id" value="{{old('product_id')}}"
                                                            id="products-select">
                                                        <option value>商品名を選択</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('product_id'))
                                                    <p class="c-text__error" style="display:inline-block;">
                                                        {{ __($errors->first('product_id')) }}
                                                    </p>
                                                @endif
                                            </li>
                                            <script>
                                                $('#products-select').on('change', function () {
                                                    let url = '/warehouse/order/getPrice';
                                                    let data = $(this).val();
                                                    $.ajax({
                                                        type: "get", //HTTP通信の種類
                                                        url: url,
                                                        dataType: "json",
                                                        data: {
                                                            'product_id': data,
                                                        }
                                                    })
                                                        //通信が成功したとき
                                                        .done((res) => {
                                                            console.log(res);
                                                            if (res) {
                                                                var price = res.toLocaleString() + '<span class="c-text__unit">円/個</span>';
                                                            } else {
                                                                var price = '0' + '<span class="c-text__unit">円/個</span>'
                                                            }
                                                            $('#product_price').text('');
                                                            $('#product_price').prepend(price);
                                                            if ($('input[name="quantity"]').val() != '') {
                                                                var sumPrice = (Number(res) * Number($('input[name="quantity"]').val())).toLocaleString() + '<span class="c-text__unit">円/個</span>';
                                                                $('#sum_price').text('');
                                                                $('#sum_price').prepend(sumPrice);
                                                            }

                                                            $('input[name="quantity"]').on('change', function () {
                                                                var sumPrice = (Number(res) * Number($(this).val())).toLocaleString() + '<span class="c-text__unit">円/個</span>';
                                                                $('#sum_price').text('');
                                                                $('#sum_price').prepend(sumPrice);
                                                            })
                                                        })
                                                })
                                            </script>
                                            <li>
                                                <div class="head">
                                                    <p class="label">価格<small style="color:#EB7091">自動表示</small></p>
                                                </div>
                                                <p class="c-text__lv4" id="product_price">0<span class="c-text__unit">円/個</span>
                                                </p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label">在庫数<small style="color:#EB7091">自動表示</small></p>
                                                </div>
                                                <div class="c-input__100 c-input readonly" data-after="個">
                                                    <input type="number" name="stock" placeholder="0" readonly
                                                           value="100">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label">合計価格<small style="color:#EB7091">自動表示</small></p>
                                                </div>
                                                <p class="c-text__lv4" id="sum_price">0<span
                                                        class="c-text__unit">円/個</span></p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">注文数</p>
                                                </div>
                                                <div class="c-input c-input__100" data-after="個">
                                                    <input type="number" name="quantity" placeholder="0"
                                                           value="{{old('quantity')}}">
                                                </div>
                                                @if ($errors->has('quantity'))
                                                    <p class="c-text__error" style="display:inline-block;">
                                                        {{ __($errors->first('quantity')) }}
                                                    </p>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="label required">加工・締め</p>
                                                </div>
                                                <div class="c-input--select c-input__200">
                                                    <select>
                                                        @foreach($processCategoryList as $value)
                                                            <option
                                                                value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="l-auto" id="client_information">
                                        <p>注文者情報</p>
                                        <div class="bg-gray">
                                            <ul class="p-list">
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">注文顧客選択</p>
                                                    </div>
                                                    <div class="c-input__full c-input--select">
                                                        <select name="client_id" value="{{old('client_id')}}"
                                                                id="js-client-selector">
                                                            <option value="new_client" id="new_client">新規顧客を作成する
                                                            </option>
                                                            <option disabled>注文顧客名を選択</option>
                                                            @foreach($clients as $key => $value)
                                                                @if(!empty(old('client_id')))
                                                                    <option value='{{ $value->id }}'
                                                                            @if($value->id === (int)old('client_id')) selected @endif>{{ $value->name }}</option>
                                                                @elseif($value->id == $client_id)
                                                                    <option value='{{ $value->id }}'
                                                                            selected="selected">{{ $value->name }}</option>
                                                                @else
                                                                    <option
                                                                        value='{{ $value->id }}'>{{ $value->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </li>
                                                <li class="f-column client_name_input" style="display:none;">
                                                    <div class="head">
                                                        <p class="label">注文顧客名</p>
                                                    </div>
                                                    <div class="c-input c-input__full">
                                                        <input type="text" name="client_name" placeholder="リストランテ銀座"
                                                               value="{{old('client_name')}}" id="client_name">
                                                    </div>
                                                    @if ($errors->has('client_name'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('client_name')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">郵便番号</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__100">
                                                            <input type="number" name="zipcode" placeholder="1234567"
                                                                   value="{{old('zipcode')}}" id="zipcode">

                                                        </div>
                                                        <!-- <button class="c-button__min">自動入力</button> -->
                                                    </div>
                                                    @if ($errors->has('zip_code'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('zip_code')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">都道府県</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__200 c-input--select">
                                                            <select name="prefecture_name"
                                                                    value="{{old('prefecture_name')}}" placeholder="東京都"
                                                                    id="prefecture">
                                                                <option value>都道府県を選択</option>
                                                                @foreach($prefs as $key => $value)
                                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="c-input c-input__200" style="display: none">
                                                            <input type="text" placeholder="東京都" value=""
                                                                   id="prefecture">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('prefecture_name'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('prefecture_name')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">市区町村</p>
                                                    </div>
                                                    <div class="c-input c-input__full">
                                                        <input type="text" name="address1" placeholder="中央区銀座"
                                                               value="{{old('address1')}}" id="address1">
                                                    </div>
                                                    @if ($errors->has('address1'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('address1')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">番地</p>
                                                    </div>
                                                    <div class="c-input c-input__full">
                                                        <input type="text" name="address2" placeholder="1-1-1"
                                                               value="{{old('address2')}}" id="address2">
                                                    </div>
                                                    @if ($errors->has('address2'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('address2')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">建物名など</p>
                                                    </div>
                                                    <div class="c-input c-input__full">
                                                        <input name="address3" type="text" placeholder="銀座ビル101"
                                                               value="{{old('address3')}}" id="address3">
                                                    </div>
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">電話番号</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__full ">
                                                            <input type="tel" name="tel" placeholder="0312345678"
                                                                   value="{{old('tel')}}" id="telephone">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('tel'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('tel')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">メールアドレス</p>
                                                    </div>
                                                    <div class="c-input">
                                                        <div class="c-input c-input__full ">
                                                            <input type="email" name="email"
                                                                   placeholder="sample@example.com"
                                                                   value="{{old('email')}}" id="email">
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('email')) }}
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="f-column">
                                                    <div class="head">
                                                        <p class="label">配送業者</p>
                                                    </div>
                                                    <div class="c-input__full c-input--select">
                                                        <select name="delivery_partnar" value="" id="delivery_partnar">
                                                            <option value>配送業者を選択</option>
                                                            @foreach ($delivery_partnars as $key => $value)
                                                                <option
                                                                    value="{{ $value->id }}">{{ $value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('delivery_partnar'))
                                                        <p class="c-text__error" style="display:inline-block;">
                                                            {{ __($errors->first('delivery_partnar')) }}
                                                        </p>
                                                    @endif
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
                                <button type="submit" class="c-button__round c-button__white c-button__wide">保存する
                                </button>
                            <!-- <a href="{{route('warehouse.order.detail')}}?flash=successSave" class="c-button__round c-button__white c-button__wide">保存する</a> -->
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
@endsection
