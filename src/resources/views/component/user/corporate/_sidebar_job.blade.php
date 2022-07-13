  <div class="c-box bg-fff">
    <div class="c-box__head">
      <?php
      $url = $_SERVER['REQUEST_URI'];
      ?>
      @if(strstr($url,'company'))
      @else
      <div class="c-buttonArea__center">
        <a href="{{ route('apply') }}" class="c-button">この求人に応募する</a>
        <form action="">
          <div class="c-checkbox c-checkbox__button">
            <input type="checkbox" id="favorite" name="favorite">
            <label for="favorite"><span class="c-icon__w24 c-icon--heart"></span>お気に入りに追加</label>
          </div>
        </form>
      </div>
      @endif
    </div>
    <div class="c-box__body">
      <h5 class="c-text__lv4 c-text__weight--700">求人情報</h5>
      <ul class="p-list__wrap">
        <li><p class="c-tag__gray">正社員</p></li>
        <li><p class="c-tag__gray">業務委託</p></li>
      </ul>
    </div>
    <div class="c-box__foot">
      <ul class="p-list">
        <li>
          <div class="label">
            <p class="c-text__lv6 c-text__main">職種</p>
          </div>
          <div class="body">
            <p class="c-text__lv4">マネージャー候補</p>
          </div>
        </li>
        <li>
          <div class="label">
            <p class="c-text__lv6 c-text__main">給与</p>
          </div>
          <div class="body">
            <p class="c-text__lv4">年収 350万 - 650万</p>
          </div>
        </li>
        <li>
          <div class="label">
            <p class="c-text__lv6 c-text__main">勤務時間</p>
          </div>
          <div class="body">
            <p class="c-text__lv4">9:00〜18:00</p>
          </div>
        </li>
        <li>
          <div class="label">
            <p class="c-text__lv6 c-text__main">こだわり</p>
          </div>
          <div class="body">
            <p class="c-text__lv4">
              社員登用あり / 昇給・昇格あり / 週2,3日～OK / 交通費支給 / 年間休日120以上 / 私服勤務可 / フレックス制度あり / リフレッシュ休暇あり / 副業OK
            </p>
          </div>
        </li>
      </ul>
    </div>
  </div>