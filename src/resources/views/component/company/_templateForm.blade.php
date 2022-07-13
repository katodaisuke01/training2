<form action="" name="" class="p-form">
  <div class="p-form__body">
    <div class="c-concave">
      <ul class="p-list__wrap">
        <li>
          <div class="head">
            <p>利用ステータス</p>
          </div>
          <div class="body">
            <div class="c-radio c-switch">
              <input type="radio" name="use" id="1">
              <label for="1">利用中</label>
              <input type="radio" name="use" id="2" checked>
              <label for="2">停止中</label>
            </div>
          </div>
        </li>
        <li>
          <div class="head">
            <p>テンプレートジャンル</p>
          </div>
          <div class="body">
            <div class="c-input__select">
              <select name="">
                <option value="">スカウト</option>
                <option value="">選考</option>
                <option value="">お見送り</option>
                <option value="">内定連絡</option>
                <option value="">その他</option>
              </select>
            </div>
          </div>
        </li>
        <li class="c-full">
          <div class="head required">
            <p>テンプレートタイトル</p>
          </div>
          <div class="body">
            <div class="c-input--full">
              <input type="text" placeholder="テンプレートタイトルを入力してください" value="">
            </div>
            <p class="c-text__error">この項目には必ず入力してください</p>
          </div>
        </li>
        <li class="c-full">
          <div class="head required">
            <p>テンプレート内容</p>
          </div>
          <div class="body">
            <div class="c-input--full">
              <textarea name="" placeholder="テンプレートを入力してください" cols="30" rows="10">◯◯様

はじめまして、私ども株式会社◯◯と申します。
◯◯様のレジュメを拝見しまして、◯◯様の経歴にとても魅力を感じましたため、
是非とも弊社セールスディレクター職への選考に参加していただきたく、ご連絡させていただきました。
下記にあります、弊社からの求人情報・募集要項などをご覧いただき、
少しでもご興味感じていただけましたら是非一度お話しできればと考えております。
ご多用中とは存じますが、よろしくお願い申し上げます。

株式会社◯◯ 採用担当 田中
              </textarea>
            </div>
          </div>
          <p class="c-text__error">この項目には必ず入力してください</p>
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
            <a href="{{route('companyTemplate')}}?flash=successSave" class="c-button">保存する</a>
          @elseif(strstr($url,'admin'))
            <a href="{{route('adminCompanyDetail')}}?flash=successSave" class="c-button">保存する</a>
          @endif
      <!-- <input type="submit" class="c-button" value="保存する"> -->
    </div>
  </div>
</form>