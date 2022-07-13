<div class="p-sidebar">
  <div class="p-sidebar__head">
    <div class="c-logo">
      <img src="{{ asset('image/sample/company/img_1.png') }}" width="100" alt="logo" title="ロゴ">
    </div>
    <p class="c-text__lv5 c-text--center">株式会社ミキワメ<br />山田 太郎<span class="c-text__unit">様</span></p>
  </div>
  <div class="p-sidebar__body">
    <div class="p-nav">
      <nav id="navi">
        <ul class="c-list__nav">
          <li class="dashboard">
            <a href="{{route('company')}}">
              <span class="c-icon__w24"></span>ダッシュボード
            </a>
          </li>
          <li class="message">
            <a href="{{route('companyMessage')}}">
              <span class="c-icon__w24"></span>メッセージ
            </a>
          </li>
          <li class="user">
            <a href="{{route('companySearch')}}">
              <span class="c-icon__w24"></span>求職者検索
            </a>
          </li>
          <li class="entry">
            <a href="{{route('companyEntry')}}">
              <span class="c-icon__w24"></span>求人情報
            </a>
          </li>
          <li class="post">
            <a href="{{route('companyPost')}}">
              <span class="c-icon__w24"></span>コンテンツ投稿
            </a>
          </li>
          <li class="setting">
            <a href="{{route('companySetting')}}">
              <span class="c-icon__w24"></span>各種設定
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
        <a href="{{route('companyLogin')}}?flash=successLogout" class="c-button__line c-button__min">ログアウト</a>
        <!-- <button type="submit" class="c-button__line c-button__min">ログアウト</button> -->
      </form>
    </div>
  </div>
</div>