@extends('layouts.layout_market')
@section('page_class', 'l-page')
@section('content')
    <div class="l-container__960">
        <form action="{{ route('industry.market.temporaryWeightStore') }}" method="post">
            @csrf
            <div class="p-index">
                <div class="p-index__head">
                    <a href="{{ route('industry.market.packing') }}" class="c-icon__back"></a>
                    <h4 class="c-text c-text__lv3 c-text__weight--900">作業済み梱包箱一覧</h4>
                </div>
                <div class="p-index__body">
                    <div class="c-box">
                        <div class="c-box__body">
                            <div class="p-scroll__yaxis600">
                                <table class="p-table">
                                    <thead>
                                    <th class="w_100">
                                        <p class="c-text__label">箱QRコード</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">箱IDナンバー</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">作業日</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">注文業者</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">ステータス</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">重量入力</p>
                                    </th>
                                    {{-- <th>
                                       <p class="c-text__label">再印刷</p>
                                    </th> --}}
                                    </thead>
                                    <tbody>
                                    @forelse ($packages as $package)
                                        <tr>
                                            <td>
                                                <img
                                                    src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('itemList', ['package' => $package->id]) }}&size=50x50"
                                                    alt="QRコード" style=""/>
                                            </td>
                                            <td>
                                                <p class="c-text__lv4">{{ data_get($package, 'id') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv4">{{ date('Y/m/d') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv4">{{ data_get($package, 'm_business.name') }}</p>
                                            </td>
                                            <td>
                                                <p class="c-text__lv4">{{ \App\Models\Package::PACKAGE_STATUS_LIST[data_get($package, 'pack_status')] }}</p>
                                            </td>
                                            <td>
                                                <div class="c-input__end">
                                                    <div class="c-input">
                                                        <input type="text"
                                                               name="package[{{$package->id}}][temporary_weight]"
                                                               placeholder="0.0"
                                                               value="{{ data_get($package, 'temporary_weight') }}">
                                                    </div>
                                                    <span class="c-text__unit">kg</span>
                                                </div>
                                            </td>
                                            <td>
                                                {{-- <button class="c-button__line">印刷する</button> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        @include('market.element._noContent')
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-index__foot">
                    <div class="c-buttonArea__end">
                        <input type="submit" class="c-button__wide" value="保存する">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
