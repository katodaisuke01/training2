@extends('layouts.layout_marketManagement')
@section('content')
    <div class="l-container l-page">
        <section class="p-index">
            <div class="p-index__head">
                <h2 class="title">
                    <span class="c-icon c-icon__checked"></span>
                    帳票管理　<small>納品書・請求書の発行</small>
                </h2>
                <div class="c-right">
                    <div class="total f-wrap">
                        <form action="{{ route('admin.document.index') }}" method="GET" id="document_select_date">
                            <div class="c-input">
                                <div class="c-input f-a_center">
                                    <div class="c-input c-input--date c-input__150">
                                        <input type="text" name="select_date_start" class="datepicker"
                                               autocomplete="off" placeholder="2021/01/01" id="js-start-documentDate"
                                               value="{{ app('request')->input('select_date_start') ?? '' }}">
                                    </div>
                                    <span class="c-wave">〜</span>
                                    <div class="c-input c-input--date c-input__150">
                                        <input type="text" name="select_date_end" class="datepicker" autocomplete="off"
                                               placeholder="2021/01/01" id="js-end-documentDate"
                                               value="{{ app('request')->input('select_date_end') ?? '' }}">
                                    </div>
                                </div>
                                {{--<div class="c-input c-input--select c-input__100">
                                   <select name="document_type" id="document_type">
                                      <option>すべて</option>
                                      <option>納品書</option>
                                      <option>請求書</option>
                                   </select>
                                </div>--}}
                            </div>
                        </form>
                        <p class="number c-text__lv2 c-text__main" data-unit="件">{{ $total_orders }}</p>
                    </div>
                </div>
            </div>
            <div class="p-index__body">
                <ul class="p-list__content">
                    <li class="c-content show c-box">
                        <div class="p-scroll p-scroll__yaxis600">
                            <div class="p-scroll__inner">
                                <table class="p-table">
                                    <thead>
                                    <th>
                                        <label class="">注文日</label>
                                    </th>
                                    <th>
                                        <label class="">注文事業者</label>
                                    </th>
                                    <th>
                                        <label class="">希望配送日</label>
                                    </th>
                                    <th>
                                        <label class="">注文個数</label>
                                    </th>
                                    <th>
                                        <label class="stage1">納品書の発行</label>
                                    </th>
                                    <th>
                                        <label class="stage1">請求書の発行</label>
                                    </th>
                                    {{-- <th></th> --}}
                                    </thead>
                                    <tbody>
                                    @foreach($order_business_groups as $value)
                                        <tr>
                                            <td>
                                                <p class="c-text__lv6 data">{{ $value->getCreateDateAttribute() }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv4 c-text__weight--700 data">{{ $value->getBusinessName() }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv5 data">{{ $value->shipping_date->format('Y/m/d') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv3 c-text__main c-text__weight--900 number"
                                                   data-after="個">{{ $value->total_quantity }}</p>
                                            </td>
                                            <td>
                                                @if(data_get($value, 'process_complete'))
                                                    <a href="{{ route('admin.document.document', ['businessGroup' => $value->id]) }}"
                                                       class="c-button__line c-button__min">納品書の確認</a>
                                                @else
                                                    <a href="#" class="c-button__line c-button__min" disabled>梱包中</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.document.invoice', ['businessGroup' => $value->id]) }}"
                                                   class="c-button__line c-button__min">確認する</a>
                                            </td>
                                            {{-- <td>
                                               <span class="c-icon icon_next"></span>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>


        </section>
    </div>
@endsection
