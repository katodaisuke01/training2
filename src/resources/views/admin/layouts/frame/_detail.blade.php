<div class="l-frame">
  <div class="p-frame">
    @isset($home)
        {{ $home ?? '' ?: '' }}
    @endisset
    @isset($head)
      <div class="p-frame__head">
        <div class="c-title">
          {{ $head ?? '' ?: '' }}
          <div class="p-frame__head--action">
            <p>こんにちは <a class="c-text__weight--700">山田 太郎</a> さん</p>
          </div>
        </div>
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