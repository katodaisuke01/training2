<ul class="p-list__wrap">
  <?php
  function div1List(){
    return [
      [
        'div1_id' => 'div1_all',//div1
        'div1_name' => 'すべて',
      ],
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
  <li>
    <div class="c-checkbox">
      <input class="checks_div1" type="checkbox" name="div1" id="{{ $div1['div1_id'] }}">
      <label for="{{ $div1['div1_id'] }}">{{ $div1['div1_name'] }}</label>
    </div>
  </li>
@endforeach
</ul>
<script>//「全て選択」のチェックボックス
let checkAll = document.getElementById("div1_all");
//「全て選択」以外のチェックボックス
let el = document.getElementsByClassName("checks_div1");

</script>