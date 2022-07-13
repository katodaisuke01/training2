<footer class="l-footer">
  <div class="p-footer">
    <div class="p-footer__head">
      <a class="c-logo" href="{{ route('index') }}">
        <img src="{{ asset('image/logo/logo.svg') }}" alt="logo" title="ミキワメ転職のロゴ" width="100">
        <p class="c-text__min">仕事の魅力を<br />見つける転職ナビ</p>
      </a>
      <div class="c-right">
        <ul class="p-list__wrap">
          <li><a href="{{route('diagnose')}}" class="c-button__text">適職診断</a></li>
          <li><a href="{{route('message')}}" class="c-button__text">メッセージ</a></li>
          <li><a href="{{route('favorite')}}" class="c-button__text">気になる!リスト</a></li>
          <li><a href="{{route('information')}}" class="c-button__text">お知らせ</a></li>
          <li><a href="{{route('mypage')}}" class="c-button__text">マイページ</a></li>
        </ul>
      </div>
    </div>
    <div class="p-footer__body">
      <ul class="p-list__wrap c-menu">
        <li><a href="{{route('about')}}" class="">運営会社</a></li>
        <li><a href="{{route('privacy')}}" class="">プライバシーポリシー</a></li>
        <!-- <li><a href="{{route('security')}}" class="">セキュリティーポリシー</a></li> -->
        <li><a href="{{route('terms')}}" class="">利用規約</a></li>
        <li><a href="{{route('faq')}}" class="">よくある質問</a></li>
        <li><a href="{{route('sitemap')}}" class="">サイトマップ</a></li>
      </ul>
    </div>
    <div class="p-footer__foot">
      <p class="c-copyright">転職は【ミキワメ転職】優良企業の求人情報・転職情報満載の転職サイト &copy; STARPROJECT Co.,Ltd. AllRights Reserved.</p>
    </div>
  </div>
</footer>