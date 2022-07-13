<!DOCTYPE html>
<html lang="ja" class="@yield('page')">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{{ asset('image/logo/company/favicon/safari-pinned-tab.svg') }}" as="font" type="font/woff2" crossorigin>
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/logo/favicon/company/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/logo/favicon/company/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logo/favicon/company/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    @include('component.script._scriptImport_user')
    @include('component.script._scriptImport')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles-company.css') }}">
    
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">

  </head>
  <body class="@yield('page_class') l-body" id="top">
  <!-- Google Tag Manager (noscript) -->

  <!-- End Google Tag Manager (noscript) -->
        <!-- ! フラッシュ ============================== -->
      @include('component._flash')
      <div class="l-base">
        <aside class="l-sidebar">
          @include('component.company._sidebar')
        </aside>
        <main class="l-main">
          <!-- ! start_ページ内コンテンツ ============================== -->
          @yield('content')
          <!-- ! end_ページ内コンテンツ ============================== -->
        </main>
      </div>
      @include('component.company._footer')
    </div>
    @include('component.modal._modal_delete')
    @include('component.modal._modal_select_dummy')
    @include('component.script._scriptDefault')
    @include('component.script._scriptDetail')
  </body>
</html>