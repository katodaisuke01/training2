<!DOCTYPE html>
<html lang="ja" class="@yield('page')">
  <head>
    <meta charset="utf-8">
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:site_name" content="ページの名前" />
    <meta property="og:image" content="{{ asset('user/cmn/img/ogp.png') }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="キーワード">
    <meta name="author" content="@yield('title')">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{{ asset('image/logo/favicon/user/safari-pinned-tab.svg') }}" as="font" type="font/woff2" crossorigin>
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo/favicon/user/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo/favicon/user/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo/favicon/user/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles-user.css') }}">
    
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <script type="text/javascript">
      window.onload = function() {
      document.getElementById('l-base__loading').style.display = 'none';
      document.getElementById('l-base').style.display = 'flex';
      }
    </script>
  </head>
  <body class="@yield('page_class')" id="top">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N23GSBF"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
        <!-- ! フラッシュ ============================== -->
    @include('component._flash')
    <div id="l-base__loading">
      @include('component._loading')
    </div>
    <div class="l-base" id="l-base">
      <main class="l-main">
        <!-- ! ヘッダー ============================== -->
        <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        @if(strstr($url,'home'))
        @else
        @include('component._bread')
        @endif
        <!-- ! start_ページ内コンテンツ ============================== -->
        @yield('content')
        <!-- ! end_ページ内コンテンツ ============================== -->
      </main>
      @include('component.user._footer')
    </div>
    @include('component.modal._modal_delete')
    @include('component.modal._modal_withdrawal')
    @include('component.script._scriptDefault')
    @include('component.script._scriptDetail')
  </body>
</html>
