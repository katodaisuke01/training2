<ul class="p-list__wrap"><?php
  function prefectureList(){
    return [
      [
        'prefecture_id' => 'prefecture_all',//prefecture
        'prefecture_name' => 'すべて',//都道府県
      ],
      ['prefecture_id' => 'prefecture_1','prefecture_name' => '東京23区'],
      ['prefecture_id' => 'prefecture_2','prefecture_name' => 'ほか東京都'],
      ['prefecture_id' => 'prefecture_3','prefecture_name' => '北海道'],
      ['prefecture_id' => 'prefecture_4','prefecture_name' => '秋田県'],
      ['prefecture_id' => 'prefecture_5','prefecture_name' => '青森県'],
      ['prefecture_id' => 'prefecture_6','prefecture_name' => '岩手県'],
      ['prefecture_id' => 'prefecture_7','prefecture_name' => '宮城県'],
      ['prefecture_id' => 'prefecture_8','prefecture_name' => '福島県'],
      ['prefecture_id' => 'prefecture_9','prefecture_name' => '山形県'],
      ['prefecture_id' => 'prefecture_10','prefecture_name' => '新潟県'],
      ['prefecture_id' => 'prefecture_11','prefecture_name' => '長野県'],
      ['prefecture_id' => 'prefecture_12','prefecture_name' => '石川県'],
      ['prefecture_id' => 'prefecture_13','prefecture_name' => '富山県'],
      ['prefecture_id' => 'prefecture_14','prefecture_name' => '福井県'],
      ['prefecture_id' => 'prefecture_15','prefecture_name' => '栃木県'],
      ['prefecture_id' => 'prefecture_16','prefecture_name' => '群馬県'],
      ['prefecture_id' => 'prefecture_17','prefecture_name' => '茨城県'],
      ['prefecture_id' => 'prefecture_18','prefecture_name' => '埼玉県'],
      ['prefecture_id' => 'prefecture_19','prefecture_name' => '千葉県'],
      ['prefecture_id' => 'prefecture_20','prefecture_name' => '神奈川県'],
      ['prefecture_id' => 'prefecture_21','prefecture_name' => '山梨県'],
      ['prefecture_id' => 'prefecture_22','prefecture_name' => '静岡県'],
      ['prefecture_id' => 'prefecture_23','prefecture_name' => '愛知県'],
      ['prefecture_id' => 'prefecture_24','prefecture_name' => '岐阜県'],
      ['prefecture_id' => 'prefecture_25','prefecture_name' => '京都府'],
      ['prefecture_id' => 'prefecture_26','prefecture_name' => '大阪府'],
      ['prefecture_id' => 'prefecture_27','prefecture_name' => '和歌山県'],
      ['prefecture_id' => 'prefecture_28','prefecture_name' => '滋賀県'],
      ['prefecture_id' => 'prefecture_29','prefecture_name' => '三重県'],
      ['prefecture_id' => 'prefecture_30','prefecture_name' => '奈良県'],
      ['prefecture_id' => 'prefecture_31','prefecture_name' => '兵庫県'],
      ['prefecture_id' => 'prefecture_32','prefecture_name' => '鳥取県'],
      ['prefecture_id' => 'prefecture_33','prefecture_name' => '島根県'],
      ['prefecture_id' => 'prefecture_34','prefecture_name' => '岡山県'],
      ['prefecture_id' => 'prefecture_35','prefecture_name' => '広島県'],
      ['prefecture_id' => 'prefecture_36','prefecture_name' => '山口県'],
      ['prefecture_id' => 'prefecture_37','prefecture_name' => '香川県'],
      ['prefecture_id' => 'prefecture_38','prefecture_name' => '徳島県'],
      ['prefecture_id' => 'prefecture_39','prefecture_name' => '高知県'],
      ['prefecture_id' => 'prefecture_40','prefecture_name' => '愛媛県'],
      ['prefecture_id' => 'prefecture_41','prefecture_name' => '福岡県'],
      ['prefecture_id' => 'prefecture_42','prefecture_name' => '大分県'],
      ['prefecture_id' => 'prefecture_43','prefecture_name' => '佐賀県'],
      ['prefecture_id' => 'prefecture_44','prefecture_name' => '熊本県'],
      ['prefecture_id' => 'prefecture_45','prefecture_name' => '長崎県'],
      ['prefecture_id' => 'prefecture_46','prefecture_name' => '宮崎県'],
      ['prefecture_id' => 'prefecture_47','prefecture_name' => '鹿児島県'],
      ['prefecture_id' => 'prefecture_48','prefecture_name' => '沖縄県']
    ];
  }
?>
@php($prefectureList = prefectureList())
@foreach($prefectureList as $prefecture)
  <li>
    <div class="c-checkbox">
      <input class="checks_prefecture" type="checkbox"  name="prefecture" id="{{ $prefecture['prefecture_id'] }}">
      <label for="{{ $prefecture['prefecture_id'] }}">{{ $prefecture['prefecture_name'] }}</label>
    </div>
  </li>
@endforeach
</ul>
<script>//「全て選択」のチェックボックス
let checkAll = document.getElementById("prefecture_all");
//「全て選択」以外のチェックボックス
let el = document.getElementsByClassName("checks_prefecture");

//全てのチェックボックスをON/OFFする
const funcCheckAll = (bool) => {
    for (let i = 0; i < el.length; i++) {
        el[i].checked = bool;
    }
}

//「checks」のclassを持つ要素のチェック状態で「全て選択」のチェック状態をON/OFFする
const funcCheck = () => {
    let count = 0;
    for (let i = 0; i < el.length; i++) {
        if (el[i].checked) {
            count += 1;
        }
    }

    if (el.length === count) {
        checkAll.checked = true;
    } else {
        checkAll.checked = false;
    }
};

//「全て選択」のチェックボックスをクリックした時
checkAll.addEventListener("click",() => {
    funcCheckAll(checkAll.checked);
},false);

//「全て選択」以外のチェックボックスをクリックした時
for (let i = 0; i < el.length; i++) {
    el[i].addEventListener("click", funcCheck, false);
}
</script>