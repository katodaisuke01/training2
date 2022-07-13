<div class="l-container">
    <div class="p-auth">
      @isset($home)
        {{$home}}
      @endisset
      @isset($head)
        <div class="p-auth__head">
          {{ $head ?: '' }}
          <!-- アクション -->
          @isset($action)
            <div class="l-frameIndex__head__action">
              {{$action}}
            </div>
          @endisset
        </div>
      @endisset
      @isset($body)
          <div class="p-auth__body">
          {{ $body ?: '' }}
          </div>
      @endisset
      @isset($foot)
        <div class="p-auth__foot">
            <p class="c-copyright">&copy; STARPROJECT Co.,Ltd. AllRights Reserved.</p>
        </div>
      @endisset
    </div>
</div>