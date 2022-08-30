@extends('layouts.project.private')

@section('page_class', 'l-home l-private')
@section('description', 'Rie & Daisuke Weddingの紹介Webページ')
@section('title', 'Rie & Daisuke Wedding')

@section('content')
  <section class="p-view" id="top">
    <div class="p-view__head">
      <p class="c-text__lv1 c-text__en c-text__weight--100 ">Welcome to</p>
      <span></span>
      <p class="c-text__lv1 c-text__en c-text__weight--100 ">Our Wedding</p>
    </div>
    <div class="p-view__body">
      <div class="l-container">
        <div class="l">
          <div class="logo">
            <img src="{{asset('image/logo/logo.svg')}}" alt="ロゴ">
          </div>
          <div class="l-auto">
            <div class="c-image__view fadeInUp"><img src="{{asset('image/image/top.jpg')}}" class="shadow" alt="トップの画像"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-section p-about">
    <div class="l-container">
      <div class="p-section__head">
        <div class="p-section__head--title">
          <h3 class="c-text__lv1 c-text__weight--100 scroll-block fade-block2">About Us</p>
        </div>
        <div class="c-buttonArea__end">
          <a href="https://www.instagram.com/tsunemiiiiiii" class="c-button" target="_blanc"><span class="c-icon__w20 c-icon--instagram"></span>tsunemiiiiiii</a>
          <a href="https://www.instagram.com/ura_kuishinbon" class="c-button" target="_blanc"><span class="c-icon__w20 c-icon--instagram"></span>ura_kuishinbon</a>
        </div>
      </div>
      <div class="p-section__body">
        <div class="l">
          <div class="l-half scroll-block fade-block2">
            <div class="c-box bg-fff shadow">
              <div class="c-box__head">
                <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/dsk_2.png')}}')" href="{{asset('image/image/intro/dsk_2.png')}}" data-lightbox="lightbox[dsk]" data-title="daisuke_1"></a>
                <div class="c-none">
                  <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/dsk_1.jpg')}}')" href="{{asset('image/image/intro/dsk_1.jpg')}}" data-lightbox="lightbox[dsk]" data-title="daisuke_2"></a>
                  <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/dsk_3.jpg')}}')" href="{{asset('image/image/intro/dsk_3.jpg')}}" data-lightbox="lightbox[dsk]" data-title="daisuke_3"></a>
                  <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/dsk_4.jpg')}}')" href="{{asset('image/image/intro/dsk_4.jpg')}}" data-lightbox="lightbox[dsk]" data-title="daisuke_4"></a>
                </div>
              </div>
              <div class="c-box__body">
                <div class="c-text">
                  <p class="c-text__lv3"><span class="c-text__unit">新郎：</span>常見 大祐</p>
                  <p class="c-text__lv4 c-text__weight--400 c-mgt16">
                    1986年6月23日生。千葉県市川市出身。小学校〜高校は地元の中山競馬場 下総乗馬少年団にて馬術競技と馬の世話に勤しみ、障害飛越競技全国6位の成績。<br />
                    高校卒業後は1年間ふなばし美術学院にて美大受験の準備をし、武蔵野美術大学 視覚伝達デザイン学科に入学。グラフィック表現とタイポグラフィーについて学ぶ。<br />
                    大学卒業後、数社を経て現在の株式会社 創新ラボへ入社し主にWeb, UI, UXのデザイン業務に携わる。<br />
                    趣味はクライミングでボルダリング、ロープ共に自然の中が好み。
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="l-half scroll-block fade-block2">
            <div class="c-box bg-fff shadow">
              <div class="c-box__head">
                <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/rie_1.jpg')}}')" href="{{asset('image/image/intro/rie_1.jpg')}}" data-lightbox="lightbox[rie]" data-title="rie_1"></a>
                <div class="c-none">
                  <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/rie_2.jpg')}}')" href="{{asset('image/image/intro/rie_2.jpg')}}" data-lightbox="lightbox[rie]" data-title="rie_2"></a>
                  <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/rie_3.jpg')}}')" href="{{asset('image/image/intro/rie_3.jpg')}}" data-lightbox="lightbox[rie]" data-title="rie_3"></a>
                  <a class="c-image__circle" style="background-image:url('{{asset('image/image/intro/rie_4.jpg')}}')" href="{{asset('image/image/intro/rie_4.jpg')}}" data-lightbox="lightbox[rie]" data-title="rie_4"></a>
                </div>
              </div>
              <div class="c-box__body">
                <div class="c-text">
                  <p class="c-text__lv3"><span class="c-text__unit">新婦：</span>常見 里枝<small>（旧姓：南澤）</small></p>
                  <p class="c-text__lv4 c-text__weight--400 c-mgt16">
                    1985年7月9日生。旧姓は南澤。埼玉県さいたま市出身。幼い頃から好奇心旺盛でピアノ、水泳、書道、絵画など多くの習い事をして育つ。<br />
                    自由で自主性を重んじる校風に惹かれ、埼玉県立浦和第一女子高等学校に進み、青春を謳歌する。<br />
                    その後、食への興味から東京農工大学農学部へ進学。しかし勉学よりも学園祭実行委員として学園祭準備に勤しむ。<br />
                    大学卒業後、養命酒製造株式会社を経て現在の株式会社ぐるなびへ入社し、主にメーカープロモーションに携わる。<br />
                    趣味はBTS（ジミンペン）＆ボルダリング。アクティブも好きだが、自然の中でチルってる時も好き。
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-section p-schedule">
    <div class="l-container">
      <div class="p-section__head">
        <div class="p-section__head--title">
          <h3 class="c-text__lv1 c-text__weight--100 scroll-block fade-block2">Schedule</h3>
        </div>
      </div>
      <div class="p-section__body c-border bg-fff">
        <div class="p-scroll__height--400">
          <div class="c-box bg-fff scroll-block fade-block2">
            <ul class="p-list__border">
              <li>
                <p class="date">2022.11.12 17:30</p>
                <p class="c-text__lv4">挙式 at <a href="https://anelli-wedding.com/daiba/" target="_blank" class="c-button__text">コルトーナシーサイド台場（式場ページへ）</a></p>
              </li>
              <li>
                <p class="date">2022.08.19 — 08.21</p>
                <p class="c-text__lv4">新郎弟 結婚式 北海道旅行</p>
              </li>
              <li>
                <p class="date">2022.08.07</p>
                <p class="c-text__lv4">ドレス試着</p>
              </li>
              <li>
                <p class="date">2022.07.23</p>
                <p class="c-text__lv4">結婚指輪 納品</p>
              </li>
              <li>
                <p class="date">2022.07.10</p>
                <p class="c-text__lv4">墨田区役所にて入籍<br class="on_sp"><small>（本籍は東京スカイツリーに）</small></p>
              </li>
              <li>
                <p class="date">2022.07.09</p>
                <p class="c-text__lv4">里枝 誕生日</p>
              </li>
              <li>
                <p class="date">2022.07.02 — 07.04</p>
                <p class="c-text__lv4">台風直撃の中、沖縄旅行</p>
              </li>
              <li>
                <p class="date">2022.06.26</p>
                <p class="c-text__lv4">両家顔合わせ<small>@大宮 桃栗</small></p>
              </li>
              <li>
                <p class="date">2022.06.24</p>
                <p class="c-text__lv4">チームラボ ボーダレス</p>
              </li>
              <li>
                <p class="date">2022.06.24</p>
                <p class="c-text__lv4">コルトーナシーサイド台場 式場見学</p>
              </li>
              <li>
                <p class="date">2022.06.23</p>
                <p class="c-text__lv4">大祐 誕生日</p>
              </li>
              <li>
                <p class="date">2022.06.18</p>
                <p class="c-text__lv4">外岩ロープクライミング<small>@天王岩</small></p>
              </li>
              <li>
                <p class="date">2022.03.20</p>
                <p class="c-text__lv4">ホワイトデーを兼ねてプロポーズ</p>
              </li>
              <li>
                <p class="date">2021.10.16 — 10.17</p>
                <p class="c-text__lv4">星野リゾート 界 遠州 旅行</p>
              </li>
              <li>
                <p class="date">2021.08.04</p>
                <p class="c-text__lv4">チームラボ プラネッツ</p>
              </li>
              <li>
                <p class="date">2021.07.04</p>
                <p class="c-text__lv4">ボルダリングの初デート<small>@渋谷ノボロック</small></p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-section p-diary">
    <div class="l-container">
      <div class="p-section__head">
        <div class="p-section__head--title">
          <h3 class="c-text__lv1 c-text__weight--100 scroll-block fade-block2">Diary</h3>
        </div>
      </div>
      <div class="p-section__body">
        <div class="c-masonry">
            <?php
              function imageList(){
                return [
                  ['image' => '/image/image/diary/img_hokkaido_1.jpg','name' => '北海道旅行1'],
                  ['image' => '/image/image/diary/img_hokkaido_2.jpg','name' => '北海道旅行2'],
                  ['image' => '/image/image/diary/img_shirane_1.jpg','name' => '日光白根山登山1'],
                  ['image' => '/image/image/diary/img_shirane_2.jpg','name' => '日光白根山登山2'],
                  ['image' => '/image/image/diary/img_1.jpg','name' => 'チームラボプラネッツ1'],['image' => '/image/image/diary/img_2.jpg','name' => 'チームラボプラネッツ2'],
                  ['image' => '/image/image/diary/img_3.jpg','name' => 'チームラボプラネッツ3'],['image' => '/image/image/diary/img_44.jpg','name' => 'チームラボプラネッツ4'],
                  ['image' => '/image/image/diary/img_4.jpg','name' => '寝てる人'],
                  ['image' => '/image/image/diary/img_5.jpg','name' => '池袋サンシャイン1'],['image' => '/image/image/diary/img_6.jpg','name' => '池袋サンシャイン2'],
                  ['image' => '/image/image/diary/img_7.jpg','name' => '星野リゾート 界 遠州1'],['image' => '/image/image/diary/img_8.jpg','name' => '星野リゾート 界 遠州2'],
                  ['image' => '/image/image/diary/img_9.jpg','name' => '星野リゾート 界 遠州3'],['image' => '/image/image/diary/img_10.jpg','name' => '星野リゾート 界 遠州4'],
                  ['image' => '/image/image/diary/img_11.jpg','name' => '星野リゾート 界 遠州5'],['image' => '/image/image/diary/img_12.jpg','name' => '星野リゾート 界 遠州6'],
                  ['image' => '/image/image/diary/img_13.jpg','name' => '鍾乳洞にて'],['image' => '/image/image/diary/img_14.jpg','name' => 'バーベキュー'],
                  ['image' => '/image/image/diary/img_15.jpg','name' => '北海道の友人の厩舎にて'],['image' => '/image/image/diary/img_16.jpg','name' => 'ディズニーシー1'],
                  ['image' => '/image/image/diary/img_17.jpg','name' => 'ディズニーシー2'],['image' => '/image/image/diary/img_48.jpg','name' => 'ディズニーシー3'],
                  ['image' => '/image/image/diary/img_49.jpg','name' => 'ディズニーシー4'],['image' => '/image/image/diary/img_18.jpg','name' => '鬼怒川 湯西川温泉1'],
                  ['image' => '/image/image/diary/img_51.jpg','name' => '鬼怒川 湯西川温泉2'],['image' => '/image/image/diary/img_52.jpg','name' => '鬼怒川 湯西川温泉3'],
                  ['image' => '/image/image/diary/img_19.jpg','name' => 'プロポーズしたときのやつ'],['image' => '/image/image/diary/img_20.jpg','name' => '角川ミュージアム1'],
                  ['image' => '/image/image/diary/img_21.jpg','name' => '角川ミュージアム1'],['image' => '/image/image/diary/img_22.jpg','name' => '角川ミュージアム2'],
                  ['image' => '/image/image/diary/img_23.jpg','name' => '角川ミュージアム3'],['image' => '/image/image/diary/img_24.jpg','name' => '角川ミュージアム4'],
                  ['image' => '/image/image/diary/img_54.jpg','name' => '角川ミュージアム5'],
                  ['image' => '/image/image/diary/img_65.jpg','name' => '俺のフレンチにて'],['image' => '/image/image/diary/img_66.jpg','name' => 'Fish and Bird'],
                  ['image' => '/image/image/diary/img_25.jpg','name' => 'チームラボボーダレス2'],['image' => '/image/image/diary/img_26.jpg','name' => 'チームラボボーダレス3'],
                  ['image' => '/image/image/diary/img_27.jpg','name' => 'チームラボボーダレス4'],['image' => '/image/image/diary/img_28.jpg','name' => 'チームラボボーダレス5'],
                  ['image' => '/image/image/diary/img_29.jpg','name' => 'チームラボボーダレス6'],['image' => '/image/image/diary/img_30.jpg','name' => 'チームラボボーダレス7'],
                  ['image' => '/image/image/diary/img_60.jpg','name' => 'チームラボボーダレス8'],['image' => '/image/image/diary/img_72.jpg','name' => '20220710_01'],
                  ['image' => '/image/image/diary/img_73.jpg','name' => '20220710_02'],
                  ['image' => '/image/image/diary/img_61.jpg','name' => 'チームラボボーダレス9'],['image' => '/image/image/diary/img_62.jpg','name' => 'チームラボボーダレス10'],
                  ['image' => '/image/image/diary/img_63.jpg','name' => 'チームラボボーダレス11'],['image' => '/image/image/diary/img_64.jpg','name' => 'チームラボボーダレス12'],
                  ['image' => '/image/image/diary/img_31.jpg','name' => '両家顔合わせ1'],['image' => '/image/image/diary/img_32.jpg','name' => '両家顔合わせ2'],
                  ['image' => '/image/image/diary/img_33.jpg','name' => '沖縄誕生日（1週間早い）'],['image' => '/image/image/diary/img_34.jpg','name' => '沖縄旅行1'],
                  ['image' => '/image/image/diary/img_35.jpg','name' => '沖縄旅行2'],['image' => '/image/image/diary/img_36.jpg','name' => '沖縄旅行3'],
                  ['image' => '/image/image/diary/img_37.jpg','name' => '沖縄旅行4'],['image' => '/image/image/diary/img_38.jpg','name' => '沖縄旅行5'],
                  ['image' => '/image/image/diary/img_39.jpg','name' => '沖縄旅行6'],['image' => '/image/image/diary/img_40.jpg','name' => '沖縄旅行7'],
                  ['image' => '/image/image/diary/img_67.jpg','name' => '沖縄 万座毛'],['image' => '/image/image/diary/img_68.jpg','name' => '沖縄 ホテル'],
                  ['image' => '/image/image/diary/img_69.jpg','name' => '沖縄 美ら海水族館1'],['image' => '/image/image/diary/img_70.jpg','name' => '沖縄 美ら海水族館2'],
                  ['image' => '/image/image/diary/img_71.jpg','name' => '沖縄 ビーチ'],
                  ['image' => '/image/image/diary/img_41.jpg','name' => '結婚指輪'],['image' => '/image/image/diary/img_42.jpg','name' => '結婚指輪'],
                  ['image' => '/image/image/diary/img_43.jpg','name' => '結婚指輪'],
                  ['image' => '/image/image/diary/img_45.jpg','name' => 'ニューシューズ購入'],['image' => '/image/image/diary/img_46.jpg','name' => 'TSS'],
                  ['image' => '/image/image/diary/img_47.jpg','name' => '星野リゾート 界 遠州7'],['image' => '/image/image/diary/img_50.jpg','name' => '外岩 笠間'],
                  ['image' => '/image/image/diary/img_53.jpg','name' => '科学未来館'],
                  ['image' => '/image/image/diary/img_55.jpg','name' => '外岩 天王岩1'],['image' => '/image/image/diary/img_56.jpg','name' => '外岩 天王岩2'],
                  ['image' => '/image/image/diary/img_57.jpg','name' => '外岩 天王岩3'],['image' => '/image/image/diary/img_58.jpg','name' => '外岩 天王岩4'],
                  ['image' => '/image/image/diary/img_59.jpg','name' => '外岩 天王岩5'],
                ];
              }
            ?>
            @php($imageList = imageList())
            @foreach($imageList as $image)
              <a class="scroll-block fade-block2" href="{{ $image['image'] }}" data-lightbox="lightbox[diary]" data-title="{{ $image['name'] }}">
                <img src="{{ $image['image'] }}" alt="{{ $image['name'] }}">
                <p>{{ $image['name'] }}</p>
              </a>
            @endforeach
        </div>
      </div>
    </div>
  </section>

@endsection
