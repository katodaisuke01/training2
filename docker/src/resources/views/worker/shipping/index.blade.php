@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__shipping')
@section('title', '出荷チェック業務')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">
            <form action="" class="c-full">

                <div class="p-page">

                    <div class="c-box shadow">
                        <div class="c-box__body">
                            <div class="p-tab__area">
                                <div class="p-scroll">
                                    <div class="p-scroll__inner">
                                        <input type="text" name="pack_code" class="client-package-url" id="js-target-on"
                                        inputmode="none"
                                        style="position: absolute;top: -9999px; left: -9999px;">
                                        <ul class="c-list__tab">
                                            @foreach($areas as $area)
                                                <li class="area_{{ $area->id }} @if($loop->first) active @endif @if(!$area->exists_picked_package) checked @endif">
                                                    <p class="c-text__lv4 c-text__weight--700">{{ $area->name }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <ul class="c-list__content">
                                    @foreach($areas as $area)
                                        <li class="area_{{ $area->id }} @if($loop->first) show @endif @if(!$area->exists_picked_package) checked @endif">
                                            <div class="p-scroll">
                                                <div class="p-scroll__inner">
                                                    <table class="p-table">
                                                        <thead>
                                                            <th>
                                                                <p class="c-text__label">配送先</p>
                                                            </th>
                                                            <th>
                                                                <p class="c-text__label">配送先住所</p>
                                                            </th>
                                                            <th class="w_70">
                                                                <p class="c-text__label">配送箱数</p>
                                                            </th>
                                                            <th class="w_80">
                                                                <p class="c-text__label">チェック</p>
                                                            </th>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($area->clients as $client)
                                                            <tr>
                                                                <td>
                                                                    <p class="c-text__lv5 c-text__weight--900">{{ $client->name }}</p>
                                                                </td>
                                                                <td>
                                                                    <p class="c-text__lv6">
                                                                        {{ $client->zip_code }}<br/>
                                                                        {{ $client->prefecture_name }}
                                                                        {{ $client->address1 }}
                                                                        {{ $client->address2 }}
                                                                        {{ $client->address3 }}
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="c-text__lv4 c-text__weight--900 c-text__user">
                                                                        {{ $client->client_packages->count() }}<span
                                                                            class="c-text__unit">箱</span></p>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="client_id_{{ $client->id }} c-button__line--user c-button__check check-client-button @if(!$client->exists_picked_package) checked @endif"
                                                                        data-client-id="{{ $client->id }}">
                                                                        確認
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                @include('worker.element._buttonArea_bottom')
                <style>
                    .button_alert {
                        display: none;
                    }
                </style>
            </form>
        </main>
    </div>
    @include('worker.element.shipping_script')
@endsection
