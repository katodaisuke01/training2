<div class="l-frame">
  <div class="p-frame">
    @isset($home)
      {{$home}}
    @endisset
    @isset($body)
      <div class="p-frame__body">
        {{ $body ?: '' }}
      </div>
    @endisset
  </div>
</div>