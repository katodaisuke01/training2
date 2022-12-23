<!DOCTYPE html>
<html lang="ja" class="@yield('page')">
  <head>
    <meta charset="utf-8">
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:site_name" content="Personal" />
    <!-- <meta property="og:image" content="{{ asset('image/admin/img/ogp.png') }}" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="">
    <meta name="author" content="@yield('title')">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <script src="{{asset('js/jquery/jquery-3.4.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="{{asset('js/library/wow.min.js')}}"></script>
    <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
    <script src="{{asset('js/library/smooth-scroll.min.js')}}"></script>
    <script src="{{asset('js/library/smooth-scroll.polyfills.min.js')}}"></script>
    <script src="{{asset('js/library/css_browser_selector.js')}}"></script>

    <!-- favicon -->
    <!-- <link rel="preload" href="{{ asset('image/admin/logo/favicon/safari-pinned-tab.png') }}" as="font" type="font/woff2" crossorigin>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/admin/logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/admin/logo/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/admin/logo/favicon/favicon.ico') }}"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles-admin.css') }}">
    
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <script type="text/javascript">
      window.onload = function() {
      document.getElementById('l-base__loading').style.display = 'none';
      document.getElementById('l-base').style.display = 'grid';
      }
    </script>
  </head>
  <body class="@yield('page_class')" id="top">
    <div id="l-base__loading">
      @include('component._loading')
    </div>
    <div class="l-base" id="l-base">
      @include('layouts.admin._sidebar')
      <main class="l-main">
        <!-- ! start_ページ内コンテンツ ============================== -->
        @yield('content')
        <!-- ! end_ページ内コンテンツ ============================== -->
        @include('layouts.admin._footer')
      </main>
    </div>
  </body>
</html>
