<div class="p-buttonArea__bottom--fixed">
    <?php
    $url = $_SERVER['REQUEST_URI'];
    ?>
    <div class="c-buttonArea__wrap">
        @if(strstr($url,'handle'))
            <a href="{{ route('worker.accept.sort.index') }}" class="c-button__line c-button__sm">エリア・店舗別仕分け業務へ</a>
        @elseif(strstr($url,'sort'))
            <a href="{{ route('worker.picking.index') }}" class="c-button__line c-button__sm">摘み取り業務へ</a>
        @elseif(strstr($url,'picking'))
            <a href="{{ route('worker.shipping.index') }}" class="c-button__line c-button__sm">出荷チェック業務へ</a>
            <button href="{{ route('worker.shipping.index') }}" class="c-button button-store-picking">保存して次の摘み取りへ</button>
        @endif
        {{-- <a data-remodal-target="modal_report" class="c-button__gray c-button__min button_alert">商品の異常報告を行う</a> --}}
        {{--  <a href="{{ route('worker.home') }}" class="c-button__line--user c-button__wide">トップへ戻る</a> --}}
    </div>
</div>
