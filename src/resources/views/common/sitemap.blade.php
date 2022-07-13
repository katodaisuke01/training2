@section('page_class', 'l-page p-setting')
@section('title', 'サイトマップ')
@section('description', 'このページはミキワメ転職のサイトマップページです。')
@section('page_title', 'サイトマップ | ミキワメ転職')
@extends('layouts.user.default')

@section('content')
  @component('component.user.frame._default_short')
    @slot('body')
      <div class="c-box c-box__900 bg-fff">
        <div class="c-box__body">
          <div class="l-12 l-12--gap16">
            <div class="l-6">
              <ul class="p-list">
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">登録・変更</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <li><a href="{{route('register')}}" class="c-text__lv5">新規会員登録</a></li>
                      <li><a href="{{route('reset')}}" class="c-text__lv5">パスワード再発行</a></li>
                    </ul>
                  </div>              
                </li>
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">ヘルプ</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <li><a href="{{route('faq')}}" class="c-text__lv5">よくあるご質問</a></li>
                    </ul>
                  </div>              
                </li>
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">その他</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <li><a href="{{route('register')}}" class="c-text__lv5">運営会社</a></li>
                      <li><a href="{{route('reset')}}" class="c-text__lv5">プライバシーポリシー</a></li>
                      <li><a href="{{route('terms')}}" class="c-text__lv5">利用規約</a></li>
                      <li><a href="{{route('diagnose')}}" class="c-text__lv5">適職診断</a></li>
                    </ul>
                  </div>              
                </li>
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">職種（大項目）で求人を探す</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <?php
                      function div1List(){
                        return [
                          ['div1_id' => 'div1_1','div1_name' => '営業職'],
                          ['div1_id' => 'div1_2','div1_name' => '商品企画・マーケティング'],
                          ['div1_id' => 'div1_3','div1_name' => '経営企画・事業企画・管理部門'],
                          ['div1_id' => 'div1_4','div1_name' => '事務職'],
                          ['div1_id' => 'div1_5','div1_name' => 'コールセンター・カスタマーサポート'],
                          ['div1_id' => 'div1_6','div1_name' => '接客販売職'],
                          ['div1_id' => 'div1_7','div1_name' => 'クリエイティブ職'],
                          ['div1_id' => 'div1_8','div1_name' => 'エンジニア'],
                          ['div1_id' => 'div1_9','div1_name' => 'ITコンサルタント'],
                          ['div1_id' => 'div1_10','div1_name' => '電気・電子・半導体'],
                          ['div1_id' => 'div1_11','div1_name' => '機械・メカトロ・自動車'],
                          ['div1_id' => 'div1_12','div1_name' => '素材・化学・食品'],
                          ['div1_id' => 'div1_13','div1_name' => '建設・建築・施工管理'],
                          ['div1_id' => 'div1_14','div1_name' => 'ビジネスコンサルタント'],
                          ['div1_id' => 'div1_15','div1_name' => '金融系専門職'],
                          ['div1_id' => 'div1_16','div1_name' => '不動産系専門職'],
                          ['div1_id' => 'div1_17','div1_name' => '医療系専門職'],
                          ['div1_id' => 'div1_18','div1_name' => '医師・士業'],
                          ['div1_id' => 'div1_19','div1_name' => 'インストラクター・通訳・ドライバー'],
                          ['div1_id' => 'div1_20','div1_name' => 'その他']
                        ];
                      }
                    ?>
                    @php($div1List = div1List())
                    @foreach($div1List as $div1)
                      <li><a href="{{route('register')}}" class="c-text__lv5">{{ $div1['div1_name'] }}</a></li>
                    @endforeach
                    </ul>
                  </div>              
                </li>
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">職種（小項目）で求人を探す</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <?php
                      function div2List(){
                        return [
                          ['div2_id' => 'div2_1','div2_name' => '法人営業'],
                          ['div2_id' => 'div2_2','div2_name' => '個人営業'],
                          ['div2_id' => 'div2_3','div2_name' => 'ルートセールス'],
                          ['div2_id' => 'div2_4','div2_name' => '内勤営業・カウンターセールス'],
                          ['div2_id' => 'div2_5','div2_name' => 'キャリアカウンセラー・人材コーディネーター'],
                          ['div2_id' => 'div2_6','div2_name' => '技術営業'],
                          ['div2_id' => 'div2_7','div2_name' => 'MR'],
                          ['div2_id' => 'div2_8','div2_name' => '営業企画'],
                          ['div2_id' => 'div2_9','div2_name' => 'マーケティング'],
                          ['div2_id' => 'div2_10','div2_name' => '商品企画'],
                          ['div2_id' => 'div2_11','div2_name' => '商品開発'],
                          ['div2_id' => 'div2_12','div2_name' => 'バイヤー'],
                          ['div2_id' => 'div2_13','div2_name' => 'マーチャンダイザー'],
                          ['div2_id' => 'div2_14','div2_name' => '物流'],
                          ['div2_id' => 'div2_15','div2_name' => 'リサーチャー'],
                          ['div2_id' => 'div2_16','div2_name' => 'データサイエンティスト']
                        ];
                      }
                    ?>
                    @php($div2List = div2List())
                    @foreach($div2List as $div2)
                      <li><a href="{{route('register')}}" class="c-text__lv5">{{ $div2['div2_name'] }}</a></li>
                    @endforeach
                    </ul>
                  </div>              
                </li>
              </ul>
            </div>
            <div class="l-6">
              <ul class="p-list">
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">仕事の魅力で求人を探す</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <?php
                        function starList(){
                          return [
                            ['star_id' => 'star_1','star_name' => '新しい挑戦がある'],
                            ['star_id' => 'star_2','star_name' => '自身の成長を感じる'],
                            ['star_id' => 'star_3','star_name' => '制作の達成感'],
                            ['star_id' => 'star_4','star_name' => 'お客様からのありがとう'],
                            ['star_id' => 'star_5','star_name' => '市場価値の高い商品'],
                            ['star_id' => 'star_6','star_name' => '自主性が認められる'],
                            ['star_id' => 'star_7','star_name' => '仲間とのチームプレー'],
                            ['star_id' => 'star_8','star_name' => '資格取得ができる'],
                            ['star_id' => 'star_9','star_name' => '色々な人との関わり'],
                            ['star_id' => 'star_10','star_name' => '結果でしっかりした評価'],
                            ['star_id' => 'star_11','star_name' => '褒める社風がある'],
                            ['star_id' => 'star_12','star_name' => 'お客様の反応を感じられる'],
                            ['star_id' => 'star_13','star_name' => '意見を発言しやすい雰囲気'],
                            ['star_id' => 'star_14','star_name' => '先輩のサポートで安心'],
                            ['star_id' => 'star_15','star_name' => '最新技術に取り組める'],
                            ['star_id' => 'star_16','star_name' => '集中できる環境'],
                            ['star_id' => 'star_17','star_name' => '社会貢献に携わる'],
                            ['star_id' => 'star_18','star_name' => '全てのフェーズに関われる']
                          ];
                        }
                      ?>
                      @php($starList = starList())
                      @foreach($starList as $star)
                      <li>
                        <div class="body">
                          <a href="{{route('index')}}" class="c-text__lv5">{{ $star['star_name'] }}</a>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </li>
                <li>
                  <div class="head bg-accent">
                    <p class="c-text__lv6 c-text__weight--700">こだわり条件で求人を探す</p>
                  </div>
                  <div class="body">
                    <ul class="p-list__wrap">
                      <?php
                        function otherList(){
                          return [
                            ['other_id' => 'other_1','other_name' => '社員登用あり'],
                            ['other_id' => 'other_2','other_name' => '昇給・昇格あり'],
                            ['other_id' => 'other_3','other_name' => '残業なし'],
                            ['other_id' => 'other_4','other_name' => '週1日～OK'],
                            ['other_id' => 'other_5','other_name' => '週2,3日～OK'],
                            ['other_id' => 'other_6','other_name' => 'シフト自由'],
                            ['other_id' => 'other_7','other_name' => '高収入'],
                            ['other_id' => 'other_8','other_name' => '交通費支給'],
                            ['other_id' => 'other_9','other_name' => '即日勤務OK'],
                            ['other_id' => 'other_10','other_name' => '急募'],
                            ['other_id' => 'other_11','other_name' => '駅近5分以内'],
                            ['other_id' => 'other_12','other_name' => 'フルリモート'],
                            ['other_id' => 'other_13','other_name' => 'リモートOK'],
                            ['other_id' => 'other_14','other_name' => 'フレックス制度あり'],
                            ['other_id' => 'other_15','other_name' => '年間休日120以上'],
                            ['other_id' => 'other_16','other_name' => '土日祝休み'],
                            ['other_id' => 'other_17','other_name' => '直行直帰OK'],
                            ['other_id' => 'other_18','other_name' => 'マイカー通勤可能'],
                            ['other_id' => 'other_19','other_name' => '社宅有り'],
                            ['other_id' => 'other_20','other_name' => '引越補助'],
                            ['other_id' => 'other_21','other_name' => '私服勤務可'],
                            ['other_id' => 'other_22','other_name' => 'リフレッシュ休暇あり'],
                            ['other_id' => 'other_23','other_name' => '転勤なし'],
                            ['other_id' => 'other_24','other_name' => '副業OK']
                          ];
                        }
                      ?>
                      @php($otherList = otherList())
                      @foreach($otherList as $other)
                      <li><a href="{{route('register')}}" class="c-text__lv5">{{ $other['other_name'] }}</a></li>
                      @endforeach
                    </ul>
                  </div>              
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
