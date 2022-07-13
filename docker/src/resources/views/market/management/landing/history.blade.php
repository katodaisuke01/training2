@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <form action="{{ route('admin.landing.history') }}" method="get" id="selectLandingForm" class="c-full">
            @csrf
            <section class="p-index p-store">
                <div class="p-index__head">
                    <div class="c-titleUnderline">
                        <h2 class="title">
                            <span class="c-icon c-icon__item"></span>
                            水揚げ登録 履歴
                        </h2>
                    </div>
                </div>
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="c-box__head">
                            <div class="p-sort">
                                <div class="c-input__center">
                                    <div class="c-input c-input--date">
                                        <input type="text" class="datepicker" name="landing_from_date"
                                               value="{{ isset($request['landing_from_date']) ? date('Y/m/d', strtotime($request['landing_from_date'])) : '' }}"
                                               placeholder="2020/01/01">
                                    </div>
                                    <span class="c-wave">〜</span>
                                    <div class="c-input c-input--date">
                                        <input type="text" class="datepicker" name="landing_to_date"
                                               value="{{ isset($request['landing_to_date']) ? date('Y/m/d', strtotime($request['landing_to_date'])) : '' }}"
                                               placeholder="2020/01/01">
                                    </div>
                                </div>
                                <div class="total f-a_center">
                                    <p class="c-text__unit">登録件数</p>
                                    <p class="c-text__weight--900 c-text__main c-text__lv2">{{ $stocks->count() }}<small
                                            class="c-text__note">件</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="c-box__body">
                            <table class="p-table data-table" id="data-table">
                                <thead>
                                <th>
                                    <p class="c-text__label">水揚日</p>
                                </th>
                                <th class="w_100">
                                    <p class="c-text__label">画像</p>
                                </th>
                                <th>
                                    <p class="c-text__label">商品名</p>
                                </th>
                                <th class="w_100">
                                    <p class="c-text__label">数量</p>
                                </th>
                                <th class="w_100">
                                    <p class="c-text__label">重量</p>
                                </th>
                                <th class="w_50">
                                </th>
                                </thead>
                                <tbody>
                                @foreach($stocks as $stock)
                                    <tr data-remodal-target="modal_item{{ $stock->id }}">
                                        <td>
                                            <p class="c-text__lv5">{{ date('Y/m/d', strtotime(data_get($stock, 'landing_date'))) }}</p>
                                        </td>
                                        <td>
                                            <div class="c-image__wide"
                                                 style="background-image:url({{ data_get($stock, 'order_product.image_path') ? Storage::disk('s3')->temporaryUrl(data_get($stock, 'order_product.image_path'), Carbon::now()->addMinute()) : '' }})"></div>
                                        </td>
                                        <td>
                                            <p class="c-text__lv5">{{ data_get($stock, 'order_product.title') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv4">{{ data_get($stock, 'total_quantity') ?? '--' }}<span
                                                    class="c-text__unit">尾</span></p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv4">{{ data_get($stock, 'total_weight') ?? '--' }}<span
                                                    class="c-text__unit">g</span></p>
                                        </td>
                                        <td>
                                            <div class="c-icon__w16 c-icon__arrow"></div>
                                        </td>
                                    </tr>
                                    @include('market.element.modal._modal_item', [
                                       'stock' => $stock
                                    ])
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
    </form>
    </div>


    <script>
        $(function () {
            $('input[name="landing_from_date"]').on('change', function () {
                $('#selectLandingForm').submit();
            })
            $('input[name="landing_to_date"]').on('change', function () {
                $('#selectLandingForm').submit();
            })
        })
    </script>
@endsection
