<div class="p-main__head">
  <div class="p-main__head__main">
    <div class="p-main__head__main__txt">
      {{$main}}
    </div>
    <div class="p-main__head__main__act">
      <div class="p-main__account">
        <a href="{{ route('cms.account.profile') }}" class="p-main__account__user">
          <span>
            <svg class="icon">
              <use xlink:href="#user"/>
            </svg>
          </span>
          <p class="p-main__account__name">
            sample@example.com
          </p>
        </a>
        <div class="p-main__account__act" id="js-accordion">
          <button class="p-main__account__act__btn"></button>
          <div
            class="p-main__account__act__menu"
          >
            <a href="{{ route('cms.auth.login') }}" class="c-btn--sm">ログアウト</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @isset($sub)
    {{$sub}}
  @endisset
</div>