@extends('layouts.layout_solaseed')
@section('page_class', 'l-document l-page')
@section('title', '請求書')
@section('content')
    <div class="l-base">
        <main class="l-main">
            <div class="p-index l-container__960">
                <form action="">
                    <div class="p-index__head">
                        <a class="c-icon__back" href="{{ route('solaseed.document.index') }}"></a>
                        <div class="c-right">
                            <div class="c-buttonArea__end">
                                <button class="c-button__min c-button__neon">PDFダウンロード</button>
                                <button class="c-button__min c-button__neon">メール送信</button>
                            </div>
                        </div>
                    </div>
                    <div class="p-index__body">
                        <div class="c-box p-detail">
                            <div class="c-box__head f-a_center c-border__bottom">
                                <p class="c-text__lv2 c-text__weight--700">御請求書</p>
                                <div class="c-right">
                                    <p class="c-text__lv6"><span
                                            class="c-text__unit c-text--right">請求年月日</span>{{ date('Y年m月d日') }}</p>
                                    <p class="c-text__lv6"><span class="c-text__unit c-text--right">請求書番号</span>NB-21-0013
                                    </p>
                                </div>
                            </div>
                            <div class="c-box__body">
                                <div class="l">
                                    <div class="l-auto">
                                        <ul class="p-list">
                                            <li class="c-border__bottom--bold">
                                                <p class="c-text__lv4 c-text__weight--700">鹿児島県漁業協同組合（大根占支所）<span
                                                        class="c-text__unit">御中</span></p>
                                            </li>
                                            <li>
                                                <div class="data">
                                                    <p class="c-text__note">
                                                        毎々格別のお引立てを賜わり誠にありがとうございます。<br/>
                                                        つきましては、下記のとおり御請求申し上げますので、内容御確認の上、<br/>
                                                        取引銀行宛へお振込下さいますようお願い申し上げます
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="c-border__bottom f-a_center">
                                                <div class="head">
                                                    <p class="c-text__label">御請求額(税込)</p>
                                                </div>
                                                <div class="data c-right">
                                                    <p class="c-text__weight--700 c-text__lv3"><span
                                                            class="c-text__lv5">¥</span>18,557</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="l-fix__200">
                                        <div class="c-right">
                                            <img src="https://www.solaseedair.jp/img/header/logo_pc.png" alt="ロゴ"
                                                 width="150" class="logo">
                                            <div class="c-text c-mgt8">
                                                <p class="c-text__note">
                                                    〒144-0041 <br/>
                                                    東京都大田区羽田空港 3-5-10 <br/>
                                                    ユーティリティセンタービル10階
                                                </p>
                                                <p class="c-text__weight--700 c-text__lv6">
                                                    株式会社ソラシドエア <br/>
                                                    <span class="c-text__lv6">運送本部 新規事業推進室</span>
                                                </p>
                                                <p class="c-text__note">
                                                    TEL：03-5579-7154 <br/>
                                                    FAX：03-5579-7156
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-box__foot c-border__top--bold">
                                <table class="p-table">
                                    <thead>
                                    <th class="w_50">
                                        <p class="c-text__label">日付</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">概要</p>
                                    </th>
                                    <th class="w_40">
                                        <p class="c-text__label">数量</p>
                                    </th>
                                    <th>
                                        <p class="c-text__label">単価</p>
                                    </th>
                                    <th class="w_40">
                                        <p class="c-text__label">区分</p>
                                    </th>
                                    <th class="w_70">
                                        <p class="c-text__label">税抜金額</p>
                                    </th>
                                    <th class="w_60">
                                        <p class="c-text__label">消費税額</p>
                                    </th>
                                    <th class="w_80">
                                        <p class="c-text__label">税込金額</p>
                                    </th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="c-text__lv6">{{ date('m/d') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">
                                                貨物輸送　76㎏<br/>
                                                ■品目：鮮魚<br/>
                                                ■区間：宮崎⇒羽田<br/>
                                                ■輸送：大根占支所(鹿児島）⇒ 大田市場(FOODISON OTA)
                                            </p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">76</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">120</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">10<small>%</small></p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">9,120</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">912</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">10,032</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="c-text__lv6">{{ date('m/d') }}</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">
                                                貨物輸送　50㎏<br/>
                                                ■品目：鮮魚<br/>
                                                ■区間：宮崎⇒羽田<br/>
                                                ■輸送：大根占支所(鹿児島）⇒ 大田市場(FOODISON OTA)
                                            </p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6"">50</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">155</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6">10<small>%</small></p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">7,750</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">775</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">8,525</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <td>
                                        <p class="c-text__lv6">合　計</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <p class="c-text__lv5 c-text--right">16,870</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 c-text--right">1,687</p>
                                    </td>
                                    <td>
                                        <p class="c-text__lv5 c-text--right">18,557</p>
                                    </td>
                                    </tfoot>
                                </table>
                                <table class="p-table p-table__border">
                                    <thead>
                                    <th class=""></th>
                                    <th class="w_70"></th>
                                    <th class="w_60"></th>
                                    <th class="w_80"></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p class="c-text__label"> 8%税率対象合計</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">0</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">0</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">0</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="c-text__label"> 10%税率対象合計</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">16,870</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">1,687</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">18,557</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="c-text__label"> 非課税対象合計</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">0</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">0</p>
                                        </td>
                                        <td>
                                            <p class="c-text__lv6 c-text--right">0</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="c-box__foot c-mgt16">
                                <div class="l">
                                    <div class="l-auto">
                                        <div class>
                                            <p>
                                                <span class="c-text__unit">振込期日</span>
                                                <span class="c-text__lv5">2022</span>年<span class="c-text__lv5">4</span>月<span
                                                    class="c-text__lv5">30</span>日迄
                                            </p>
                                            <p>
                                                <span class="c-text__unit">振込先</span>
                                                <span class="c-text__lv6">三井住友銀行　鹿児島支店　(普)　7048831　カ)ソラシドエア</span>
                                            </p>
                                            <p>尚、振込手数料はお客様ご負担にてお願い申し上げます。</p>
                                        </div>
                                    </div>
                                    <div class="l-fix l-fix__100">
                                        <div class="c-stamp">
                                            <p class="c-text__unit">担当者</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
@endsection
