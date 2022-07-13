
<div class="l p-profile__user">
  <div class="l-auto">
    <div class="c-box bg-fff shadow">
      <div class="c-box__body">
        <div class="c-text">
          <ul class="p-list__wrap">
            <?php
              function profileList(){
                return [
                  ['publish' => 'unpublish','label' => '氏名','data' => '山田 陽子','unit' => ''],
                  ['publish' => 'unpublish','label' => 'メールアドレス','data' => 'yocoyocoyoco.y@mail.com','unit' => ''],
                  ['publish' => 'publish','label' => 'ユーザーID','data' => 'Yoco12345','unit' => ''],
                  ['publish' => 'publish','label' => '性別','data' => '女性','unit' => ''],
                  ['publish' => 'publish','label' => '配偶者','data' => 'なし','unit' => ''],
                  ['publish' => 'unpublish','label' => '電話番号','data' => '09012345678','unit' => ''],
                  ['publish' => 'publish','label' => '生年月日','data' => '1990/12/01','unit' => '生（31歳）'],
                  ['publish' => 'publish','label' => '現（前）年収','data' => '500','unit' => '万円'],
                  ['publish' => 'publish','label' => '現住所','data' => '東京都','unit' => ''],
                  ['publish' => 'publish','label' => '最終学歴','data' => 'コロンビア大学経営大学院修士課程','unit' => '2018年10月卒'],
                  ['publish' => 'publish','label' => '語学','data' => '日本語 英語 スペイン語','unit' => ''],
                  ['publish' => 'publish','label' => '資格','data' => 'オラクルマスターゴールド／日商簿記検定1級／秘書検定1級等','unit' => '']
                ];
              }
            ?>
            @php($profileList = profileList())
            @foreach($profileList as $profile)
            <li>
              <div class="head {{ $profile['publish'] }}"><p class="c-text__label c-text__main">{{ $profile['label'] }}</p></div>
              <div class="body"><p class="c-text__lv4 c-text__read c-text__weight--700">{{ $profile['data'] }}<span class="c-text__unit">{{ $profile['unit'] }}<span></p></div>
            </li>
            @endforeach
            <li>
              <p class="c-text__note">最終ログイン：2022/06/12</p>
            </li>
          </ul>
        </div>
        <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        @if(strstr($url,'mypage'))
        <div class="f-wrap f-a_center">
          <p class="c-text__note">
            ※ 公開マークのついている項目は匿名スカウトサービスを利用しても、企業には公開されません<br />※ 応募した企業にはすべての情報が公開されます<br />※ 退会は<a data-remodal-target="modal_withdrawal">こちら</a>
          </p>
          <div class="c-buttonArea__end">
            <a href="{{ route('edit1') }}" class="c-button__min c-button__line">編集</a>
          </div>
        </div>
        @elseif(strstr($url,'admin'))
          <div class="c-buttonArea__end">
            <a href="{{route('userEdit1')}}" class="c-button__min c-button__line">編集</a>
          </div>
        @else
        @endif
      </div>
    </div>
  </div>
  <div class="l-fix__220">
    <div class="c-box bg-fff shadow">
      <?php
      $url = $_SERVER['REQUEST_URI'];
      ?>
      @if(strstr($url,'company'))
      @else
      <div class="c-mgb8 bg-main">
        <p class="c-text__lv4 c-text--center">掲載中</p>
      </div>
      @endif
      <div class="c-image__vertical" style="background-image:url({{ asset('../image/sample/user/img_6.png') }})"></div>
    </div>
  </div>
</div>
<?php
$url = $_SERVER['REQUEST_URI'];
?>
@if(strstr($url,'company'))
  <div class="c-mgt8 c-mgb8 c-full">
    <div class="c-buttonArea__end">
      <button action="" class="c-button__min">求職者書類DL</button>
    </div>
  </div>
@elseif(strstr($url,'admin'))
  <div class="c-buttonArea__end">
    <a href="{{ route('userPw') }}" class="c-button__min c-button__pale">パスワード設定</a>
    <a href="{{ route('userBan') }}" class="c-button__min c-button__line">非表示企業の設定</a>
    <button action="" class="c-button__min">求職者書類DL</button>
  </div>
@else
  <div class="c-buttonArea__end">
    <a href="{{ route('pw') }}" class="c-button__min c-button__pale">パスワード設定</a>
    <a href="{{ route('ban') }}" class="c-button__min c-button__line">非表示企業の設定</a>
    <button action="" class="c-button__min">求職者書類DL</button>
  </div>
@endif