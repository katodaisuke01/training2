@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '荷主管理')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">

            <div class="p-index">
                <div class="p-index__head">
                    <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                        <span class="c-icon__partner"></span>
                        荷主管理
                    </p>
                    <div class="c-buttonArea">
                        <a href="{{ route('solaseed.partner.create') }}" class="c-button__min c-button__neon">新規登録</a>
                    </div>
                    <div class="c-right">
                        <p class="c-text__weight--900 c-text__lv1 c-text__accent">
                            <span class="c-text__lv5 c-text__main">登録件数</span>
                            12<span class="c-text__lv5 c-text__accent">件</span>
                        </p>
                    </div>
                </div>
                <div class="p-index__body">
                    <div class="c-box">
                        <table class="p-table__1100 data-table" id="data-table">
                            <thead>
                            <th>
                                <p class="c-text__label">登録日</p>
                            </th>
                            {{--<th>
                               <p class="c-text__label">種別</p>
                            </th>--}}
                            <th>
                                <p class="c-text__label">荷主名称</p>
                            </th>
                            <th>
                                <p class="c-text__label">担当者名</p>
                            </th>
                            <th>
                                <p class="c-text__label">配送先住所</p>
                            </th>
                            <th>
                                <p class="c-text__label">メールアドレス</p>
                            </th>
                            <th>
                                <p class="c-text__label">電話番号</p>
                            </th>
                            <th>
                                <p class="c-text__label">注文回数</p>
                            </th>
                            <th>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($industry_groups->concat($m_business) as $partner)
                                <tr data-href="{{ route('solaseed.partner.detail', ['type' => App\Models\Partner::getType($partner['vary']), 'partner' => $partner]) }}">
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['created_at'] }}</p>
                                    </td>
                                    {{--<td>
                                       <p class="c-text__lv6">{{ $partner['vary'] }}</p>
                                    </td>--}}
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['name'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['responsible_name'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['address'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['email'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['tel'] }}</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv6">{{ $partner['order_times'] }}</p>
                                    </td>
                                    <td>
                                        <div class="c-icon__w16 c-icon__arrow"></div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
