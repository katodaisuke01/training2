<!DOCTYPE html>
<html lang="ja" class="l-error">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta HTTP-EQUIV ='content-type' CONTENT='text/html;charset=SHIFT-JIS'>
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo/favicon/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('image/logo/safari-pinned-tab.svg') }}" color="#00C4E5">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>エラーページ</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <!-- 	font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
   
    <script type="text/javascript">
      setTimeout("redirect()", 8000);
      function redirect(){
      location.href='';
      }
    </script>
  </head>
  <body class="l-body">
    <main class="l-main">
      <div class="l-frame">
        <div class="p-frame">
          <div class="p-frame__head">
            <div class="c-logo"></div>
            <h1 class="c-text__lv1 c-text__accent c-text--center c-text__weight--900">@yield('code')</h1>
          </div>
          <div class="p-frame__body">
            <div class="text">
              <p class="c-text__lv4 c-text--center c-text__weight--900">@yield('message')</p>
              <p class="c-text__lv4 c-text--center c-text__weight--900">自動的にトップページへリダイレクトされます。</p>
            </div>
          </div>
          <div class="p-frame__foot">
            <div class="c-buttonArea__center">
              <?php
              $url = $_SERVER['REQUEST_URI'];
              ?>
              @if(strstr($url,'company'))
                <a href="{{route('company')}}" class="c-button">企業トップへ戻る</a>
              @else
                <a href="" class="c-button">ユーザートップへ戻る</a>
              @endif
            </div>
          </div>
        </div>
        @yield('link')
        @yield('content')
      </div>
    </main>
    @yield('scripts')
  </body>
</html>