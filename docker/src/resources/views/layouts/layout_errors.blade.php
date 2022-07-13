<!DOCTYPE html>
<html lang="ja" class="l-error">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta HTTP-EQUIV='content-type' CONTENT='text/html;charset=SHIFT-JIS'>
    <meta name="msapplication-TileColor" content="#2c67e1">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/market/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/market/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/market/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('image/favicon/market/safari-pinned-tab.svg') }}" color="#00C4E5">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>@yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <!-- 	font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

</head>
<body class="l-body">
<main class="l-main">
    <div class="p-error">
        <div class="p-error__head">
            <div class="c-logo"></div>
            <h1 class="c-text__lv1 c-text__accent c-text--center c-text__weight--900">@yield('code')</h1>
        </div>
        <div class="p-error__body">
            <div class="text">
                <p class="c-text__lv4 c-text--center c-text__weight--900">@yield('message')</p>
            </div>
        </div>
        <div class="p-error__foot">
            <div class="c-buttonArea__center">
                <a href="{{route('industry.home')}}" class="c-button__wide c-button__min" id="redirect__btn">トップへ戻る</a>
            </div>
        </div>
        @yield('link')
        @yield('content')
    </div>
</main>
@yield('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- トップページリンクの切り替え -->
<script>
    $(function () {
        const main = "{{ route('industry.home') }}"
        const admin = "{{ route('admin.home') }}"
        const warehouse = "{{ route('warehouse.home') }}"
        const worker = "{{ route('worker.home') }}"
        const solaseed = "{{ route('solaseed.home') }}"

        var locate = location.href;
        if (locate.match(/admin/)) {
            $('#redirect__btn').attr('href', admin);
        } else if (locate.match(/warehouse/)) {
            $('#redirect__btn').attr('href', warehouse);
        } else if (locate.match(/worker/)) {
            $('#redirect__btn').attr('href', worker);
        } else if (locate.match(/solaseed/)) {
            $('#redirect__btn').attr('href', solaseed);
        } else {
            $('#redirect__btn').attr('href', main);
        }
    })
</script>
</body>
</html>
