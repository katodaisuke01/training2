<div class="p-sidebar c-bulge">
  <div class="p-sidebar__head">
    <div class="c-logo">
      <img src="{{ asset('image/logo/logo.svg') }}" width="100" alt="logo" title="ミキワメ転職ロゴ">
    </div>
    <h1 class="c-text__lv5 c-text--center">管理画面</h1>
  </div>
  <div class="p-sidebar__body">
    <div class="p-nav">
      <nav id="navi">
        <ul class="c-list__nav">
          <li class="dashboard">
            <a href="{{route('admin')}}">
              <span class="c-icon__w24"></span>ダッシュボード
            </a>
          </li>
          <li class="user">
            <a href="{{route('adminUser')}}">
              <span class="c-icon__w24"></span>ユーザー管理
            </a>
          </li>
          <li class="company">
            <a href="{{route('adminCompany')}}">
              <span class="c-icon__w24"></span>企業管理
            </a>
          </li>
          <li class="contact">
            <a href="{{route('adminContact')}}">
              <span class="c-icon__w24"></span>お問合せ管理
            </a>
          </li>
          <li class="message">
            <a href="{{route('adminMessage')}}">
              <span class="c-icon__w24"></span>メッセージ管理
            </a>
          </li>
          <li class="post">
            <a href="{{route('adminPost')}}">
              <span class="c-icon__w24"></span>コンテンツ管理
            </a>
          </li>
          <li class="master">
            <a href="{{route('adminMaster')}}">
              <span class="c-icon__w24"></span>マスター管理
            </a>
          </li>
          <li class="setting">
            <a href="{{route('adminSetting')}}">
              <span class="c-icon__w24"></span>その他設定
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="p-sidebar__foot">
    <div class="c-buttonArea__center">
      <form method="post" action="">
        @csrf
        <a href="{{route('adminLogin')}}?flash=successLogout" class="c-button__line c-button__min">ログアウト</a>
        <!-- <button type="submit" class="c-button__line c-button__min">ログアウト</button> -->
      </form>
    </div>
  </div>
</div>