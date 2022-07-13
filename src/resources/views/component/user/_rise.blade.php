 <!-- 未ログイン↓ -->
  <div class="c-buttonArea__bottom--end">
    <div class="c-gift">
      <p class="c-text__lv5">入社時お祝い金<br /><strong>5,000</strong>円<span>贈呈</span></p>
    </div>
    <div class="c-gift">
      <div class="c-buttonArea__center">
        <a href="{{ ('register') }}" class="c-button__white">
          無料で<strong>会員登録</strong>する
        </a>
        <a href="{{ ('login') }}" class="c-button__text--white">ログインはこちら</a>
      </div>
    </div>
  </div>
 <!-- ログイン済↓ -->
  <div class="c-button__rise">
    <a href="#top" class="smooth_scroll">
      <div class="c-icon__rise"></div>
    </a>
  </div>
  <script>
    $(function() {
        var topBtn = $('.c-button__rise');    
        topBtn.hide();
        //スクロールが100に達したらボタン表示
        $(window).scroll(function () {
            if ($(this).scrollTop() > 800) {
                topBtn.fadeIn();
            }else {
                topBtn.fadeOut();
            }
        });
        //スクロールしてトップ
        topBtn.click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });
  </script>