<section class="area_flash">
    <ul class="list_flash">
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successResetpassword'){

        ?>
        <li class="flash_success flash_fixed">
            <article class="link_float">
                <div class="data">
                    <p>SUCCESS TO SAVE A NEW PASSWORD</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successLogin'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>ログインしました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successLogout'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>ログアウトしました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successDeleteNews' || $flash === 'successDeleteClient' || $flash === 'successDelete'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>削除しました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successRegist'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>登録しました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successSave'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>保存しました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successSend'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>送信しました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        <?php
        if(isset($_GET['flash'])){
        $flash = $_GET['flash'];
        if($flash === 'successReset'){
        ?>
        <li class="flash_success">
            <article class="link_float">
                <div class="data">
                    <p>リセットしました</p>
                </div>
            </article>
        </li>
        <?php }};?>
        @if (session('flash_message'))
            <li class="flash_success">
                <article class="link_float">
                    <div class="data_flash">
                        <p>{{ session('flash_message') }}</p>
                    </div>
                </article>
            </li>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $message)
              <li class="flash_error">
                <article class="link_float">
                  <div class="data_flash">
                    <p>{{ $message }}</p>
                  </div>
                </article>
              </li>
            @endforeach
        @endif
    </ul>
</section>
