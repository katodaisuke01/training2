
<form action="" name="" class="p-form">
  <div class="p-form__body">
    <div class="c-concave">
      <ul class="p-list">
        <li>
          <div class="head">
            <p>利用ステータス</p>
          </div>
          <div class="body">
            <div class="c-radio c-switch">
              <input type="radio" name="use" id="use_1">
              <label for="use_1">利用中</label>
              <input type="radio" name="use" id="use_2" checked>
              <label for="use_2">停止中</label>
            </div>
          </div>
        </li>
        <li>
          <div class="head required">
            <p>氏名</p>
          </div>
          <div class="body">
            <div class="c-input">
              <div class="c-input__150">
                <input type="text" placeholder="姓" value="">
              </div>
              <div class="c-input__150">
                <input type="text" placeholder="名" value="">
              </div>
            </div>
          </div>
          <p class="c-text__error">この項目には必ず入力してください</p>
        </li>
        <li>
          <div class="head">
            <p>性別</p>
          </div>
          <div class="body">
            <div class="c-radio">
              <input type="radio" name="gender" id="gender_1" checked>
              <label for="gender_1">男性</label>
              <input type="radio" name="gender" id="gender_2">
              <label for="gender_2">女性</label>
              <input type="radio" name="gender" id="gender_3">
              <label for="gender_3">その他</label>
            </div>
          </div>
        </li>
        <li>
          <div class="head required">
            <p>メールアドレス</p>
          </div>
          <div class="body">
            <div class="c-input--full">
              <input type="email" placeholder="info@mail.com" value="">
            </div>
            <p class="c-text__error">この項目には必ず入力してください</p>
          </div>
        </li>
        <li>
          <div class="head optional">
            <p>備考</p>
          </div>
          <div class="body">
            <div class="c-input--full">
              <textarea name="" placeholder="記載事項があれば入力してください" cols="30" rows="10"></textarea>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="p-form__foot">
    <div class="c-buttonArea__end">
      <a data-remodal-target="modal_delete" class="c-button__gray c-button__min">削除する</a>
      <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        @if(strstr($url,'company'))
          <a href="{{ route('companyAccountPw') }}" class="c-button__line c-button__min">パスワード設定</a>
          <a href="{{ route('companyAccount') }}?flash=successSave" class="c-button">保存する</a>
        @elseif(strstr($url,'admin'))
          <a href="{{ route('adminCompanyAccountPw') }}" class="c-button__line c-button__min">パスワード設定</a>
          <a href="{{ route('adminCompanyAccount') }}?flash=successSave" class="c-button">保存する</a>
        @endif
      <!-- <input class="c-button" type="submit" value="保存する"> -->
    </div>
  </div>
</form>