@extends('layouts.layout_solaseed')
@section('page_class', 'l-detail l-page')
@section('title', '貨物情報詳細')
@section('content')
    <div class="l-base">
        @include('solaseed.element._aside')
        <main class="l-main">
            <div class="p-index l-container__600">
                <form action="">
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.transport.index') }}"></a>
                        <p class="c-text__lv3 c-text__main c-text__weight--900 c-title">
                            <span class="c-icon__pickup"></span>
                            貨物情報<small class="c-text__lv5 c-text__main">詳細</small>
                        </p>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box p-detail">
                            <div class="p-detail__head">
                                <div class="l">
                                    <div class="l-auto">
                                        <ul class="p-list__row">
                                            <li>
                                                <p class="c-text__lv4">株式会社フーディソン<span
                                                        class="c-text__unit">様からのご注文</span></p>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">集荷先</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv6">鹿児島県漁協 佐多支所</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">航空機番号</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv6">NH000001</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="head">
                                                    <p class="c-text__label">種別</p>
                                                </div>
                                                <div class="data">
                                                    <p class="c-text__lv6">冷凍</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-fix__190">
                                        <div class>
                                            <p class="c-text__unit">注文日時<span
                                                    class="c-text__lv6 c-text--right">{{ date('Y/m/d H:i') }}</span></p>
                                            <p class="c-text__unit">送状番号<span
                                                    class="c-text__lv6 c-text--right">1234567</span></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="p-detail__body">
                                <div class="bg-gray">
                                    <ul class="p-list__row">
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">貨物室確保</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">未確保or確保済み</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">貨物サイズ<small>高さ×幅×奥行き(cm)</small></p>
                                            </div>
                                            <div class="data">
                                                <div class="c-input__center">
                                                    <p class="c-text__lv5">50.0</p>
                                                    <span>×</span>
                                                    <p class="c-text__lv5">50.0</p>
                                                    <span>×</span>
                                                    <p class="c-text__lv5">50.0</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">仮重量登録</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">50.0<span class="c-text__unit">kg</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">航空機積載時重量</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv5">60.0<span class="c-text__unit">kg</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="head">
                                                <p class="c-text__label">物流費</p>
                                            </div>
                                            <div class="data">
                                                <p class="c-text__lv4">1,234
                                                    <!-- 現在の物流費は115 円/kgなのでその計算で航空機積載時重量に対応して表示 -->
                                                    <span class="c-text__unit">円</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-detail__foot">
                                <table class="p-table data-table__300" id="data-table">
                                    <thead>
                                    <th>
                                        <p class="c-text__label">商品名</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">計量値</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">異常報告</p>
                                    </th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="c-text__lv5">アジ（真鯵）</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv5">2<span class="c-text__unit">kg</span></p>
                                        </td>
                                        <td>
                                            <p class="c-text">—</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="c-text__lv5">サバ（真鯖）</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv5">1<span class="c-text__unit">kg</span></p>
                                        </td>
                                        <td>
                                            <p class="c-text">—</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="c-text__lv5">ヒラメ</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv5">—<span class="c-text__unit">kg</span></p>
                                        </td>
                                        <td>
                                            <p class="c-text">商品未着</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="p-index__foot">
                        <div class="c-buttonArea__end f-a_end">
                            <a href="{{ route('solaseed.transport.index') }}"
                               class="c-button__gray c-button__min">戻る</a>
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
