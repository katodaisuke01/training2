@extends('layouts.layout_warehouseUser')
@section('page_class', 'l-warehouse__user l-page l-page__shipping')
@section('title', '画像登録')

@section('content')
    @include('worker.element._headerUser')
    <div class="l-base">
        <main class="l-main">

            <form action="" class="c-full">

                <div class="p-page">
                    <div class="l">
                        <div class="l-auto">
                            <div class="c-full">

                                <div class="c-title">
                                    <p class="c-text__deep c-text__lv4 c-text__weight--700">
                                        画像登録をする画面 <small>PoC専用</small>
                                    </p>
                                </div>
                                <div class="c-box shadow">
                                    <div class="c-box__body">
                                        <!-- 表示情報がないとき -->
                                        @include('worker.element._noContent')
                                        <style>.p-noContent {
                                                display: none;
                                            }</style>

                                        <table class="p-table">
                                            <thead>
                                            <th class="w_100">
                                                <p class="c-text__label--head">撮影画像</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label--head">発注日</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label--head">配送エリア</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label--head">発注元</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label--head">配送先</p>
                                            </th>
                                            <th>
                                                <p class="c-text__label--head">梱包商品数</p>
                                            </th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="c-input__file">
                                                        <input type="file" id="file_1">
                                                        <label for="file_1"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">2022/01/31</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5 c-text__weight--700">関東Aエリア</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">リストランテペッシェ</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">123-4567 東京都中央区銀座</p>
                                                    <p class="c-text__lv6">1-2-3 東京銀座ビル1F</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__unit">合計<strong
                                                            class="c-text__lv3 c-text__user c-text__weight--900">12</strong>商品
                                                    </p>
                                                </td>
                                            </tr>
                                            <!-- 消す -->
                                            <tr>
                                                <td>
                                                    <div class="c-input__file">
                                                        <input type="file" id="file_2">
                                                        <label for="file_2"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">2022/01/31</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5 c-text__weight--700">関東Bエリア</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">個室居酒屋 ISARIBI</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">123-4567 東京都中央区銀座</p>
                                                    <p class="c-text__lv6">1-2-3 東京銀座ビル1F</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__unit">合計<strong
                                                            class="c-text__lv3 c-text__user c-text__weight--900">10</strong>商品
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="c-input__file">
                                                        <input type="file" id="file_3">
                                                        <label for="file_3"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">2022/01/31</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5 c-text__weight--700">関東Cエリア</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">欧風バル Fish&bird</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">123-4567 東京都中央区銀座</p>
                                                    <p class="c-text__lv6">1-2-3 東京銀座ビル1F</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__unit">合計<strong
                                                            class="c-text__lv3 c-text__user c-text__weight--900">8</strong>商品
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="c-input__file">
                                                        <input type="file" id="file_4">
                                                        <label for="file_4"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">2022/01/31</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv5 c-text__weight--700">九州エリア</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">漁火のいろり</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__lv6">123-4567 東京都中央区銀座</p>
                                                    <p class="c-text__lv6">1-2-3 東京銀座ビル1F</p>
                                                </td>
                                                <td>
                                                    <p class="c-text__unit">合計<strong
                                                            class="c-text__lv3 c-text__user c-text__weight--900">6</strong>商品
                                                    </p>
                                                </td>
                                            </tr>
                                            <!-- ここまで消す -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="p-buttonArea__bottom--fixed">
                    <div class="c-buttonArea__center">
                        <a href="javascript:history.back()" class="c-button__line c-button__sm">戻る</a>
                        <input type="submit" value="保存してステータス更新" class="c-button__user c-button__sm">
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection
