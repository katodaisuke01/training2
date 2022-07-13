@extends('layouts.admin.default')

@section('page_class', 'l-page')
@section('title', 'マスター管理')

@section('content')
  @component('component.admin.frame._default')
    @slot('head')
      <div class="c-icon__w32 c-icon--master"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title')</h1>
      <div class="c-buttonArea__end">
        <a href="{{ route('adminMasterCreate') }}" class="c-button__min">新規登録</a>
      </div>
    @endslot
    @slot('body')
    <!-- 一覧 -->
      <div class="c-box">
        <div class="c-box__head">
          <div class="c-right">
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">仕事に求めるやりがい登録数</span>18<small class="c-text__note">件</small></p>
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">パーソナリティー登録数</span>16<small class="c-text__note">件</small></p>
            <p class="c-text__lv3 c-text__weight--900 c-text__main"><span class="c-text__note">こだわり条件登録数</span>16<small class="c-text__note">件</small></p>
          </div>
        </div>
        <div class="c-box__body">
          <table class="p-table data-tables">
            <thead>
              <tr>
                <th class=""><a data-remodal-target="modal_delete" class="c-button__gray c-button__min">削除</a></th>
                <th class="sortable"><p class="c-text__label">登録日時</p></th>
                <th class="sortable"><p class="c-text__label">マスター名</p></th>
                <th class="sortable"><p class="c-text__label">ステータス</p></th>
                <th class="sortable"><p class="c-text__label">ジャンル</p></th>
                <th class=""><p class="c-text__label">内容</p></th>
                <th class="sortable"><p class="c-text__label">選択ユーザー数</p></th>
                <th class="sortable"><p class="c-text__label">選択求人数</p></th>
                <th class=""></th>
              </tr>
            </thead>
            <tbody>
              <!-- ↓機能実装時に消してください itemはサンプルとして残してください -->
              <?php
                function masterList(){
                  return [
                    ['time' => '2022/05/27 17:04', 'id' => '1','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '新しい挑戦がある','count' => '43','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '2','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '自身の成長を感じる','count' => '23','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '3','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '制作の達成感','count' => '13','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '4','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => 'お客様からのありがとう','count' => '33','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '5','status_class' => 'main','status' => '未使用','master_name' => '仕事に求めるやりがい',
                    'item' => '市場価値の高い商品','count' => '41','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '6','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '自主性が認められる','count' => '22','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '6','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '集中できる環境','count' => '54','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '7','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '仲間とのチームプレー','count' => '42','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '8','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '資格取得ができる','count' => '23','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '9','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '意見を発言しやすい雰囲気','count' => '54','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '10','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '色々な人と関われる','count' => '43','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '11','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '結果でしっかりした評価がある','count' => '40','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '12','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '褒める社風がある','count' => '33','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '13','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => 'お客様の反応を感じられる','count' => '49','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '14','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '社会貢献に携わる','count' => '27','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '15','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '全てのフェーズに関われる','count' => '36','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '16','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '先輩のサポートで安心','count' => '40','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '17','status_class' => 'ok','status' => '使用中','master_name' => '仕事に求めるやりがい',
                    'item' => '最新技術に取り組める','count' => '33','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '1','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'コミュニケーションが好き','count' => '43','genre' => '性格について'],
                    ['time' => '2022/05/27 17:04', 'id' => '2','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'スポーツは10年以上','count' => '23','genre' => 'スポーツについて'],
                    ['time' => '2022/05/27 17:04', 'id' => '3','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '好きな国がある','count' => '13','genre' => 'その他'],
                    ['time' => '2022/05/27 17:04', 'id' => '4','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '集中するのが得意','count' => '33','genre' => '性格について'],
                    ['time' => '2022/05/27 17:04', 'id' => '5','status_class' => 'main','status' => '未使用','master_name' => 'パーソナリティー',
                    'item' => '食べ歩きが好き','count' => '41','genre' => 'グルメについて'],
                    ['time' => '2022/05/27 17:04', 'id' => '6','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'ガッツあります','count' => '22','genre' => '性格について'],
                    ['time' => '2022/05/27 17:04', 'id' => '6','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '漫画・アニメが好物','count' => '54','genre' => '趣味について'],
                    ['time' => '2022/05/27 17:04', 'id' => '7','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'ラーメン好き','count' => '42','genre' => 'グルメについて'],
                    ['time' => '2022/05/27 17:04', 'id' => '8','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'アウトドア好き','count' => '23','genre' => '趣味について'],
                    ['time' => '2022/05/27 17:04', 'id' => '9','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'スポーツ見る専','count' => '54','genre' => 'スポーツについて'],
                    ['time' => '2022/05/27 17:04', 'id' => '10','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '合理的です','count' => '43','genre' => '性格について'],
                    ['time' => '2022/05/27 17:04', 'id' => '11','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '釣り好き','count' => '40','genre' => '趣味について'],
                    ['time' => '2022/05/27 17:04', 'id' => '12','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'フルリモート希望','count' => '33','genre' => '仕事について'],
                    ['time' => '2022/05/27 17:04', 'id' => '13','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '出社もリモートもしたい','count' => '49','genre' => '仕事について'],
                    ['time' => '2022/05/27 17:04', 'id' => '14','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'お酒は文化','count' => '27','genre' => 'グルメについて'],
                    ['time' => '2022/05/27 17:04', 'id' => '15','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => 'SNSフォロワー1000人超！','count' => '36','genre' => '趣味について'],
                    ['time' => '2022/05/27 17:04', 'id' => '16','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '奇跡体験あり','count' => '40','genre' => 'その他'],
                    ['time' => '2022/05/27 17:04', 'id' => '17','status_class' => 'ok','status' => '使用中','master_name' => 'パーソナリティー',
                    'item' => '尊敬する人がいます','count' => '33','genre' => 'その他'],
                    ['time' => '2022/05/27 17:04', 'id' => '1','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '社員登用あり','count' => '43','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '2','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '昇給・昇格あり','count' => '23','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '3','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '残業なし','count' => '13','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '4','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '週１日〜OK','count' => '33','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '5','status_class' => 'main','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => 'シフト自由','count' => '41','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '6','status_class' => 'ok','status' => '未使用','master_name' => 'こだわり条件',
                    'item' => '高収入','count' => '22','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '6','status_class' => 'ok','status' => '未使用','master_name' => 'こだわり条件',
                    'item' => '交通費支給','count' => '54','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '7','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '即日勤務OK','count' => '42','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '8','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '急募','count' => '23','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '9','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '駅近5分以内','count' => '54','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '10','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => 'フルリモート','count' => '43','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '11','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => 'リモートOK','count' => '40','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '12','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => 'フレックス制度あり','count' => '33','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '13','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '年間休日120以上','count' => '49','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '14','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '土日祝休み','count' => '27','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '13','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => '直行直帰OK','count' => '49','genre' => '–'],
                    ['time' => '2022/05/27 17:04', 'id' => '14','status_class' => 'ok','status' => '使用中','master_name' => 'こだわり条件',
                    'item' => 'マイカー通勤可能','count' => '27','genre' => '–'],
                  ];
                }
              ?>
              @php($masterList = masterList())
              @foreach($masterList as $master)
                <tr data-href="{{ route('adminMasterEdit') }}">
                  <td>
                    <div class="c-checkbox">
                      <input type="checkbox" name="master" id="select_{{ $master['id'] }}">
                      <label for="select_{{ $master['id'] }}"></label>
                    </div>
                  </td>
                  <td><p class="c-text__min">{{ $master['time'] }}</p></td>
                  <td><p class="c-text__{{ $master['status_class'] }} c-text__lv6">{{ $master['status'] }}</p></td>
                  <td><p class="">{{ $master['master_name'] }}</p></td>
                  <td><p class="">{{ $master['genre'] }}</p></td>
                  <td><p class="">{{ $master['item'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text__main">{{ $master['count'] }}</p></td>
                  <td><p class="c-text__lv4 c-text__weight--700 c-text__main">{{ $master['count'] }}</p></td>
                  <td><div class="c-icon__w16 c-icon--arrow"></div></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
    @endslot
    @slot('foot')
    @endslot
  @endcomponent

@endsection
