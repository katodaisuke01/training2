<!DOCTYPE html>
<html lang="ja" class="">
  @include('cms.layout._head')
  <body class="@yield('body-class')" id="body">
    @include('cms._svg')
    <div class="l-wrapper">
      <div class="l-sidebar" id="sidebar">
        @include('cms.layout._header')
        @include('cms.layout._sidebar')
      </div>
      <main class="@yield('main-class') l-main" id="main">
        @yield('content')
      </main>
    </div>
    @include('cms.layout._script')
  </body>
</html>
