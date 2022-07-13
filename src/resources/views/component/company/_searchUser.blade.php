
<ul class="p-list">
<?php
  function userList(){
    return [
      ['gender' => 'male','year' => '24','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'female','year' => '31','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'other','year' => '25','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '28','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '30','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '29','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '27','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '23','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '32','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '26','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '28','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '29','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '30','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '26','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '28','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '34','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '24','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '29','motivation' => 'すぐにでも転職したい'],
      ['gender' => 'male','year' => '30','motivation' => 'すぐにでも転職したい'],
    ];
  }
?>
@php($userList = userList())
@foreach($userList as $user)
  <li data-href="{{route('companySearchUser')}}">
    <div class="bg-fff shadow">
      <div class="l-12 l-12--gap8">
        <div class="l-1">
          <div class="c-checkbox">
            <input type="checkbox" name="selectUser" id="selectUser_1">
            <label for="selectUser_1"></label>
          </div>
        </div>
        <div class="l-2">
          <time class="c-text__lv6">{{ date('Y/m/d') }}</time>
          <time class="c-text__lv6">{{ date('H:i') }}</time>
        </div>
        <div class="l-2">
          <p class="c-text__lv4 c-text__year"><span class="{{ $user['gender'] }}">{{ $user['year'] }}</span><small class="c-text__unit">歳</small></p>
          <p class="c-text__lv5">東京都</p>
        </div>
        <div class="l-3">
          <p class="c-text__lv5 c-text__">Webデザイナー・UI/UXデザイナー<span>4年</span></p>
        </div>
        <div class="l-2">
          <p class="c-text__lv5">慶應義塾大学<br />株式会社アメリアコンサルティング</p>
        </div>
        <div class="l-2">
          <p class="c-text__lv5">450<span class="c-text__unit">万円<span></p>
          <p class="c-text__lv5">東京都</p>
        </div>
      </div>
      <div class="c-middle">
        <p class="c-text__lv4 c-text__main"><span class="c-text__unit">ひとことアピール：</span>仕事も遊びもやると決めたら全力で楽しむタイプです！</p>
      </div>
      <div class="c-lower">
        <div class="c-image__square c-border" style="background-image:url({{asset('../image/sample/user/img_6.png')}})"></div>
        <div class="c-text">
          <p class="c-text__main bg-fff">{{ $user['motivation'] }}</p>
          <form action="">
            <ul class="p-list__wrap">
              <li>
                <div class="c-checkbox c-checkbox__button">
                  <input type="checkbox" name="user" id="favorite">
                  <label for="favorite" class="favorite"><span class="c-icon__w24 c-icon--star__white"></span></label>
                </div>
              </li>
              <li>
                <div class="c-checkbox c-checkbox__button">
                  <input type="checkbox" name="user" id="check">
                  <label for="check" class="check"><span class="c-icon__w24 c-icon--check__white"></span></label>
                </div>
              </li>
              <li>
                <a href="{{route('companySearchUserScout')}}" class="c-checkbox c-checkbox__button">
                  <span class="c-icon__w24 c-icon--mail__white"></span>
                </a>
                </>
              </li>
              <li>
                  <button><span class="c-icon__w24 c-icon--dl__white"></span></button>
              </li>
            </ul>
          </form>
        </div>
        <div class="personality">
          <ul class="p-list__wrap">
            <li><p class="c-text__main bg-fff">コミュニケーションが好き！</p></li>
            <li><p class="c-text__main bg-fff">キックボクシングが趣味</p></li>
            <li><p class="c-text__main bg-fff">美味しいお店知ってます</p></li>
            <li><p class="c-text__main bg-fff">飲み会好きです</p></li>
            <li><p class="c-text__main bg-fff">インドアもアウトドアも</p></li>
            <li><p class="c-text__main bg-fff">旅行好き</p></li>
            <li><p class="c-text__main bg-fff">ゼルダの伝説</p></li>
            <li><p class="c-text__main bg-fff">映画は映画館派</p></li>
            <li><p class="c-text__main bg-fff">犬派</p></li>
            <li><p class="c-text__main bg-fff">バレーボール</p></li>
          </ul>
        </div>
      </div>
    </div>
  </li>
@endforeach
</ul>