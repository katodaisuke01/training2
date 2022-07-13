@extends('layouts.user.default')

@section('page_class', 'l-corporate')
@section('aside_class', '')
@section('description', 'このページはミキワメ転職に求人掲載を行なっている、株式会社MIKIWAMEの会社情報を掲載しています。')
@section('page_title', '企業情報')
@section('title', '株式会社MIKIWAME')

@section('content')
  @component('component.user.frame._default')
    @slot('head')
      <div class="p-view" style="background-image:url({{ asset('../image/sample/bg_corporate.jpg') }})">
        <div class="p-view__body">
          <div class="l">
            <div class="l-auto">
              <div class="c-text">
                <h3 class="c-text__title c-text__weight--900 c-copy">つくるを拓く
                  MAKE BEYOND
                </h3>
                <div class="c-buttonArea">
                  <a href="{{ route('apply') }}" class="c-button">この企業に応募したい！</a>
                </div>
              </div>
            </div>
            <div class="l-fix__350">
              <div class="c-box bg-fff">
                <img src="{{ asset('../image/sample/logo_sample.svg') }}" alt="@yield('title')のロゴ">
              </div>
            </div>
          </div>
        </div>
      </div>
    @endslot
    @slot('body')
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">企業からのさまざまな最新情報</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">お知らせ
          </h4>
        </div>
        <div class="p-section__body">
          <div class="p-scroll bg-fff">
            <div class="p-scroll__inner">
              <ul class="p-list__border">
                <?php
                  function newsList(){
                    return [
                      ['title' => '研修紹介の動画'],
                      ['title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
                      ['title' => '【福利厚生】自社商品のファミリーセール！'],
                      ['title' => '研修紹介の動画'],
                      ['title' => '【お知らせ】イベントで賞金ゲット社員にインタビュー'],
                      ['title' => '【福利厚生】自社商品のファミリーセール！'],
                    ];
                  }
                ?>
                @php($newsList = newsList())
                @foreach($newsList as $news)
                <li data-href="{{route('postDetail')}}">
                  <article>
                    <time>{{ date('Y/m/d H:i') }}</time>
                    <span class="c-tag__main">新着</span>
                    <p>{{ $news['title'] }}<span>を投稿しました</span></p>
                  </article>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="c-buttonArea__center">
            <a href="{{route('post')}}" class="c-button__min c-button__line c-button__square">すべての投稿を見る</a>
          </div>
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">新たな一歩を踏み出す求職者のみなさんへ</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">事業内容
          </h4>
          <p class="c-text--center c-text__lv3 c-text__weight--700">株式会社MIKIWAMEはさまざまな事業をおこなっております。
            応募の際、強い熱意や希望を感じさせていただければ最大限考慮いたします。</p>
        </div>
        <div class="p-section__body">
          <ul class="p-list__split4">
            <?php
              function workList(){
                return [
                  ['title' => '建築事業','text' => '環境への負荷軽減、省エネルギー、事業継続性確保のための耐震、防災、快適性や利便性の向上といった、さまざまなニーズに対応したオフィス、マンション、商業施設、工場、病院や学校など、あらゆる建築物を提供しています。'],
                  ['title' => '土木事業','text' => 'トンネル、橋梁、ダム、河川、都市土木、鉄道や高速道路など、私たちの生活に必要不可欠なインフラ施設の建設を通じて、より安全・安心かつ豊かな社会の実現に貢献しています。'],
                  ['title' => '開発事業','text' => '都心部を中心に好立地な優良賃貸不動産の開発・保有を継続的に進めています。「2050年カーボンニュートラル」に向けた省エネ技術や環境配慮技術を採用し、入居企業の事業継続性をサポートする安全・安心な空間を提供しています。'],
                  ['title' => '新領域事業','text' => 'カーボンニュートラルの実現に向けたグリーンエネルギーソリューションへの取り組みやPPP事業の推進に加え、建設デジタル、アグリ・バイオビジネスなど、今後成長が見込まれる市場をターゲットとして、大林グループの新機軸を拓く事業創出による収益源の多様化をめざしています。']
                ];
              }
            ?>
            @php($workList = workList())
            @foreach($workList as $work)
              <li>
                <div class="bg--fff">
                  <div class="c-image" style="background-image:url({{ asset('../image/sample/corporate_sample9.jpg') }})"></div>
                  <div class="c-text">
                    <h4 class="c-text__lv4 c-text__weight--700 c-text--center">
                    {{ $work['title'] }}
                    </h4>
                    <p class="c-text__lv5">
                    {{ $work['text'] }}
                    </p>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">大事にしている価値観・労働環境について</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">働き方
          </h4>
          <p class="c-text--center c-text__lv3 c-text__weight--700">2021年9月現在、社員数は55名で、平均年齢32.9歳という組織。
          風土づくりの基軸として、次のバリューを掲げている。</p>
        </div>
        <div class="p-section__body">
          <div class="l-12 l-12--gap24">
            <div class="l-6">
              <p class="c-text__lv4">●Initiative　誰かを待つのではなく、自分がやると声をあげ、皆を巻き込もう。そして私たちは当事者の勇気を全力で支援する仲間であろう。

              ●Liberty　自由の裏側にある強い責任を果たし、自由な発想、自由な環境、自由な方法で、誰に対しても胸を張って正しいと言える行動をしよう。

              ●Creativity　仕事とは今ある価値の提供と新たな価値の創出である。自分の仕事に創造性があるか常に問いかけよう。そして私たちが持つ創造性を最大限追求しよう。</p>
            </div>
            <div class="l-6">
              <div class="p-image">
                <img src="{{ asset('../image/sample/corporate_sample1.jpg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="p-section__foot">
          <div class="c-image__wide" style="background-image:url({{ asset('../image/sample/corporate_sample2.jpg') }})">
          </div>
          <div class="c-text bg-fff">
            <p class="c-text__lv4">「このバリューは大切なものとして、要所要所で語っています。そのためにも、覚えやすいように3項目に絞り、分かりやすく表現したつもりです」（黒佐氏）。
            もちろん、人事考課の定性項目に組み込んで意識付けを図るだけでなく、チームコミュニケーションツールを用いて日常的に意識できる仕組みを導入。3項目のスタンプを設け、メンバーの言動について「これはバリューに則っている」と感じた時にスタンプを押して称えられるようにしている。「本人同士だけでなく、そのやり取りを見た周囲のメンバーへの刺激にもなる」と黒佐氏。

            人材育成においては、書籍購入やセミナー参加等、業務のパフォーマンス向上に繋がると判断したものは特に制限を設けず会社が費用を負担している。PCや周辺機器、アクセサリー類の購入も同様だ。
            「また、入社時のオンボードプログラムから日頃の勉強会まで、部門やチームごとに主体的にしっかり行われています」（黒佐氏）。

            働き方においては、“Liberty”として個人の裁量で自身が最も実力を発揮できる環境で働くことができる。コアタイムなしのフルフレックス、フルリモートワークOK、オフィスはフリーアドレス。全てが自己責任に基づく自己判断を尊重してのことだ。

            社内の親睦を深める機会としては、オフ会的な「マツリカデー」が月1回行われている。コロナ禍後はオンラインで行われているが、プログラムは挙手制による企画担当が工夫。「自由参加でも、毎回ほぼ全員が楽しみに参加している」と黒佐氏。</p>
          </div>
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">より楽しく、働きやすく</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">福利厚生
          </h4>
          <p class="c-text--center c-text__lv3 c-text__weight--700">会社から用意したものではなく、メンバーが欲しいと
            提案したものばかり。社員の声を集めて民主的に運営。</p>
        </div>
        <div class="p-section__body">
          <div class="l-12 l-12--gap24">
            <div class="l-6">
              <div class="p-image">
                <img src="{{ asset('../image/sample/corporate_sample3.jpg') }}" alt="">
              </div>
              <div class="p-image">
                <img src="{{ asset('../image/sample/corporate_sample4.jpg') }}" alt="">
              </div>
            </div>
            <div class="l-6">
              <p class="c-text__lv4">●カフェマツリカン：外出の合い間のワークスペースとしてカフェを利用した場合の費用を補助。
                ●オフィスリバティー：遠方に住むフルリモート社員のコワーキングスペース費用としての手当を支給。
                ●祭り活：複数チームを跨ぐメンバーが5名以上参加する部活への補助。
                ●マツリカンバケーション：毎年1回、連続5日間のリフレッシュ休暇。
                ●ベビーシッター補助：割引券を利用してベビーシッターを利用可能。
                ●住まいサポート：住まいの福利厚生サービスで賃貸・住宅購入時の仲介手数料が無料もしくは半額。
                Etc.

                「会社から用意したものではなく、メンバーが欲しいと提案したものばかり。社員の声を集めて民主的に運営しています」（黒佐氏）。

                そんな同社では、役職や職種無関係に全員がニックネームで呼び合っているところが特徴的だろう。
                「集まっている人材の価値観や性格は見事にバラバラですが、多様性があっていいと思っています。共通点は、バリューに共感し、自律的に考え行動できるところですね。そんな方に来ていただきたいと願っています」
                と黒佐氏は呼び掛ける。</p>
            </div>
          </div>
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">これからのビジョン・事業展望</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">目指す未来
          </h4>
          <p class="c-text--center c-text__lv3 c-text__weight--700">
          「地球に優しい」リーディングカンパニー
          </p>
        </div>
        <div class="p-section__body">
          <div class="l-12 l-12--gap24">
            <div class="l-6">
              <p class="c-text__lv4">1　優れた技術による誠実なものづくりを通じて、空間に新たな価値を創造します。
                2　地球環境に配慮し、良き企業市民として社会の課題解決に取り組みます。
                3　事業に関わるすべての人々を大切にします。
                これらによって、大林組は、持続可能な社会の実現に貢献します。

                ◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯◯

                【リスペクトは個人を信頼・尊重し「個の使命決定力を高める」ことで 企業、そして社会に貢献します】

                「人は自らの使命決定により価値を創造するもの」を前提とし、個人、企業、そして社会に貢献します。
                自己の使命決定力に気づいた人間は、主体的に活き活きと仕事をこなし、創造的な価値を生み出します。
                その実現が私たちリスペクトの使命であり、大きな喜びなのです。</p>
            </div>
            <div class="l-6">
              <img src="{{ asset('../image/sample/corporate_sample5.jpg') }}" alt="">
            </div>
          </div>
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">エントリーはこちらから</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">求人情報
          </h4>
        </div>
        <div class="p-section__body">
          <ul class="p-list__split4">
          <?php
            function cardList(){
              return [
                [
                  'density' => '3',//data-input
                  'color' => '',//class
                  'image_path' => '../image/sample/image_1.jpg',//image
                  'title' => '「喜んでもらえて嬉しい」を本当に感じられるセールスディレクター',//date
                  'company' => '株式会社MIKIWAME',//date
                  'update' => '2022.07.31',//date
                ],
                ['density' => '1', 'color' => 'white','image_path' => '../image/sample/image_2.jpg','update' => '2022.07.30',
                'title' => '「仕事に自由である」ことを共に体現！プログラマ＆エンジニア募集！','company' => '株式会社MIKIWAME'],
                ['density' => '5', 'color' => 'red','image_path' => '../image/sample/image_3.jpg','update' => '2022.07.29',
                'title' => '【未経験歓迎】人事職 ～急成長企業の1人目採用担当を募集します～','company' => '株式会社MIKIWAME'],
              ];
            }
          ?>
          @php($cardList = cardList())
          @foreach($cardList as $card)
            <li data-href="{{ route('job') }}" class="fadeInUp c-card" data-input="{{ $card['density'] }}">
              <div class="c-card--content {{ $card['color'] }}">
                <div class="c-upper">
                  <a class="c-favorite"></a>
                  <div class="c-tag">
                    <ul>
                      <li><p class="c-text__min">先輩からのサポートも充実</p></li>
                      <li><p class="c-text__min">東京23区</p></li>
                      <li><p class="c-text__min">リモートOK</p></li>
                    </ul>
                  </div>
                </div>
                <div class="c-image">
                  <img src="{{ $card['image_path'] }}" alt="{{ $card['title'] }}のメイン画像">
                </div>
                <div class="c-text">
                  <h4 class="c-text__lv4 c-text__weight--700">{{ $card['title'] }}</h4>
                  <div class="c-lower">
                    <p class="c-text__lv7">{{ $card['company'] }}</p>
                    <p class="c-text__min"><time>{{ $card['update'] }}</time>更新</p>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
          </ul>
        </div>
      </section>
      <section class="p-section">
        <div class="p-section__head">
          <span class="c-text--center">詳細情報はこちらで網羅</span>
          <h4 class="c-text__lv2 c-text__weight--900 p-section__title c-text--center">
          @yield('title')の<br class="on_sp">企業情報
          </h4>
        </div>
        <div class="p-section__body">
          <table class="p-table">
            <tbody>
              <tr>
                <th>
                  <p class="c-text__lv5">会社名</p>
                </th>
                <td>
                  <p class="c-text__lv4">株式会社MIKIWAME</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">業界</p>
                </th>
                <td>
                  <p class="c-text__lv4"><span>IT/Web・通信・インターネット系</span>・<span>インターネット/Webサービス・ASP</span></p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">企業の特徴</p>
                </th>
                <td>
                  <p class="c-text__lv4">上場を目指す</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">資本金</p>
                </th>
                <td>
                  <p class="c-text__lv4">7億3066万7153円（資本準備金等含む）</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">設立年月</p>
                </th>
                <td>
                  <p class="c-text__lv4">2015年04月</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">代表者指名</p>
                </th>
                <td>
                  <p class="c-text__lv4">代表取締役CEO　黒佐 英司</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">事業内容</p>
                </th>
                <td>
                  <p class="c-text__lv4">クラウド営業支援ツールSensesの開発・運営
                    営業活動におけるコンサルティング業務
                    その他インターネットインフラ事業の開発・運営</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">株式公開（証券取引所）</p>
                </th>
                <td>
                  <p class="c-text__lv4">非上場</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">主要株主</p>
                </th>
                <td>
                  <p class="c-text__lv4">DNX Ventures
                    株式会社NTTドコモ・ベンチャーズ
                    アーキタイプベンチャーズ株式会社
                    SMBCベンチャーキャピタル株式会社
                    ニッセイ・キャピタル株式会社
                    いよぎんキャピタル株式会社
                    ちばぎんキャピタル株式会社
                    マネックスベンチャーズ株式会社
                    三菱UFJキャピタル株式会社
                    きらぼしキャピタル株式会社
                    フューチャーベンチャーキャピタル株式会社</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">従業員数</p>
                </th>
                <td>
                  <p class="c-text__lv4">100人</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">平均年齢</p>
                </th>
                <td>
                  <p class="c-text__lv4">33.0歳</p>
                </td>
              </tr>
              <tr>
                <th>
                  <p class="c-text__lv5">本社所在地</p>
                </th>
                <td>
                  <p class="c-text__lv4">東京都千代田区神田錦町２丁目2−１ 神田スクエア 11F　WeWork KANDA SQUARE</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    @endslot
    @slot('foot')
    <div class="c-buttonArea__center">
      <a href="{{ route('apply') }}" class="c-button__lg">この企業に応募したい！</a>
    </div>
    @endslot
  @endcomponent

@endsection
