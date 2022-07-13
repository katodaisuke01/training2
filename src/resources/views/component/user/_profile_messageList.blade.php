<div class="c-concave c-box">
  <div class="c-box__body">
    <ul class="p-list__column">
      <?php
      $url = $_SERVER['REQUEST_URI'];
      ?>
      @if(strstr($url,'admin'))
      <li data-href="{{ route('userMessage') }}">
        <article class="bg-fff shadow">
          <div class="c-image__logo" style="background-image:url({{asset('../image/sample/company/img_1.png')}})"></div>
          <div class="c-text">
            <div class="c-upper">
              <p class="c-text__lv5 c-text__weight--700">
                株式会社MIKIWAME
                <span class="c-text__note">との</span>
                <span class="c-text__alert">未読</span>
                <span class="c-text__note">メッセージです</span>
              </p>
              <ul class="p-list__wrap">
                <li><p class="c-tag__main full">面談連絡</p></li>
                <li><p class="c-tag__black">東京都</p></li>
                <li><p class="c-tag__black">セールスディレクター</p></li>
              </ul>
              <div class="c-right"><p class="c-text__unit">{{ date('Y/m/d H:i') }}</p></div>
            </div>
            <div class="c-lower c-border__top">
              <p class="c-text__note"><!-- 100文字くらい -->
              Yoco276q394様　はじめまして、私ども株式会社And Innovation Engineeringと申します。Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただ…
              </p>
            </div>
          </div>
          <div class="c-icon__w32 c-icon--arrow"></div>
        </article>
      </li>
      <li data-href="{{ route('userMessage') }}">
        <article class="bg-fff shadow">
          <div class="c-image__logo" style="background-image:url({{asset('../image/sample/company/img_2.png')}})"></div>
          <div class="c-text">
            <div class="c-upper">
              <p class="c-text__lv5 c-text__weight--700">株式会社ジョンスミス<span class="c-text__note">との</span><span class="c-text__alert">未読</span><span class="c-text__note">メッセージです</span></p>
              <ul class="p-list__wrap">
                <li><p class="c-tag__main full">スカウト</p></li>
                <li><p class="c-tag__black">神奈川県</p></li>
                <li><p class="c-tag__black">セールスディレクター</p></li>
              </ul>
              <div class="c-right"><p class="c-text__unit">{{ date('Y/m/d H:i') }}</p></div>
            </div>
            <div class="c-lower c-border__top">
              <p class="c-text__note"><!-- 100文字くらい -->
              Yoco276q394様　はじめまして、私ども株式会社And Innovation Engineeringと申します。Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただ…
              </p>
            </div>
          </div>
          <div class="c-icon__w32 c-icon--arrow"></div>
        </article>
      </li>
      <li data-href="{{ route('userMessage') }}">
        <article class="bg-fff shadow">
          <div class="c-image__logo" style="background-image:url({{asset('../image/sample/company/img_3.png')}})"></div>
          <div class="c-text">
            <div class="c-upper">
              <p class="c-text__lv5 c-text__weight--700">
                株式会社And Innovation Engineering
                <span class="c-text__note">との</span>
                <span class="c-text__alert">未読</span>
                <span class="c-text__note">メッセージです</span>
              </p>
              <ul class="p-list__wrap">
                <li><p class="c-tag__main full">面談連絡</p></li>
                <li><p class="c-tag__black">東京都</p></li>
                <li><p class="c-tag__black">マーケティングディレクター</p></li>
              </ul>
              <div class="c-right"><p class="c-text__unit">{{ date('Y/m/d H:i') }}</p></div>
            </div>
            <div class="c-lower c-border__top">
              <p class="c-text__note"><!-- 100文字くらい -->
              Yoco276q394様　はじめまして、私ども株式会社And Innovation Engineeringと申します。Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただ…
              </p>
            </div>
          </div>
          <div class="c-icon__w32 c-icon--arrow"></div>
        </article>
      </li>
      <li data-href="{{ route('userMessage') }}">
        <article class="bg-fff shadow">
          <div class="c-image__logo" style="background-image:url({{asset('../image/sample/company/img_4.png')}})"></div>
          <div class="c-text">
            <div class="c-upper">
              <p class="c-text__lv5 c-text__weight--700">
                株式会社ひふみ
                <span class="c-text__note">との</span>
                <span class="c-text__note">メッセージです</span>
              </p>
              <ul class="p-list__wrap">
                <li><p class="c-tag__main full">面談連絡</p></li>
                <li><p class="c-tag__black">東京都</p></li>
                <li><p class="c-tag__black">セールスディレクター</p></li>
              </ul>
              <div class="c-right"><p class="c-text__unit">{{ date('Y/m/d H:i') }}</p></div>
            </div>
            <div class="c-lower c-border__top">
              <p class="c-text__note"><!-- 100文字くらい -->
              Yoco276q394様　はじめまして、私ども株式会社And Innovation Engineeringと申します。Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただ…
              </p>
            </div>
          </div>
          <div class="c-icon__w32 c-icon--arrow"></div>
        </article>
      </li>
      @elseif(strstr($url,'mypage'))
      <li data-href="{{ route('messageDetail') }}">
        <article class="bg-fff shadow">
          <div class="c-image__logo" style="background-image:url({{asset('../image/sample/company/img_3.png')}})"></div>
          <div class="c-text">
            <div class="c-upper">
              <p class="c-text__lv5 c-text__weight--700">
                株式会社And Innovation Engineering
                <span class="c-text__note">との</span>
                <span class="c-text__alert">未読</span>
                <span class="c-text__note">メッセージです</span>
              </p>
              <ul class="p-list__wrap">
                <li><p class="c-tag__main full">面談連絡</p></li>
                <li><p class="c-tag__black">東京都</p></li>
                <li><p class="c-tag__black">マーケティングディレクター</p></li>
              </ul>
              <div class="c-right"><p class="c-text__unit">{{ date('Y/m/d H:i') }}</p></div>
            </div>
            <div class="c-lower c-border__top">
              <p class="c-text__note"><!-- 100文字くらい -->
              Yoco276q394様　はじめまして、私ども株式会社And Innovation Engineeringと申します。Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただ…
              </p>
            </div>
          </div>
          <div class="c-icon__w32 c-icon--arrow"></div>
        </article>
      </li>
      <li data-href="{{ route('messageDetail') }}">
        <article class="bg-fff shadow">
          <div class="c-image__logo" style="background-image:url({{asset('../image/sample/company/img_4.png')}})"></div>
          <div class="c-text">
            <div class="c-upper">
              <p class="c-text__lv5 c-text__weight--700">
                株式会社ひふみ
                <span class="c-text__note">との</span>
                <span class="c-text__note">メッセージです</span>
              </p>
              <ul class="p-list__wrap">
                <li><p class="c-tag__main full">面談連絡</p></li>
                <li><p class="c-tag__black">東京都</p></li>
                <li><p class="c-tag__black">セールスディレクター</p></li>
              </ul>
              <div class="c-right"><p class="c-text__unit">{{ date('Y/m/d H:i') }}</p></div>
            </div>
            <div class="c-lower c-border__top">
              <p class="c-text__note"><!-- 100文字くらい -->
              Yoco276q394様　はじめまして、私ども株式会社And Innovation Engineeringと申します。Yoco276q394様のレジュメを拝見しましてとても魅力的に感じましたため、是非ともセールスディレクター職への選考に参加していただきたく、ご連絡させていただ…
              </p>
            </div>
          </div>
          <div class="c-icon__w32 c-icon--arrow"></div>
        </article>
      </li>
      @else
      @endif
    </ul>
  </div>