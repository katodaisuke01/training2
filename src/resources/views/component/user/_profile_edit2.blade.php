
  <form action="" method="POST" class="p-form">
    @csrf
    <div class="p-form__body c-concave">
      <ul class="p-list">
        <li class="c-full">
          <div class="head required">
            <p class="c-text__">ひとことアピール（30〜40字程度）</p>
          </div>
          <div class="body">
            <div class="c-input c-input--full">
              <input type="text" name="" required value="" placeholder="例）仕事も遊びもやると決めたら全力で楽しむタイプです！">
            </div>
            <p class="c-text__error">この項目は必ず入力してください</p>
          </div>
        </li>
        <li>
          <div class="head required">
            <p>パーソナリティー（10個まで設定可）</p>
          </div>
          <p class="c-text__error c-mgb8">この項目は必ず1つ以上は設定してください</p>
          <div class="body">
            <p class="c-text__main c-text__lv5 c-mgb8 c-bar">性格について <span></span></p>
            <ul class="p-list__wrap">
              <?php
                function personality1List(){
                  return [
                    ['personality' => '1','label' => 'コミュニケーションが好き'],
                    ['personality' => '2','label' => '集中するのが得意'],
                    ['personality' => '3','label' => 'ガッツあります'],
                    ['personality' => '4','label' => '合理的です'],
                    ['personality' => '5','label' => 'チームプレーが得意'],
                    ['personality' => '6','label' => 'メンタル強者'],
                    ['personality' => '7','label' => 'リーダータイプです'],
                    ['personality' => '8','label' => '実行力がある'],
                    ['personality' => '9','label' => '責任感が強い'],
                    ['personality' => '10','label' => '目立つのが好き'],
                    ['personality' => '11','label' => '仕事にも楽しみを見つけます'],
                    ['personality' => '12','label' => '努力家です'],
                    ['personality' => '13','label' => '参謀タイプです'],
                    ['personality' => '14','label' => '丁寧な仕事'],
                    ['personality' => '15','label' => '自他共に認める陽キャ'],
                    ['personality' => '16','label' => '細かい作業が好き'],
                    ['personality' => '17','label' => '根性論OK'],
                    ['personality' => '18','label' => 'フォロー巧者'],
                  ];
                }
              ?>
              @php($personality1List = personality1List())
              @foreach($personality1List as $personality1)
              <li>
                <div class="body">
                  <div class="c-checkbox">
                    <input type="checkbox" name="personality1" id="personality1_{{ $personality1['personality'] }}">
                    <label for="personality1_{{ $personality1['personality'] }}">{{ $personality1['label'] }}</label>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="body">
            <p class="c-text__main c-text__lv5 c-mgb8 c-bar">趣味について <span></span></p>
            <ul class="p-list__wrap">
              <?php
                function personality2List(){
                  return [
                    ['personality' => '1','label' => '好きな趣味がある'],
                    ['personality' => '2','label' => '仕事が趣味'],
                    ['personality' => '3','label' => '漫画・アニメが好物'],
                    ['personality' => '4','label' => 'アウトドア好き'],
                    ['personality' => '5','label' => '釣り好き'],
                    ['personality' => '6','label' => 'SNSフォロワー1000人超！'],
                    ['personality' => '7','label' => 'ゲーマーです'],
                    ['personality' => '8','label' => 'インターネット強者'],
                    ['personality' => '9','label' => 'スポーツ観戦'],
                    ['personality' => '10','label' => '新しいもの好き'],
                    ['personality' => '11','label' => '推しがあります'],
                    ['personality' => '12','label' => '自己学習'],
                    ['personality' => '13','label' => '極めたものがある'],
                    ['personality' => '14','label' => 'ポケモンGO'],
                    ['personality' => '15','label' => '旅行が好き'],
                    ['personality' => '16','label' => '資格コレクター'],
                  ];
                }
              ?>
              @php($personality2List = personality2List())
              @foreach($personality2List as $personality2)
              <li>
                <div class="body">
                  <div class="c-checkbox">
                    <input type="checkbox" name="personality2" id="personality2_{{ $personality2['personality'] }}">
                    <label for="personality2_{{ $personality2['personality'] }}">{{ $personality2['label'] }}</label>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="body">
            <p class="c-text__main c-text__lv5 c-mgb8 c-bar">グルメについて <span></span></p>
            <ul class="p-list__wrap">
              <?php
                function personality3List(){
                  return [
                    ['personality' => '1','label' => '食べ歩きが好き'],
                    ['personality' => '2','label' => 'ラーメン好き'],
                    ['personality' => '3','label' => '焼き肉がガゾリン'],
                    ['personality' => '4','label' => 'お酒は文化'],
                    ['personality' => '5','label' => '料理好き'],
                    ['personality' => '6','label' => 'スイーツ中毒'],
                    ['personality' => '7','label' => 'カフェ巡り'],
                    ['personality' => '8','label' => 'グルメフェスが好き'],
                    ['personality' => '9','label' => '飲み会マスター'],
                    ['personality' => '10','label' => '行きつけがあります'],
                    ['personality' => '11','label' => '話題の店はチェック'],
                    ['personality' => '12','label' => '日本酒好き'],
                  ];
                }
              ?>
              @php($personality3List = personality3List())
              @foreach($personality3List as $personality3)
              <li>
                <div class="body">
                  <div class="c-checkbox">
                    <input type="checkbox" name="personality3" id="personality3_{{ $personality3['personality'] }}">
                    <label for="personality3_{{ $personality3['personality'] }}">{{ $personality3['label'] }}</label>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="body">
            <p class="c-text__main c-text__lv5 c-mgb8 c-bar">スポーツについて <span></span></p>
            <ul class="p-list__wrap">
              <?php
                function personality4List(){
                  return [
                    ['personality' => '1','label' => 'スポーツは10年以上'],
                    ['personality' => '2','label' => 'スポーツは見る専'],
                    ['personality' => '3','label' => 'フットサル'],
                    ['personality' => '4','label' => 'サッカー'],
                    ['personality' => '5','label' => 'バスケ'],
                    ['personality' => '6','label' => 'バレーボール'],
                    ['personality' => '7','label' => 'テニス'],
                    ['personality' => '8','label' => '陸上競技'],
                    ['personality' => '9','label' => 'ゴルフ'],
                    ['personality' => '10','label' => 'ジムトレ'],
                    ['personality' => '11','label' => 'ボルダリング'],
                    ['personality' => '12','label' => 'スイミング'],
                    ['personality' => '13','label' => 'ラグビーとアメフトは違う'],
                    ['personality' => '14','label' => '野球'],
                    ['personality' => '15','label' => 'バドミントン'],
                    ['personality' => '16','label' => 'スポッチャ'],
                  ];
                }
              ?>
              @php($personality4List = personality4List())
              @foreach($personality4List as $personality4)
              <li>
                <div class="body">
                  <div class="c-checkbox">
                    <input type="checkbox" name="personality4" id="personality4_{{ $personality4['personality'] }}">
                    <label for="personality4_{{ $personality4['personality'] }}">{{ $personality4['label'] }}</label>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="body">
            <p class="c-text__main c-text__lv5 c-mgb8 c-bar">仕事について <span></span></p>
            <ul class="p-list__wrap">
              <?php
                function personality5List(){
                  return [
                    ['personality' => '1','label' => '出社したい'],
                    ['personality' => '2','label' => 'フルリモート希望'],
                    ['personality' => '3','label' => '出社もリモートも'],
                    ['personality' => '4','label' => 'やりたい仕事がある'],
                    ['personality' => '5','label' => '明確なキャリアプランがある'],
                    ['personality' => '6','label' => '自分でキャリアを切り拓きたい'],
                    ['personality' => '7','label' => 'ビジネスで成長したい'],
                  ];
                }
              ?>
              @php($personality5List = personality5List())
              @foreach($personality5List as $personality5)
              <li>
                <div class="body">
                  <div class="c-checkbox">
                    <input type="checkbox" name="personality5" id="personality5_{{ $personality5['personality'] }}">
                    <label for="personality5_{{ $personality5['personality'] }}">{{ $personality5['label'] }}</label>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="body">
            <p class="c-text__main c-text__lv5 c-mgb8 c-bar">その他 <span></span></p>
            <ul class="p-list__wrap">
              <?php
                function personality6List(){
                  return [
                    ['personality' => '1','label' => '好きな国がある'],
                    ['personality' => '2','label' => '奇跡体験あり'],
                    ['personality' => '3','label' => '座右の銘あります'],
                    ['personality' => '4','label' => '100万円貯めてやりたいことがある'],
                    ['personality' => '5','label' => '人生の目標がある'],
                    ['personality' => '6','label' => '家族と仲良し'],
                    ['personality' => '7','label' => '理想の上司像がある'],
                    ['personality' => '8','label' => 'おすすめストレス解消法'],
                    ['personality' => '9','label' => '起業目指してます'],
                  ];
                }
              ?>
              @php($personality6List = personality6List())
              @foreach($personality6List as $personality6)
              <li>
                <div class="body">
                  <div class="c-checkbox">
                    <input type="checkbox" name="personality6" id="personality6_{{ $personality6['personality'] }}">
                    <label for="personality6_{{ $personality6['personality'] }}">{{ $personality6['label'] }}</label>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="c-input--center">
            <div class="c-icon__w32 c-icon--plus"></div>
            <div class="c-input__select ">
              <select>
                <option>ジャンルを選択</option>
                <option>性格について</option>
                <option>趣味について</option>
                <option>グルメについて</option>
                <option>スポーツについて</option>
                <option>仕事について</option>
                <option>その他</option>
              </select>
            </div>
            <div class="c-input__400">
              <input type="text" placeholder="追加したい性格があれば15文字以内で入力してください" value="">
            </div>
          </div>
        </li>
        <li class="c-border__top">
          <div class="head">
            <p>転職へのモチベーション</p>
          </div>
          <div class="body">
            <div class="c-input__select c-input__400">
              <select>
                <option>すぐにでも転職したい</option>
                <option>いいところがあれば</option>
                <option>2,3ヶ月以内には</option>
                <option>現職と比較したい</option>
                <option>半年以内には</option>
              </select>
            </div>
          </div>
        </li>
        <li>
          <div class="head required">
            <p>仕事に求めるやりがい（5個まで設定可）</p>
          </div>
          <p class="c-text__error c-mgb8">この項目は必ず1つ以上は設定してください</p>
          <div class="body">
            @include('component.form._star')
          </div>
        </li>
        <li class="c-border__top">
          <div class="head optional">
            <p>スキル（使用可能なアプリケーション、フレームワークなど）</p>
          </div>
          <div class="body">
            <ul class="p-list">
              <li>
                <div class="c-input__end">
                  <div class="c-input c-input__400">
                    <input type="text" placeholder="例）Microsoft Excel, PowerPoint, Wordなど">
                  </div>
                  <div class="c-input__100">
                    <input type="number" value="" placeholder="3">
                  </div>
                  <span class="c-text__unit">年使用</span>
                </div>
              </li>
              <li>
                <div class="c-input__end">
                  <div class="c-input__400">
                    <input type="text" placeholder="例）Microsoft Excel, PowerPoint, Wordなど">
                  </div>
                  <div class="c-input__100">
                    <input type="number" value="" placeholder="3">
                  </div>
                  <span class="c-text__unit">年使用</span>
                </div>
              </li>
              <li>
                <div class="c-input__end">
                  <div class="c-input__400">
                    <input type="text" placeholder="例）Microsoft Excel, PowerPoint, Wordなど">
                  </div>
                  <div class="c-input__100">
                    <input type="number" value="" placeholder="3">
                  </div>
                  <span class="c-text__unit">年使用</span>
                </div>
              </li>
              <li>
                <div class="c-input__end">
                  <div class="c-input__400">
                    <input type="text" placeholder="例）Microsoft Excel, PowerPoint, Wordなど">
                  </div>
                  <div class="c-input__100">
                    <input type="number" value="" placeholder="3">
                  </div>
                  <span class="c-text__unit">年使用</span>
                </div>
              </li>
              <li>
                <div class="c-input__end">
                  <div class="c-input__400">
                    <input type="text" placeholder="例）Microsoft Excel, PowerPoint, Wordなど">
                  </div>
                  <div class="c-input__100">
                    <input type="number" value="" placeholder="3">
                  </div>
                  <span class="c-text__unit">年使用</span>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="c-border__top">
          <div class="head optional">
            <p>希望勤務地</p>
          </div>
          <div class="body">
            <ul class="p-list__wrap">
              <li>
                <div class="c-input__center">
                  <span class="c-text__unit">第一希望</span>
                  <div class="c-input__select c-input__150">
                    @include('component.form.select._select-prefecture')
                  </div>
                </div>
              </li>
              <li>
                <div class="c-input__center">
                  <span class="c-text__unit">第二希望</span>
                  <div class="c-input__select c-input__150">
                    @include('component.form.select._select-prefecture')
                  </div>
                </div>
              </li>
              <li>
                <div class="c-input__center">
                  <span class="c-text__unit">第三希望</span>
                  <div class="c-input__select c-input__150">
                    @include('component.form.select._select-prefecture')
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="c-border__top">
          <div class="head optional">
            <p>希望業界</p>
          </div>
          <div class="body">
            <ul class="p-list__wrap">
              <li>
                <div class="c-input__select">
                  <select>
                    <option value="">希望業界を選択</option>
                    <option value="">電気・電子・半導体</option>
                    <option value="">機械・メカトロ・自動車</option>
                  </select>
                </div>
              </li>
              <li>
                <div class="c-input__select">
                  <select>
                    <option value="">希望業界を選択</option>
                    <option value="">電気・電子・半導体</option>
                    <option value="">機械・メカトロ・自動車</option>
                  </select>
                </div>
              </li>
              <li>
                <div class="c-input__select">
                  <select>
                    <option value="">希望業界を選択</option>
                    <option value="">電気・電子・半導体</option>
                    <option value="">機械・メカトロ・自動車</option>
                  </select>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="c-border__top">
          <div class="head optional">
            <p>希望職種</p>
          </div>
          <div class="body">
            <ul class="p-list__wrap">
              <li>
                <div class="c-input__select">
                  <select>
                    <option value="">希望職種を選択</option>
                    <option value="">営業職</option>
                    <option value="">コールセンター・カスタマーサポート</option>
                  </select>
                </div>
              </li>
              <li>
                <div class="c-input__select">
                  <select>
                    <option value="">希望職種を選択</option>
                    <option value="">営業職</option>
                    <option value="">コールセンター・カスタマーサポート</option>
                  </select>
                </div>
              </li>
              <li>
                <div class="c-input__select">
                  <select>
                    <option value="">希望職種を選択</option>
                    <option value="">営業職</option>
                    <option value="">コールセンター・カスタマーサポート</option>
                  </select>
                </div>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <div class="p-form__foot">
      <div class="c-buttonArea__center c-column">
        <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        @if(strstr($url,'mypage'))
          <a href="{{route('mypage')}}?flash=successSave" class="c-button__lg">入力内容を保存</a>
        @elseif(strstr($url,'admin'))
          <a href="{{route('userDetail')}}?flash=successSave" class="c-button__lg">入力内容を保存</a>
        @endif
        <a class="c-button__min c-button__gray" href="javascript:history.back()">キャンセル</a>
        <!-- <input type="submit" class="c-button__lg" value="入力内容を保存"> -->
      </div>
    </div>
  </form>