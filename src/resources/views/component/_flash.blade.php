<section class="p-flash">
  <ul class="p-list__flash">
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
      if($flash === 'successRegister'){
  ?>
    <li class="flash_success">
      <article class="link_float">
        <div class="data">
          <p>仮登録に成功しました</p>
        </div>
      </article>
    </li>
  <?php }};?>
  <?php 
    if(isset($_GET['flash'])){
      $flash = $_GET['flash'];
      if($flash === 'successRegisterFail'){
  ?>
    <li class="flash_error">
      <article class="link_float">
        <div class="data">
          <p>登録に失敗しました</p>
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
      if($flash === 'successSaveFail'){
  ?>
    <li class="flash_error">
      <article class="link_float">
        <div class="data">
          <p>保存に失敗しました</p>
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
      if($flash === 'successSendFail'){
  ?>
    <li class="flash_error">
      <article class="link_float">
        <div class="data">
          <p>送信に失敗しました</p>
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
  <?php 
    if(isset($_GET['flash'])){
      $flash = $_GET['flash'];
      if($flash === 'successWithdrawal'){
  ?>
    <li class="flash_success">
      <article class="link_float">
        <div class="data">
          <p>退会しました</p>
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
  </ul>
</section>