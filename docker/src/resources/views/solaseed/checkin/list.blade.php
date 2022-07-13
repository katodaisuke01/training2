@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', 'チェックイン登録 詳細')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <form action="{{ route('solaseed.checkin.create_history') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.checkin.index') }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__checkin"></span>
                            チェックイン登録
                            <small class="c-text__lv5 c-text__main">{{ data_get($business, 'name') }}</small>
                            <small class="c-text__lv5 c-text__main"><span
                                    class="c-text__unit">配送予定時刻</span>{{ date('Y/m/d H:i') }}</small>
                        </p>
                        <div class="c-right">
                            <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                                <span class="c-text__lv5 c-text__main">生鮮</span>{{ $packages->count() }}<span
                                    class="c-text__lv5 c-text__accent">箱</span>
                            </p>
                        </div>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box">
                            <table class="p-table__1100 data-table__300" id="data-table">
                                <thead>
                                <th class="">
                                    <p class="c-text__label">箱ID</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">注文業社</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">種別</p>
                                </th>
                                <th>
                                    <p class="c-text__label">重量</p>
                                </th>
                                <th class="unsort">
                                    <p class="c-text__label">配送先住所</p>
                                </th>
                                <th class="unsort w_120">
                                    <p class="c-text__label">確認</p>
                                </th>
                                <th class="unsort">
                                </th>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <td>
                                            <p class="c-text__lv6">{{ data_get($package, 'id') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ data_get($package, 'm_business.name') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">生鮮</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ data_get($package, 'cast_temporary_weight_value') }}
                                                <span class="c-text__unit">kg</span></p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">{{ data_get($package, 'm_business.delivery_address') }}</p>
                                        </td>
                                        <td>
                                            @if(data_get($package, 'pack_status') == \App\Models\Package::TYPE_CHECKED_IN )
                                                <a class="c-button__check c-button__min c-button__sub checked" disabled>済</a>
                                            @else
                                                <a class="c-button__check c-button__min c-button__sub"
                                                   href="{{ route('solaseed.checkin.checked_in', ['package' => $package]) }}">チェックイン</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="c-button__line c-button__min"
                                               href="{{ route('solaseed.transport.detail', ['package' => $package, 'from' => 'checkin']) }}">箱の内容確認</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="c-full f-wrap">
                                @if(!$checkin_history)
                                    <div class="c-input__image c-right">
                                        <input name="checkin_photo" type="file" id="photo">
                                        <label for="photo"></label>
                                    </div>
                                    <div class="c-text">
                                        <p class="c-text__lv5 c-text__main">置き配完了画像の登録</p>
                                        <p class="c-text__main">全ての貨物をチェックインの上、<br/>置き配完了証明の写真登録を行ってください</p>
                                        <div class="c-buttonArea">
                                            <label for="photo" class="c-button__lg c-button__sub">画像登録を行う</label>
                                        </div>
                                    </div>
                                @else
                                    <div class="c-input__image c-right">
                                        <p class="c-text__lv5 c-text__main">置き配完了画像</p>
                                        <div class="c-image"
                                             style="background-image:url({{ data_get($checkin_history, 'image') }})"></div>
                                    </div>
                                @endif
                            </div>
                            {!! Form::hidden('m_business_id', data_get($package, 'm_business_id')) !!}
                        </div>
                    </div>
                    <div class="p-index__foot">
                        <div class="c-buttonArea__end">
                            <input type="submit" class="c-button__accent c-button__wide" value="保存する">
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
