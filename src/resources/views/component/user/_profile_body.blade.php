<?php
$url = $_SERVER['REQUEST_URI'];
?>
@if(strstr($url,'company'))
@elseif(strstr($url,'corporate'))
@elseif(strstr($url,'company'))
@elseif(strstr($url,'admin'))
  <div class="p-panel">
    <ul class="p-list__split4">
      <li class="l-3">
        <div class="c-box"><a href="{{ route('userFavorite') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">気になる！数</p>
            <p class="c-text__note">気になる！した求人の数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">19<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
      <li class="l-3">
        <div class="c-box"><a href="{{ route('userEntry') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">エントリー数</p>
            <p class="c-text__note">応募した求人の数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">5<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
      <li class="l-3">
        <div class="c-box"><a href="{{ route('userScout') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">スカウト数</p>
            <p class="c-text__note">企業から受けたスカウトの数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">29<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
      <li class="l-3">
        <div class="c-box"><a href="{{ route('userCuriosity') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">企業からの気になる！数</p>
            <p class="c-text__weight--900 c-text__note">企業から受けた気になる！の数です。</p>  
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">48<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
@else
  <div class="p-panel">
    <ul class="p-list__split4">
      <li class="l-3">
        <div class="c-box"><a href="{{ route('favorite') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">気になる！数</p>
            <p class="c-text__note">気になる！した求人の数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">19<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
      <li class="l-3">
        <div class="c-box"><a href="{{ route('entry') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">エントリー数</p>
            <p class="c-text__note">応募した求人の数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">5<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
      <li class="l-3">
        <div class="c-box"><a href="{{ route('scout') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">スカウト数</p>
            <p class="c-text__note">企業から受けたスカウトの数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">29<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
      <li class="l-3">
        <div class="c-box"><a href="{{ route('curiosity') }}"></a>
          <div class="c-upper">
            <p class="c-text__weight--900 c-text__lv5">企業からの気になる！数</p>
            <p class="c-text__weight--900 c-text__note">企業から受けた気になる！の数です。</p>
          </div>
          <div class="c-lower">
            <p class="c-frame">確認する</p>
            <div class="c-right">
              <p class="c-text__weight--900 c-text__lv1">48<span class="c-text__unit">件</span></p>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
@endif
<div class="c-box bg-fff">
  <ul class="p-list">
    <li>
      <div class="head">
        <p class="c-text__lv5 c-text__weight--700">ひとことアピール</p>
          <?php
          $url = $_SERVER['REQUEST_URI'];
          ?>
          @if(strstr($url,'mypage'))
            <div class="c-buttonArea__end">
              <a href="{{ route('edit2') }}" class="c-button__min c-button__line">編集</a>
            </div>
          @elseif(strstr($url,'admin'))
            <div class="c-buttonArea__end">
              <a href="{{route('userEdit2')}}" class="c-button__min c-button__line">編集</a>
            </div>
          @else
          @endif
      </div>
      <div class="body">
        <p class="c-text__lv3 c-text--center c-text__main c-border c-text__weight--700">仕事も遊びもやると決めたら全力で楽しむタイプです！</p>
      </div>
    </li>
    <li>
      <div class="head">
        <p class="c-text__lv5">パーソナリティー</p>
      </div>
      <div class="body">
        <ul class="p-list__wrap">
          <li><p class="c-tag__main full">コミュニケーションが好き！</p></li>
          <li><p class="c-tag__main full">キックボクシングが趣味</p></li>
          <li><p class="c-tag__main full">美味しいお店知ってます</p></li>
          <li><p class="c-tag__main full">飲み会好きです</p></li>
          <li><p class="c-tag__main full">バレーボール</p></li>
          <li><p class="c-tag__main full">ゼルダの伝説</p></li>
          <li><p class="c-tag__main full">映画は映画館派</p></li>
          <li><p class="c-tag__main full">犬派</p></li>
          <li><p class="c-tag__main full">インドアもアウトドアも</p></li>
          <li><p class="c-tag__main full">旅行好き</p></li>
        </ul>
      </div>
    </li>
    <li>
      <div class="head">
        <p class="c-text__lv5">転職へのモチベーション</p>
      </div>
      <div class="body">
        <p class="c-text__lv3 c-text__weight--700 c-text__main">すぐにでも転職したい</p>
      </div>
    </li>
    <li>
      <div class="head">
        <p class="c-text__lv5">仕事に求めるやりがい</p>
      </div>
      <div class="body">
        <ul class="p-list__wrap">
          <li><p class="c-tag__main full">新しい挑戦がある</p></li>
          <li><p class="c-tag__main full">自身の成長を感じる</p></li>
          <li><p class="c-tag__main full">制作の達成感</p></li>
          <li><p class="c-tag__main full">お客様からのありがとう</p></li>
          <li><p class="c-tag__main full">自主性が認められる</p></li>
        </ul>
      </div>
    </li>
    <li>
      <div class="head">
        <p class="c-text__lv5">スキル<small>（使用可能なアプリケーション、フレームワークなど）</small></p>
      </div>
      <div class="body">
        <ul class="p-list p-skill">
          <li>
            <p>Microsoft Excel, Microsoft PowerPoint, Microsoft Word</p>
            <div class="c-right">
              <p class="c-text__main c-text__lv4">5<span class="c-text__unit">年経験</span></p>
            </div>
          </li>
          <li>
            <p>Adobe Illustrator, Adobe Photoshop, Adobe XD</p>
            <div class="c-right">
              <p class="c-text__main c-text__lv4">3<span class="c-text__unit">年経験</span></p>
            </div>
          </li>
          <li>
            <p>プロモーションマーケティング</p>
            <div class="c-right">
              <p class="c-text__main c-text__lv4">2<span class="c-text__unit">年経験</span></p>
            </div>
          </li>
        </ul>
      </div>
    </li>
    <li>
      <div class="head">
        <p class="c-text__lv5">希望条件</p>
      </div>
      <div class="body">
        <ul class="p-list">
          <li>
            <div class="head">
              <p class="c-text__main c-text__label">希望勤務地</p>
            </div>
            <div class="body">
              <ul class="p-list__wrap">
                <li><p class="c-text__weight--700 c-text__lv4"><small class="c-text__note c-unit__before">第一希望</small>東京都</p></li>
                <li><p class="c-text__weight--700 c-text__lv4"><small class="c-text__note c-unit__before">第二希望</small>神奈川県</p></li>
                <li><p class="c-text__weight--700 c-text__lv4"><small class="c-text__note c-unit__before">第三希望</small>千葉県</p></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="head">
              <p class="c-text__main c-text__label">希望業界</p>
            </div>
            <div class="body">
              <ul class="p-list__wrap">
                <li><p class="c-text__weight--700 c-text__lv4">ITコンサル</p></li>
                <li><p class="c-text__weight--700 c-text__lv4">人材サービス</p></li>
                <li><p class="c-text__weight--700 c-text__lv4">電気・電子・機械・半導体</p></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="head">
              <p class="c-text__main c-text__label">希望職種</p>
            </div>
            <div class="body">
              <ul class="p-list__wrap">
                <li><p class="c-text__weight--700 c-text__lv4">マーケ・広告宣伝・販促・PR</p></li>
                <li><p class="c-text__weight--700 c-text__lv4">商品・サービス企画</p></li>
                <li><p class="c-text__weight--700 c-text__lv4">プロダクトマネージャー</p></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</div>
<div class="c-box bg-fff">
  <ul class="p-list">
    <li>
      <div class="head">
        <p class="c-text__lv5">職務経歴</p>
          <?php
          $url = $_SERVER['REQUEST_URI'];
          ?>
          @if(strstr($url,'mypage'))
            <div class="c-buttonArea__end">
              <a href="{{route('edit3')}}" class="c-button__min c-button__line">編集</a>
            </div>
          @elseif(strstr($url,'admin'))
            <div class="c-buttonArea__end">
              <a href="{{route('userEdit3')}}" class="c-button__min c-button__line">編集</a>
            </div>
          @else
          @endif
      </div>
      <div class="body">
        <ul class="p-list__border">
          <li>
            <div class="p-list__border--head">
              <ul class="p-list__wrap">
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">会社名</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">株式会社MIKIWAME</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">職種</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">営業職</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">雇用形態</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">正社員</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">在職期間</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">
                      2018<span class="c-text__unit">年</span>10<span class="c-text__unit">月</span>〜現職
                    </p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="p-list__border--body">
              <ul class="p-list">
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">職務内容</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv5">成果報酬型の新規集客⽤コンテンツのソリューション営業、掲載内容の作成や効果検証など</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">業務内容</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv5 c-text__space--wrap">新規開拓営業 80％（電話営業 80 件·訪問 3 件∕1 ⽇）フォロー営業 20％
                      
*** 営業業務 *** （約 1 年）
■新規開拓業務
·営業先選定/リスト作成（美容院、飲⾷店などのサービス業）·コール発信  ·提案書作成·商談対応/議事録作成、送信  ·⾒込み顧客へメール送信
■既存顧客フォロー
·商品納品前の内容確認  ·広告掲載後のターゲティング設定の改善提案  ·状況に合わせたアップ/クロスセル実施  ·レポート作成（週次）
■営業実績
⼊社後 3 ヵ⽉で契約数 10 件以上、売上 800 万以上達成し、新⼈賞を獲得
※新⼈賞：⼊社後 3 ヵ⽉以内の契約数 5 件以上、及び売上 700 万円以上が獲得条件
⼊社後 6 カ⽉に主任に就任し、5 ⼈のマネジメントを担当。様々な施策の実施や効果検証を⾏い、チーム売上の向上に貢献。前⽉より⾼い⽬標を設定し毎⽉達成することができた。
◎課題点と⼯夫
課題：知名度の低い商材を法⼈向けの新規開拓営業において、いかにして契約していただくか
⼯夫：限られた時間の中で⽣産性を上げる為、契約数の多い社員との情報交換や各メディアのリサーチを基にした提案や他媒体との違いをリサーチするなど、アプローチや提案の⼯夫などを⾏った。
【退職理由】
事業譲渡により会社や事業の⽅向性が変わってしまい、営業のポジションがなくなってしまったため。
                  </p>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <!-- ↓↓↓↓↓↓デザイン用　後で消す↓↓↓↓↓↓ -->
          <li>
            <div class="p-list__border--head">
              <ul class="p-list__wrap">
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">会社名</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">株式会社MIKIWAME</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">職種</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">営業職</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">雇用形態</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">正社員</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">在職期間</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv4 c-text__weight--700">
                      2015<span class="c-text__unit">年</span>4<span>月</span>〜2018<span class="c-text__unit">年</span>10<span>月</span>
                    </p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="p-list__border--body">
              <ul class="p-list">
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">職務内容</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv5">成果報酬型の新規集客⽤コンテンツのソリューション営業、掲載内容の作成や効果検証など</p>
                  </div>
                </li>
                <li>
                  <div class="head">
                    <p class="c-text__label c-text__main">業務内容</p>
                  </div>
                  <div class="body">
                    <p class="c-text__lv5 c-text__space--wrap">新規開拓営業 80％（電話営業 80 件·訪問 3 件∕1 ⽇）フォロー営業 20％
*** 営業業務 *** （約 1 年）
　■新規開拓業務
　·営業先選定/リスト作成（美容院、飲⾷店などのサービス業）·コール発信  ·提案書作成·商談対応/議事録作成、送信  ·⾒込み顧客へメール送信
　■既存顧客フォロー
　·商品納品前の内容確認  ·広告掲載後のターゲティング設定の改善提案  ·状況に合わせたアップ/クロスセル実施  ·レポート作成（週次）
　■営業実績
　⼊社後 3 ヵ⽉で契約数 10 件以上、売上 800 万以上達成し、新⼈賞を獲得
　※新⼈賞：⼊社後 3 ヵ⽉以内の契約数 5 件以上、及び売上 700 万円以上が獲得条件
　⼊社後 6 カ⽉に主任に就任し、5 ⼈のマネジメントを担当。様々な施策の実施や効果検証を⾏い、チーム売上の向上に貢献。前⽉より⾼い⽬標を設定し毎⽉達成することができた。
　◎課題点と⼯夫
　課題：知名度の低い商材を法⼈向けの新規開拓営業において、いかにして契約していただくか
　⼯夫：限られた時間の中で⽣産性を上げる為、契約数の多い社員との情報交換や各メディアのリサーチを基にした提案や他媒体との違いをリサーチするなど、アプローチや提案の⼯夫などを⾏った。
　【退職理由】
　事業譲渡により会社や事業の⽅向性が変わってしまい、営業のポジションがなくなってしまったため。</p>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <!-- ここまでデザイン用　後で消す -->
        </ul>
      </div>
    </li>
  </ul>
</div>