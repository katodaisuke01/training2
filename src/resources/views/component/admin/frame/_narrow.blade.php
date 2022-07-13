<div class="l-frame l-frame__narrow">
  <div class="p-frame">
    @isset($home)
      {{$home}}
    @endisset
    @isset($head)
      <div class="p-frame__head">
        <div class="c-title">
          {{ $head ?: '' }}
        </div>
        @include('component.admin._bread')
      </div>
    @endisset
    @isset($body)
        <div class="p-frame__body">
        {{ $body ?: '' }}
        </div>
    @endisset
    @isset($foot)
        <div class="p-frame__foot">
        {{ $foot ?: '' }}
        </div>
    @endisset
  </div>
</div>

<script>
  // セレクトボックスscope_1でvalue="1"のときのみtarget1は表示
  $("[name=scope_1]").change(function () {
    // 選択されているvalue属性値を取り出す
    let val = $("[name=scope_1]").val();
    if (val == 0) {
        $("#target_1").hide();
    } else if (val == 1) {
        $("#target_1").show();
    }
});

</script>