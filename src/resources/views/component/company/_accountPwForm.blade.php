
<form action="" name="" class="p-form">
  <div class="p-form__body">
    <div class="c-concave">
      <ul class="p-list">
        <li>
          <div class="head required">
            <p>新しいパスワード</p>
          </div>
          <div class="body">
            <div class="c-input__300">
              <input type="password" required placeholder="半角英数大小文字を含めてください" value="">
            </div>
          </div>
          <p class="c-text__error">パスワードには必ず半角英数大小文字を含めてください</p>
        </li>
        <li>
          <div class="head required">
            <p>新しいパスワード（確認用）</p>
          </div>
          <div class="body">
            <div class="c-input__300">
              <input type="password" required placeholder="半角英数大小文字を含めてください" value="">
            </div>
          </div>
          <p class="c-text__error">パスワードが一致しません</p>
        </li>
      </ul>
    </div>
  </div>
  <div class="p-form__foot">
    <div class="c-buttonArea__end">
      <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        @if(strstr($url,'company'))
          <a href="{{ route('companyAccount') }}" class="c-button__gray c-button__min">戻る</a>
          <a href="{{ route('companyAccount') }}?flash=successSave" class="c-button">保存する</a>
        @elseif(strstr($url,'admin'))
          <a href="{{ route('adminCompanyAccount') }}" class="c-button__gray c-button__min">戻る</a>
          <a href="{{ route('adminCompanyAccount') }}?flash=successSave" class="c-button">保存する</a>
        @endif
      <!-- <input class="c-button" type="submit" value="保存する"> -->
    </div>
  </div>
</form>