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
    <div class="c-checkbox c-checkbox__button">
      <input type="checkbox" name="star" id="{{ $star['star_id'] }}">
      <label for="{{ $star['star_id'] }}">{{ $star['star_name'] }}</label>
    </div>
  </li>
@endforeach
</ul>
<script>
  $(".c-checkbox__button input[type=checkbox]").click(function(){
    var $count = $(".c-checkbox__button input[type=checkbox]:checked").length;
    var $not = $('.c-checkbox__button input[type=checkbox]').not(':checked')

    if($count >= 5) {
        $not.attr("disabled",true);
    }else{
        $not.attr("disabled",false);
    }
});
</script>