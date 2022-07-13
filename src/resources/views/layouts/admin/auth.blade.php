<!DOCTYPE html>
<html lang="ja" class="@yield('page')">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{{ asset('image/logo/favicon/safari-pinned-tab.svg') }}" as="font" type="font/woff2" crossorigin>
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo/favicon/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    @include('component.script._scriptImport')
    <script src="{{asset('js/scriptDefault.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body class="@yield('page_class') l-body">
  <!-- Google Tag Manager (noscript) -->
  <!-- End Google Tag Manager (noscript) -->
    @include('component._flash')
    @yield('content')
  </body>
  <script>
    // パスワードの可視or不可視
    $(".c-icon__eye").click(function () {
      //アイコンの切り替え
      $(this).toggleClass("visible");
      //入力フォームの取得
      var input = $(this).parent().prev("input");
      //パスワードの表示切替
      if (input.attr("type") == "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
    });
  </script>
</html>
