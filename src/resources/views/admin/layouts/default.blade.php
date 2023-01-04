<!DOCTYPE html>
<html lang="ja" class="@yield('page')">
  @include('admin.layouts._head')
  <body class="@yield('page_class')" id="top">
    <div id="l-base__loading">
      @include('component._loading')
    </div>
    <div class="l-base" id="l-base">
      @include('admin._svg')
      @include('admin.layouts._sidebar')
      <main class="l-main">
        <!-- ! start_ページ内コンテンツ ============================== -->
        @yield('content')
        <!-- ! end_ページ内コンテンツ ============================== -->
        @include('admin.layouts._footer')
      </main>
    </div>
    @include('admin.layouts._script')
    <script src="{{asset('js/scriptDefault.js')}}"></script>
  </body>
</html>
