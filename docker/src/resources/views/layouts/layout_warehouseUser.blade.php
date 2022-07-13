<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta HTTP-EQUIV='content-type' CONTENT='text/html;charset=SHIFT-JIS'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/warehouse/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/warehouse/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/warehouse/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('image/favicon/safari-pinned-tab.svg') }}" color="#00C4E5">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>@yield('title')</title>
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
</head>
<body class="l-body @yield('page_class')">
@if(Auth::check())
    <script>
        $('#logout').on('click', function (event) {
            event.preventDefault();
            $('#logout-form').submit();
        });
    </script>
@endif
@yield('content')
@yield('scripts')

@include('market.element._footer')
<!-- フラッシュメッセージ -->
@include('market.element._flash')
<!-- モーダル_異常報告 -->
@include('worker.element.modal._modal_report')
@include('worker.element.accept_script')
<script src="{{asset('js/scriptDefault.js')}}"></script>
<script>
    $('.c-button__check').click(function () {
        $(this).addClass('checked');
    });
</script>
</body>
</html>
