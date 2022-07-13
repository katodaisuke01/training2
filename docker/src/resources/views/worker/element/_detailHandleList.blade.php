<div class="l-auto c-arrow__left">
    <div class="c-full">

        <div class="c-title">
            <p class="c-text__deep c-text__lv4 c-text__weight--700">
                注文詳細
                <small class="c-text__deep c-text__lv6 c-text__weight--700">次の箱QRコード読み込みで入荷内容確認済みとなります</small>
            </p>
            <div class="c-right f-a_center">
                <p class="c-text__lv3 c-text__weight--900 c-text__deep order_handle_count">
                    <!-- 読み込みで表示 -->
                </p>
            </div>
        </div>
        <div class="c-box shadow">
            <div class="c-box__body">
                <table class="p-table">
                    <thead>
                    <th>
                        <p class="c-text__label--head">商品画像</p>
                    </th>
                    <th>
                        <p class="c-text__label--head">商品名称</p>
                    </th>
                    <th>
                        <p class="c-text__label--head">計量値</p>
                    </th>
                    <th>
                        <p class="c-text__label--head"><!-- せり価格<br/> -->販売価格</p>
                    </th>
                    <th>
                        <p class="c-text__label--head">注文顧客</p>
                    </th>
                    <th>
                        <p class="c-text__label--head">確認</p>
                    </th>
                    <th>
                        <p class="c-text__label--head">選択</p>
                    </th>
                    </thead>
                    <tbody id="js-insert-handleList">
                    <!-- 読み込みで表示 -->
                    </tbody>
                </table>
                <!-- 表示情報がないとき -->
                @include('worker.element._noContent')
            </div>
        </div>

    </div>
</div>
