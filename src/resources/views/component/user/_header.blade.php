<header class="l-header">
  <div class="c-header__navi">
    <h1>ミキワメ転職</h1>
    <a class="c-logo" href="{{ route('index') }}">
      <img src="{{ asset('image/logo/logo_white.svg') }}" alt="logo" title="ミキワメ転職のロゴ">
      <p class="c-text__min">仕事の魅力を<br />見つける転職ナビ</p>
    </a>
    <div class="c-right">
      <nav class="navi" id="navi">
        <ul class="p-list__wrap">
          <li>
            <form action="">
              <div class="c-input c-input--search">
                <input type="text" placeholder="キーワード検索" value="">  
              </div>
            </form>
          </li>
          <!-- ↓↓↓↓↓↓↓↓↓↓↓未ログイン時には非表示↓↓↓↓↓↓↓↓↓↓↓ -->
          <li class="c-watch">
            <a class="f-a_center" href="{{ route('message') }}">
              <span class="c-icon__w24 c-icon--message"></span>
              <span class="c-text__lv5 c-text__weight--700">メッセージ</span>
            </a>
          </li>
          <li> 
            <a class="f-a_center" href="{{ route('information') }}">
              <span class="c-icon__w24 c-icon--bell"></span>
              <span class="c-text__lv5 c-text__weight--700">ミキワメ転職からのお知らせ</span>
            </a>
          </li>
          <li> 
            <a class="f-a_center" href="{{ route('favorite') }}">
              <span class="c-icon__w24 c-icon--heart__line"></span>
              <span class="c-text__lv5 c-text__weight--700">気になる！リスト</span>
            </a>
          </li>
          <li>
            <a class="f-a_center" href="{{ route('mypage') }}">
              <span class="c-icon__w32 c-icon--thumbnail"></span>
              <span class="c-text__lv5 c-text__weight--700">マイページ</span>
            </a>
          </li>
          <!-- ↑↑↑↑↑↑↑↑↑↑↑未ログイン時には非表示↑↑↑↑↑↑↑↑↑↑↑ -->
        </ul>
      </nav>
      <div class="nav_toggle" id="nav_toggle">
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
    <?php
    $url = $_SERVER['REQUEST_URI'];
    ?>
    @if(strstr($url,'corporate'))
      <h3 class="c-text--center c-text__lv2">@yield('page_title')</h3>
    @elseif(strstr($url,'post'))
      <h3 class="c-text--center c-text__lv2">@yield('page_title')</h3>
    @elseif(strstr($url,'home'))
      <div class="c-logoArea">
        <img class="c-tagline" src="{{ asset('image/logo/logo_tagline.svg') }}" alt="タグライン" title="タグライン">
        <img class="c-logo" src="{{ asset('image/logo/logo_white.svg') }}" alt="logo" title="ミキワメ転職のロゴ">
      </div>
      <div class="c-buttonArea__end">
        <a class="c-button__min c-button__line--white" href="{{route('diagnose')}}"><span>あなたが魅力に感じる仕事を再確認！</span><br />適職診断</a>
      </div>
    @else
      <h2 class="c-text--center c-text__lv2">@yield('title')</h2>
    @endif
</header>