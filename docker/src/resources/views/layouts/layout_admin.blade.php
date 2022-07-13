<!DOCTYPE html>
<html lang="ja" class="l-admin">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta HTTP-EQUIV='content-type' CONTENT='text/html;charset=SHIFT-JIS'>
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/warehouse/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/warehouse/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/warehouse/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('image/favicon/warehouse/safari-pinned-tab.svg') }}" color="#00C4E5">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>管理画面 | 倉庫管理業務DX</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('warehouse/css/styles.css')}}">
    <!-- 	font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- 	script -->
@include('js._jsLibrary')
<!-- jQuery UI --><!-- Datepicker日本語化 --><!-- jQuery UI のCSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body class="l-body">
@include('warehouse.element._header')
<div class="p-admin">
    @include('warehouse.element._aside')
    <main class="l-main">
        <!-- モーダル_削除 -->
    @include('warehouse.element.modal._modal_delete')

    <!-- @if(Auth::check())
        <script>
          document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
          });
        </script>
      @endif -->
        @yield('content')
    </main>
</div>
@yield('scripts')

@include('warehouse.element._footer')
<!-- フラッシュメッセージ -->
@include('warehouse.element._flash')
<!-- モーダル_作業完了 -->
@include('warehouse.element.modal._modal_complete')

@include('warehouse.element._script')
<!-- 発注_カレンダー -->
@include('warehouse.element._calenderInput')
<script src="{{asset('js/scriptDefault.js')}}"></script>
</body>
</html>
