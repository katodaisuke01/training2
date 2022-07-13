<section class="remodal modal_camera" data-remodal-id="modal_camera" data-remodal-options="hashTracking:false">
    <div class="p-modal" id="shutter">
        <!-- ↑id="shutter"で撮影だが計量→数値入力されたら自動で撮影が行われ得る使用想定 -->
        <div class="p-modal__body">
            <video id="camera" width="100%" height="500"></video>
        </div>
        <div class="p-modal__foot">
            <audio id="se" preload="auto"></audio>
            <div class="c-buttonArea__center">
                <!-- <button data-remodal-action="close" class="c-button c-button__round c-button__wide c-button__line" type="button" id="stop_video" >閉じる</button> -->
                <button type="button" class="c-button c-button__round c-button__wide" data-remodal-action="close"
                        id="shutter">シャッター
                </button>
            </div>
        </div>
</section>
