<ul class="p-list__wrap">
  <?php
  function div2List(){
    return [
      [
        'div2_id' => 'div2_all',//div2
        'div2_name' => 'すべて',
      ],
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
  <li>
    <div class="c-checkbox">
      <input class="checks_div2" type="checkbox"  name="div2" id="{{ $div2['div2_id'] }}">
      <label for="{{ $div2['div2_id'] }}">{{ $div2['div2_name'] }}</label>
    </div>
  </li>
@endforeach
</ul>
<script>//「全て選択」のチェックボックス
let checkAll = document.getElementById("div2_all");
//「全て選択」以外のチェックボックス
let el = document.getElementsByClassName("checks_div2");


</script>