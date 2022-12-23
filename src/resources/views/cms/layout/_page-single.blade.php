<!DOCTYPE html>
<html lang="ja" class="">
  @include('cms.layout._head')
  <body class="@yield('body-class')" id="body">
    @include('cms._svg')
    <div class="l-wrapper">
      <main class="@yield('main-class') l-main" id="main">
        @yield('content')
      </main>
    </div>
    @include('cms.layout._footer')
    @include('cms.layout._script')
  </body>
</html>
