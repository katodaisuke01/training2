<!DOCTYPE html>
<html lang="ja" class="l-origin">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta HTTP-EQUIV='content-type' CONTENT='text/html;charset=SHIFT-JIS'>
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('image/favicon/safari-pinned-tab.svg') }}" color="#00C4E5">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>産地業務DX：管理者用</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/library/dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/print.css')}}" media="print">
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
<body class="l-body l-body__management">
@include('market.element._header', ['logoutUrl' => route('admin.logout')])
<div class="p-management">
    @include('market.element._aside')
    <main class="l-main">
        @yield('content')
    </main>
</div>
@yield('scripts')

@include('market.element._footer')
<!-- フラッシュメッセージ -->
@include('market.element._flash')
<!-- モーダル_作業完了 -->
@include('market.element.modal._modal_complete')
<!-- モーダル_箱数設定 -->
@include('market.element.modal._modal_box')
@include('market.element._script')

<script src="{{asset('js/scriptDefault.js')}}"></script>
<script src="{{asset('js/scriptDataTable.js')}}"></script>
</body>
</html>