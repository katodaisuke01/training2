@extends('layouts.oas.default')

@section('page_class', 'l-home l-body')
@section('description', 'OnlineAutoSalonのLP')
@section('title', 'OnlineAutoSalonとは')

@section('content')
  <section class="p-section p-campaign">
    <div class="l-container__1080">
      <div class="p-section__head">
        <div class="p-section__head--title scroll-block fade-block2">
          <h3 class="c-text__lv2 c-text__weight--700 c-text--center"><strong>CAMPAIGN</strong><br>キャンペーン概要</h3>
        </div>
      </div>
      <div class="p-section__body">
        <div class="c-box bg-fff scroll-block fade-block2">
          <div class="c-box__body">
            <div class="l-grid--gap24">
              <div class="p-campaign__concept">
                <p class="c-text__lv4">ログインとキャンペーンエントリーで毎週1名様に</p>
                <p class="c-text">Amazonギフト券10万円分</p>
                <p class="c-text__lv3">最終週は当選者数大幅アッププレゼント</p>
              </div>
              <div class="p-campaign__detail">
                <p class="c-text__lv3 c-text--center c-text__weight--900">プレゼント総額<strong>100</strong>万円<strong>!</strong></p>
                <p class="c-text">オンラインオートサロンにユーザー登録された方はもちろん、まだ登録がない方も応募は簡単！<br>ぜひこの機会に毎週エントリーしよう！</p>
              </div>
            </div>
          </div>
        </div>
        <div class="c-box bg-fff scroll-block fade-block2">
          <div class="c-box__body">
            <h4 class="c-text__lv2">応募方法</h4>
            <p class="c-text__lv3">オンラインオートサロンにユーザー登録＋キャンペーンにエントリーするだけ！</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-section p-information">
    <div class="l-container">
      <div class="p-section__head">
        <div class="p-section__head--title scroll-block fade-block2">
          <h3 class="c-text__lv2 c-text__weight--700 c-text--center"><strong>INFORMATION</strong><br>当選者数と抽選スケジュール</h3>
        </div>
      </div>
      <div class="p-section__body">
        <div class="p-information__content">
            <?php
              function infoList(){
                return [
                  ['month' => '12'],
                  ['month' => '12'],
                  ['month' => '12'],
                  ['month' => '12'],
                  ['month' => '1'],
                ];
              }
            ?>
          @php($infoList = infoList())
          @foreach($infoList as $info)
            <div class="p-information__content--item scroll-block fade-block2">
              <div class="c-box bg-fff">
                <div class="c-box__head">
                  <div class="p-information__title">
                    <span>Week</span>
                    <p class="c-text__lv4 c-text__weight--700">第<strong>1</strong>回<strong>プレゼント</strong></p>
                  </div>
                </div>
                <div class="c-box__body">
                  <ul class="p-list__border p-list__row">
                    <li>
                      <legend>エントリー期間</legend>
                      <div class="item">
                        <p class="c-text__lv4 c-text__weight--700">{{ $info['month'] }}<small>月</small>9<small>日</small><span>金</span></p>
                        <span>〜</span>
                        <p class="c-text__lv4 c-text__weight--700">{{ $info['month'] }}<small>月</small>15<small>日</small><span>木</span></p>
                      </div>
                    </li>
                    <li>
                      <legend>抽選日</legend>
                      <div class="item">
                        <p class="c-text__lv4 c-text__weight--700">{{ $info['month'] }}<small>月</small>16<small>日</small><span>金</span></p>
                      </div>
                    </li>
                    <li>
                      <legend>当選数</legend>
                      <div class="item">
                        <p class="c-text__lv5 c-text__weight--700 c-text__main">Amazonギフト券10万円×1名</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <section class="p-section p-about">
    <div class="p-section__head">
      <div class="p-section__head--title scroll-block fade-block2">
        <h3 class="c-text__lv2 c-text__weight--700 c-text--center"><strong>ABOUT</strong><br>オンラインオートサロンとは</h3>
      </div>
    </div>
    <div class="p-section__body">
      <div class="p-about__image scroll-block fade-block2">
        <img src="{{asset('../image/oas/img/img_about.png')}}" alt="オンラインオートサロンとはの画像" class="scroll-block fade-block2">
      </div>
      <div class="c-box bg-fff">
        <div class="c-box__body">
          <p class="c-text__lv4">
            自動車ファン向けの情報ポータルサービスです。企業から発表されるカスタムカーや、日々更新される新製品情報などを集約してお届けします。さらにユーザー登録で会員だけの特典がご利用になれます。登録料金はもちろん無料！
          </p>
        </div>
        <div class="c-box__foot">
          <div class="c-buttonArea__center">
            <a href="https://id.san-ei-corp.co.jp/users/login?dept_code=oas&redirect=https%3A%2F%2Fwww.tokyoautosalon.jp%2Fauth%2Fret%2F63883221777ee5.16544373?token={token}"
            class="c-button__line c-button__lg" target="_blank">ログインしてエントリー</a>
            <a href="https://id.san-ei-corp.co.jp/users/add?redirect=https%3A%2F%2Fwww.tokyoautosalon.jp%2Fauth%2Fret%2F63883221777ee5.16544373%3Ftoken%3D%7Btoken%7D&dept_code=oas"
            class="c-button__lg" target="_blank">登録してエントリー</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-section p-detail">
    <div class="l-container__960">
      <div class="p-section__head">
        <div class="p-section__head--title scroll-block fade-block2">
          <h3 class="c-text__lv2 c-text__weight--700 c-text--center"><strong>DETAIL</strong><br>詳細情報</h3>
        </div>
      </div>
      <div class="p-section__body scroll-block fade-block2">
        <div class="c-box bg-fff">
          <div class="c-box__body">
            <h5>応募資格</h5>
            <p>
              抽選時にオンラインオートサロンにユーザー登録がある方。オンラインオートサロンの登録には株式会社三栄が運営する三栄IDが必要です。三栄IDはどなたでも無料で作成できます。
            </p>
            <h5>当選発表・賞品発送</h5>
            <p>
              当選発表は賞品の発送をもってかえさせていただきます。<br>
              賞品の発送は応募時に登録されたメールアドレス（三栄ID）にEメールでお届けします。応募抽選日より約1ヶ月～2ヶ月後を予定しておりますが、都合により多少前後する場合がございます。予めご了承ください。
            </p>
            <h5>ご注意</h5>
            <ul class="p-list">
              <li><p>賞品の交換・換金・返品、及び当選権利の譲渡（転売を含む）等はできません。</p></li>
              <li><p>本キャンペーンのご当選者は同時期に実施されている他のキャンペーンと重複して当選できない場合がございます。予めご了承ください。</p></li>
              <li><p>本キャンペーンは、やむを得ない事情により中止・変更となる場合がございます。</p></li>
              <li><p>
                次の場合はご応募又は当選権利が無効となる場合がございますので、ご注意ください。
                <ol>
                  <li><p>ご記入いただいた内容に虚偽又は不備がある場合</p></li>
                  <li><p>応募条件を満たさない場合</p></li>
                  <li><p>お客様の住所が不明・長期不在・連絡不能等で賞品をお届けできない場合</p></li>
                  <li><p>その他、応募に関して不正な行為があった場合</p></li>
                </ol>
              </li>
            </ul>         
            <h5>個人情報の取扱いについて</h5>
            <p>
              本キャンペーンに関して提供いただいた個人情報は、株式会社三栄（共同利用する会社を含む）が、応募資格の確認、抽選、賞品発送、当社又は提携先の商品・サービス等のご案内、当社又は提携先のWEBサイトやアプリ等を通じた広告配信、お客様との最適なコミュニケーションのための消費動向等の分析（第三者に委託する場合を含む）、お客様等からのお問い合わせ対応 、その他<a href="https://www.sun-a.com/guide/privacy.php" class="c-text__main" target="_blank">三栄プライバシーポリシー</a>記載の目的で利用させていただきます。
            </p>
            <h5>準拠法及び管轄裁判所</h5>
            <p>
              本規約の準拠法は日本法といたします。また、本規約に起因し、又は関連する一切の紛争については、東京地方裁判所を第一審の専属的合意管轄裁判所といたします。
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-section p-double">
    <div class="l-container__768">
      <div class="p-section__head">
        <img src="{{asset('../image/oas/img/img_double_title.png')}}" alt="愛車ハッシュタグInstagram投稿キャンペーン" class="scroll-block fade-block2">
      </div>
      <div class="p-section__body">
        <div class="c-box bg-fff scroll-block fade-block2">
          <div class="c-box__head">
            <h5>概要</h5>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv3 c-text__weight--700">
              ハッシュタグ「<span class="c-text__alert">#東京オートサロン2023愛車</span>」をつけてご自身の愛車写真をInstagramに投稿するだけ。
            </p>
            <a href="https://www.instagram.com/tokyo_autosalon_official/" class="c-text__main" target="_blank">東京オートサロン2023 Instagramはこちら</a>
          </div>
        </div>
        <div class="c-box bg-fff scroll-block fade-block2">
          <div class="c-box__head">
            <h5>期間</h5>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv3 c-text__weight--700">
              東京オートサロン2023 in 幕張メッセ 開催期間中
            </p>
            <p class="c-text__lv2 c-text__weight--700">
              東京オートサロン2023 in 幕張メッセ 開催期間中
            </p>
          </div>
        </div>
        <div class="c-box bg-fff scroll-block fade-block2">
          <div class="c-box__head">
            <h5>賞品</h5>
          </div>
          <div class="c-box__body">
            <p class="c-text__lv3 c-text__weight--700">
            東京オートサロン2023オリジナルグッズ<small>を<br>投稿者の中から抽選で10名様にプレゼント！</small>
            </p>
            <p>※当選者への連絡は東京オートサロン公式InstagramからDMで行います。連絡のためInstagramアカウントのフォローをお願いします。</p>
            <p>※投稿された写真は東京オートサロン、オンラインオートサロンで記事として紹介する場合があります。</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="c-buttonArea__bottom--fixed">
    <a href="https://id.san-ei-corp.co.jp/users/login?dept_code=oas&redirect=https%3A%2F%2Fwww.tokyoautosalon.jp%2Fauth%2Fret%2F63883221777ee5.16544373?token={token}"
     class="c-button__white" target="_blank">ログインしてエントリー</a>
    <a href="https://id.san-ei-corp.co.jp/users/add?redirect=https%3A%2F%2Fwww.tokyoautosalon.jp%2Fauth%2Fret%2F63883221777ee5.16544373%3Ftoken%3D%7Btoken%7D&dept_code=oas"
     class="c-button" target="_blank">登録してエントリー</a>
  </div>

@endsection
