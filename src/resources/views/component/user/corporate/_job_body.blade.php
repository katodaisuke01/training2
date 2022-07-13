      <section class="p-section">
        <div class="p-section__head">
          <h4 class="c-text__lv3 c-text__weight--700">仕事のやりがい</h4>
        </div>
        <div class="p-section__body">
          <ul class="p-list__wrap">
            <?php
              function attractiveList(){
                return [
                  ['attractive' => '新しい挑戦がある'],
                  ['attractive' => '自身の成長を感じる'],
                  ['attractive' => '制作の達成感'],
                  ['attractive' => 'お客様からのありがとう'],
                  ['attractive' => '市場価値の高い商品']
                ];
              }
            ?>
            @php($attractiveList = attractiveList())
            @foreach($attractiveList as $attractive)
            <li><p class="c-tag__attractive">{{ $attractive['attractive'] }}</p></li>
            @endforeach
          </ul>
        </div>
      </section>
      <div class="p-job__detail">
        <div class="l">
          <div class="l-auto">
            <div>
              <section class="p-section">
                <div class="p-section__head">
                  <h4 class="c-text__lv3 c-text__weight--700">事業内容</h4>
                </div>
                <div class="p-section__body">
                  <p class="c-text__lv4 c-text__space--wrap">株式会社MIKIWAMEは「EXCITING WITH YOU」をコンセプトに、
世の中にワクワクをつくりだすデジタルクリエイティブエージェンシーです。

山盛りの好奇心とお客様の期待以上にたどり着きたいという情熱を武器に、
WEBの企画制作や実装から、広告施策全体の設計、システム開発、AR・VR制作など、
デジタル表現の制作全般を行なっています。

世の中にワクワクをつくりだすには、まずはクリエイターがワクワクしていること。
株式会社MIKIWAMEが大切にしているのは、まさにその魂です。

企画で、技術で、デザインで、世界を面白くしたい人。「こういうものがあったらいいな！」と、ムクムクと想像力を働かせ、全力投球できる人。自分の可能性を決めつけることなく、様々なプロジェクトにやってみる！精神で、楽しんでチャレンジする人。

そして、つくることが好きで、好きで、大好きで、たまらないあなたへ。
最高のスキルが発揮できる環境をお約束します。
私たちとタッグを組み、みんながワクワクできるクリエイションを生みだしましょう。
                  </p>
                </div>
                <div class="p-section__foot">
                  <div class="l-12 l-12--gap8">
                    <div class="l-6">
                      <div class="c-image__wide" style="background-image:url({{ asset('../image/sample/image_4.jpg') }})"alt="@yield('title')の事業内容画像1">
                      </div>
                      <div class="c-text">
                        <p>
                          Web制作やアプリ開発、デジタルサイネージなど、デジタルインタラクティブを主業務とする制作会社です。
                        </p>
                      </div>
                    </div>
                    <div class="l-6">
                      <div class="c-image__wide" style="background-image:url({{ asset('../image/sample/image_5.jpg') }})"alt="@yield('title')の事業内容画像1">
                      </div>
                      <div class="c-text">
                        <p>
                          Web制作やアプリ開発、デジタルサイネージなど、デジタルインタラクティブを主業務とする制作会社です。
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="p-section">
                <div class="p-section__head">
                  <h4 class="c-text__lv3 c-text__weight--700">仕事の魅力</h4>
                </div>
                <div class="p-section__body">
                  <div class="c-image__wide" style="background-image:url({{ asset('../image/sample/image_6.jpg') }})"alt="@yield('title')の事業内容画像1">
                  </div>
                </div>
                <div class="p-section__foot">
                  <p class="c-text__lv4 c-text__space--wrap">株式会社MIKIWAMEは「EXCITING WITH YOU」をコンセプトに、
世の中にワクワクをつくりだすデジタルクリエイティブエージェンシーです。

山盛りの好奇心とお客様の期待以上にたどり着きたいという情熱を武器に、
WEBの企画制作や実装から、広告施策全体の設計、システム開発、AR・VR制作など、
デジタル表現の制作全般を行なっています。

世の中にワクワクをつくりだすには、まずはクリエイターがワクワクしていること。
株式会社MIKIWAMEが大切にしているのは、まさにその魂です。

企画で、技術で、デザインで、世界を面白くしたい人。「こういうものがあったらいいな！」と、ムクムクと想像力を働かせ、全力投球できる人。自分の可能性を決めつけることなく、様々なプロジェクトにやってみる！精神で、楽しんでチャレンジする人。

そして、つくることが好きで、好きで、大好きで、たまらないあなたへ。
最高のスキルが発揮できる環境をお約束します。
私たちとタッグを組み、みんながワクワクできるクリエイションを生みだしましょう。
                  </p>
                </div>
              </section>
              <section class="p-section">
                <div class="p-section__body">
                  <?php
                    function itemList(){
                      return [
                        [
                          'item_label' => '職務について',
                          'item_content' => 'MIKIWAMEでは、顧客のデジタルプロダクトのグロース支援を行っておりますので、ただの制作支援ではありません！
                          顧客と同じ目線で開発にあたっているからこそ、実現しうるコミュニケーションがあります。顧客と信頼関係を築いた上で、同じプロジェクトのメンバーとして、プロダクトの成長支援をしております。
                          また弊社の正社員として、各種社会保険、福利厚生、教育・評価制度を享受し、安定した雇用環境で働いております。'
                        ],
                        [
                          'item_label' => '雇用区分',
                          'item_content' => '正社員'
                        ],
                        [
                          'item_label' => '想定年収',
                          'item_content' => '400万円〜600万円
                          ※能力・経験・前給を考慮のうえ、当社規定により決定いたします。
                          賞与：年2回（6月・12月） 
                          給与改定：年2回（4月・10月） 
                          【年収例】
                          年収700万円／38歳／月給50万＋賞与／Webディレクター経験5年
                          年収600万円／33歳／月給45万＋賞与／マークアップ経験5年
                          年収500万円／28歳'
                        ],
                        [
                          'item_label' => '選考プロセス',
                          'item_content' => '1.書類選考
                          2.適性検査
                          3.面接（2回程度）
                          4.内定
                          ※ご要望がございましたら、カジュアル面談という形で会社説明の機会も設けております。
                          ※面談、面接ともにすべてオンライン（Google Meet）にて実施いたします。
                          ※ご応募～内定通知までは、約3週間～1か月程度を想定しております。（お急ぎの場合には、事前に申し伝えいただけましたら、随時ご対応させていただきます）'
                        ],
                        [
                          'item_label' => '勤務地',
                          'item_content' => '【勤務地詳細】
                          五反田オフィスまたは常駐先（東京都・神奈川県・千葉県内）
                          五反田オフィス：東京都品川区西五反田7丁目25番5号　オーク五反田ビル5階
                          ※転居を伴う転勤はございません。
                          【アクセス】
                          JR山手線、東急池上線、都営浅草線「五反田駅」 徒歩10分
                          東急池上線「大崎広小路駅」 徒歩8分'
                        ],
                        [
                          'item_label' => '待遇・福利厚生',
                          'item_content' => '■勤務時間補足
                          プロジェクト先によって異なる場合があります。
                          月の平均残業時間は15～20時間程度
                          ■福利厚生
                          社会保険完備
                          通勤手当:月上限5万円
                          時間外労働手当
                          定期健康診断
                          産休育休取得制度
                          社員紹介制度
                          時間短縮勤務制度
                          永年勤続表彰※勤続年数に応じて祝金の支給、永年勤続休暇を付与します 
                          リロクラブ
                          ■教育制度
                          新入社員研修
                          技能研修、評価制度研修
                          CCDLab:社内大学
                          社内勉強会:昨期実績30回/6ヵ月
                          キャリアサポート制度:スキル認定資格取得支援,有料講座参加支援,書籍購入費補助'
                        ],
                        [
                          'item_label' => '休日・休暇',
                          'item_content' => '■土・日・祝日
                          ■夏季休暇（3日）
                          ■年末年始休暇（5日）
                          ■年次有給休暇（初年度最大10日）
                          ■慶弔・特別休暇
                          ■生理休暇
                          ■永年勤続リフレッシュ休暇
                          ■看護休暇
                          ■介護休暇
                          ■スキルアップ休暇
                          ■特別休暇（結婚、出産、お子様の結婚の際に休暇取得が可能）
                          ※年間休日 122日'
                        ],
                        [
                          'item_label' => '教育制度',
                          'item_content' => '■新入社員研修
                          ■技能スキル研修
                          ■評価制度研修
                          ■CCDLab(社内大学)
                          ■社内勉強会（昨期実績30回/6ヵ月）
                          ■多様な経歴の社員による自主勉強会
                          ■メンバーズキャリアカンパニー主催の外部公開セミナー
                          ■メンバーズグループ内のナレッジシェアやオープンカレッジ
                          
                          その他、様々な制度がございます。
                          ■キャリアサポート制度
                          ・資格受験料支援（認定している資格の受験料を一部弊社で負担いたします）
                          ・有料講座参加支援（一人当たり最大20万円まで）
                          ・書籍購入費補助（1万5千円まで）
                          ■情報セキュリティ研修
                          ■公開型技能スキル研修
                          ■メンバーズオープンカレッジ
                          ■目標設定面談 
                          ■蔵書制度
                          ■リロクラブ(福利厚生）'
                        ],
                      ];
                    }
                  ?>
                  @php($itemList = itemList())
                  @foreach($itemList as $item)
                    <div class="c-box bg-fff">
                      <div class="c-box__head">
                        <p class="c-text__lv4 c-text__main">{{ $item['item_label'] }}</p>
                      </div>
                      <div class="c-box__body">
                        <p class="c-text__lv4">{{ $item['item_content'] }}</p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </section>
            </div>
          </div>
          <div class="l-fix__300 c-sticky">
            @include('component.user.corporate._sidebar_job')
          </div>
        </div>
      </div>