<a href="javascript:history.back()" class="c-button__back">一覧へ戻る</a>
<div class="p-message bg-fff">
  <div class="p-message__head">
  <?php
    $url = $_SERVER['REQUEST_URI'];
    ?>
    @if(strstr($url,'company'))
    <div class="c-image__logo" style="background-image:url({{ asset('../image/sample/user/img_6.png') }})"></div>
    <div class="c-text">
      <p><a target="_blanc" rel="noopener noreferrer" href="{{route('userDetail')}}" class="c-text__lv4 c-text__weight--700 c-text__main">@yield('page_title')</a><span class="c-text__lv7">とのメッセージです。</span></p>
      <ul class="p-list__wrap">
        <li><p class="c-tag__main">一次面接連絡</p></li>
        <li><p class="c-tag__black">神奈川県</p></li>
        <li><p class="c-tag__black">セールスディレクター</p></li>
      </ul>
    </div>
    @else
    <div class="c-image__logo" style="background-image:url({{ asset('../image/sample/company/img_2.png') }})"></div>
    <div class="c-text">
      <p><a target="_blanc" rel="noopener noreferrer" href="{{route('corporate')}}" class="c-text__lv4 c-text__weight--700 c-text__main">@yield('page_title')</a><span class="c-text__lv7">とのメッセージです。</span></p>
      <ul class="p-list__wrap">
        <li><p class="c-tag__main">一次面接連絡</p></li>
        <li><p class="c-tag__black">神奈川県</p></li>
        <li><p class="c-tag__black">セールスディレクター</p></li>
      </ul>
    </div>
    @endif
    <div class="c-right">
      <p class="c-text__note">{{ date('Y.m.d H:i') }}</p>
    </div>
  </div>
  <div class="p-message__body">
    <p class="c-tag__main full">スカウト</p>
    <p class="message">Yoco276q394様
      はじめまして、私ども株式会社ミキワメと申します。
      Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただきました。
      下記にあります、弊社からの求人情報・募集要項などをご覧いただき、少しでもご興味感じていただけましたら是非一度お話しできればと考えております。
      ご多用中とは存じますが、よろしくお願い申し上げます。

      株式会社MIKIWAME 採用担当
    </p>
    <a target="_blanc" rel="noopener noreferrer" href="{{route('job')}}" class="c-box bg-fff shadow">
      <div class="l">
        <div class="l-fix__160">
          <div class="c-image" style="background-image:url({{ asset('../image/sample/image_2.jpg') }})"></div>
        </div>
        <div class="l-auto">
          <div class="c-text">
            <p class="c-text__main c-text__lv4 c-text__weight--700">
              「喜んでもらえて嬉しい」を本当に感じられる！セールスディレクター募集
            </p>
            <p class=" c-text__lv5 c-text__weight--700">
              株式会社MIKIWAME <span class="c-text__note">2022.05.14更新</span>
            </p>
            <ul class="p-list__wrap">
              <li><p class="c-tag__black">神奈川県</p></li>
              <li><p class="c-tag__black">セールスディレクター</p></li>
              <li><p class="c-tag__black--line">福利厚生充実</p></li>
              <li><p class="c-tag__black--line">残業なし</p></li>
              <li><p class="c-tag__black--line">昇給・昇格あり</p></li>
            </ul>
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="p-message__foot">
    <ul class="p-list">
      <li class="user">
        <article class="c-box">
          <div class="c-box__head">
            <p class="c-text__main c-text__lv5">お礼のご連絡</p>
            <p class="c-text__note">From 株式会社MIKIWAME</p>
            <p class="c-text__main c-text__lv6">既読</p>
            <div class="c-right"><p class="c-text__min">2022.05.15 11:24</p></div>
          </div>
          <div class="c-box__body">
            <p class="message">株式会社MIKIWAME 採用担当 様
              ご連絡ありがとうございます。
              貴社の採用情報拝見し、とても魅力的に感じ、是非選考に応募させていただければと考えています。
              つきましては面談の可能な日時、場所などご教授いただければと存じます。
              よろしくお願いいたします。

              山田陽子
            </p>
          </div>
        </article>
      </li>
      <li class="company">
        <article class="c-box">
          <div class="c-box__head">
            <p class="c-text__main c-text__lv5">お礼のご連絡</p>
            <p class="c-text__note">From 株式会社MIKIWAME</p>
            <p class="c-text__main c-text__lv6">既読</p>
            <div class="c-right"><p class="c-text__min">2022.05.15 14:32</p></div>
          </div>
          <div class="c-box__body">
            <p class="message">山田 様
              ご連絡ありがとうございます。ミキワメ採用担当の斎藤と申します。
              この度は選考へのご応募、誠にありがとうございます。
              面談担当者のスケジュール等確認のために少しお時間いただけますでしょうか。数日中にはご連絡させていただきます。
              何卒、よろしくお願いいたします。

              株式会社ミキワメ 採用担当
            </p>
          </div>
        </article>
      </li>
      <li>
        <article class="c-box">
          <form action="" class="p-form">
            <div class="p-form__body">
              <div class="c-input--column">
              <?php
                $url = $_SERVER['REQUEST_URI'];
                ?>
                @if(strstr($url,'company'))
                <div class="c-input">
                  <div class="c-input--select c-input__200">
                    <select name="">
                      <option value="">返信内容を選択</option>
                      <option value="">お礼のご連絡</option>
                      <option value="">選考について</option>
                      <option value="">面接について</option>
                      <option value="">内定について</option>
                      <option value="">その他のご連絡</option>
                    </select>
                  </div>
                  <div class="c-input--select c-input__200">
                    <select name="">
                      <option value="">テンプレートを選択</option>
                      <option value="">テンプレートお礼用</option>
                      <option value="">テンプレートお見送り用</option>
                      <option value="">テンプレート選考通過用</option>
                      <option value="">テンプレート内定用</option>
                    </select>
                  </div>
                </div>
                @else
                <div class="c-input">
                  <div class="c-input--select c-input__200">
                    <select name="">
                      <option value="">返信内容を選択</option>
                      <option value="">お礼のご連絡</option>
                      <option value="">選考について</option>
                      <option value="">面接について</option>
                      <option value="">内定受託のご連絡</option>
                      <option value="">その他のご連絡</option>
                    </select>
                  </div>
                </div>
                @endif
                <div class="c-input--full">
                  <textarea name="" id="" cols="30" rows="10" placeholder="返信メッセージを入力してください"></textarea>
                </div>
              </div>
            </div>
            <div class="p-form__foot">
              <div class="c-buttonArea__end">
                <a href="{{route('message')}}" class="c-button__min c-button__gray">キャンセル</a>
                <a href="?flash=successSend" class="c-button__sm">返信する</a>
                <!-- <input type="submit" class="c-button__sm" value="返信する"> -->
              </div>
            </div>
          </form>
        </article>
      </li>
    </ul>
  </div>
</div>