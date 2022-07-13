<ul class="p-list__wrap">
  <?php
  function otherList(){
    return [
      [
        'other_id' => 'other_all',//other
        'other_name' => 'すべて',
      ],
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
  <li>
    <div class="c-checkbox">
      <input type="checkbox" class="checks_other"  name="other" id="{{ $other['other_id'] }}">
      <label for="{{ $other['other_id'] }}">{{ $other['other_name'] }}</label>
    </div>
  </li>
@endforeach
</ul>
<script>//「全て選択」のチェックボックス
let checkAll = document.getElementById("other_all");
//「全て選択」以外のチェックボックス
let el = document.getElementsByClassName("checks_other");

</script>