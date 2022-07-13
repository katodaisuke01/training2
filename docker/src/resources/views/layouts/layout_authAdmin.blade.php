<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/favicon/warehouse/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/favicon/warehouse/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon/warehouse/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('image/favicon/warehouse/safari-pinned-tab.svg') }}" color="#00C4E5">
    <title>@yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('warehouse/css/styles.css')}}">
    <!-- 	フォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">

</head>
<body class="@yield('page_class')">
<main class="l-main">
    @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function (event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
    @endif
    @yield('content')
</main>
@yield('scripts')

@include('auth.element._script')
@include('warehouse.element._footer')
<!-- フラッシュメッセージ -->
@include('market.element._flash')
</body>
</html>
