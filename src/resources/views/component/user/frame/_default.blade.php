<div class="l-frame">
  <div class="p-frame">
    @isset($home)
      {{$home}}
    @endisset
    @isset($head)
      <div class="p-frame__head">
        {{ $head ?: '' }}
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