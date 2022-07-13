@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '集荷登録集荷一覧')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index">
                <div class="p-index__head">
                    <a class="c-icon__back" href="{{ route('solaseed.pickup.index') }}"></a>
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__pickup"></span>
                        集荷登録<small class="c-text__lv5 c-text__main">{{ data_get($industry, 'name') }}</small>
                        <small class="c-text__lv5 c-text__main"><span
                                class="c-text__unit">集荷予定時刻</span>{{ date('H:i') }}</small>
                    </p>
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            <span class="c-text__note c-text--right">配送箱数<br/>（済み/総数）</span>
                            {{ $count_pickup ?? 0 }} / {{ $count }}
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <a style="background-image:url({{ data_get($industry, 'image') }})" class="c-image__wide"></a>
                </div>
                <div class="p-index__foot">
                    <div class="p-sort">
                        <div class="c-input"></div>
                        <div class="c-input--select">
                            <select name="box_list" id="change_box">
                                <option value="">選択してください</option>
                                @foreach($boxes as $key => $box)
                                    <option value="{{ $box }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="c-input">
                            <input type="submit" class="c-button" id="change_box_size_btn" value="一括入力">
                        </div>
                    </div>
                    <div class="c-box">
                        <form action="{{ route('solaseed.pickup.packageUpdate') }}" method="post"
                              id="pickup_save_action_form">
                            @csrf
                            <table class="p-table__800 data-table__300" id="data-table">
                                <thead>
                                <th class="w_50">
                                    <p class="c-text__label">選択</p>
                                </th>
                                <th class="w_100">
                                    <p class="c-text__label">箱ID・商品QR</p>
                                </th>
                                <th class="">
                                    <p class="c-text__label">仮重量登録<small>産地計量</small></p>
                                </th>
                                <th class="">
                                    <p class="c-text__label">重量登録</p>
                                </th>
                                <th class="">
                                    <p class="c-text__label">採寸登録<small>高さ×幅×奥行き(cm)</small></p>
                                </th>
                                {{--<th class="">
                                   <p class="c-text__label">梱包商品</p>
                                </th>--}}
                                <th class="w_100">
                                    <p class="c-text__label">梱包数量</p>
                                </th>
                                </thead>
                                @foreach($packages as $key => $pack)
                                    <tbody>
                                    <?php
                                    $product = \App\Models\OrderProduct::find($key);
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="c-checkbox">
                                                <input type="checkbox" id="select_box{{ $loop->index }}"
                                                       class="select_box"
                                                       name="package[{{data_get($pack, 'id')}}][select]">
                                                <label for="select_box{{ $loop->index }}" class=""></label>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="c-text__lv5">{{ data_get($pack,'id') }}</p>
                                            <img
                                                src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemList', ['package' => $pack->id]) }}&size=50x50"
                                                alt="QRコード" style="margin-top: 2px;"/>
                                        </td>
                                        <td>
                                            <div class="c-input__end  c-input_100">
                                                <p>{{ data_get($pack, 'temporary_weight') }}</p>
                                                <span class="c-text__unit">kg</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="c-input__end  c-input_100">
                                                <input type="number" name="package[{{data_get($pack, 'id')}}][weight]"
                                                       placeholder="0.0"
                                                       value="{{ data_get($pack, 'loading_weight') }}">
                                                <span class="c-text__unit">kg</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="c-input__center">
                                                <div class="c-input c-input_50">
                                                    <input type="text" name="package[{{data_get($pack, 'id')}}][height]"
                                                           value="{{ data_get($pack, 'package_height') }}"
                                                           class="js-height_value">
                                                </div>
                                                <span>×</span>
                                                <div class="c-input c-input_50">
                                                    <input type="text" name="package[{{data_get($pack, 'id')}}][width]"
                                                           value="{{ data_get($pack, 'package_width') }}"
                                                           class="js-width_value">
                                                </div>
                                                <span>×</span>
                                                <div class="c-input c-input_50">
                                                    <input type="text" name="package[{{data_get($pack, 'id')}}][depth]"
                                                           value="{{ data_get($pack, 'package_depth') }}"
                                                           class="js-depth_value">
                                                </div>
                                            </div>
                                        </td>
                                        {{--<td>
                                           <p class="c-text__lv5"></p>
                                        </td>--}}
                                        <td>
                                            <p class="c-text__lv5">{{ data_get($pack, 'orders')->count() }}<span
                                                    class="c-text__unit">尾</span></p>
                                        </td>
                                    </tr>
                                    <script>
                                        $(function () {
                                            $('#change_box_size_btn').on('click', function (e) {
                                                e.preventDefault();
                                                change_box_size($('#change_box').val());
                                            })
                                        })

                                        function change_box_size(index) {
                                            console.log(index)
                                            $.get({
                                                url: "{{ route('solaseed.pickup.getBoxData') }}",
                                                data: {
                                                    'box_id': index,
                                                }
                                            }).done(function (data) {
                                                $('.select_box').each(function (index, element) {
                                                    console.log(index);
                                                    if ($(element).prop('checked')) {
                                                        $('.js-height_value').eq(index).val(data.height);
                                                        $('.js-width_value').eq(index).val(data.width);
                                                        $('.js-depth_value').eq(index).val(data.depth);
                                                    }
                                                })
                                            })
                                        }
                                    </script>
                                    </tbody>
                                @endforeach
                            </table>
                        </form>
                    </div>
                </div>
                <div class="p-index__foot">
                    <div class="c-buttonArea__end">
                        <button id="pickup_save_action" class="c-button__wide c-button__accent">保存する</button>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    <script>
        $('#pickup_save_action').on('click', function () {
            $(this).prop('disabled', true);
            $('#pickup_save_action_form').submit();
        })
    </script>
@endsection
