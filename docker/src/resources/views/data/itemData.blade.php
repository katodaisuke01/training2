<?php
function itemList()
{
    return [
        [
            'masterId' => 'A123-001',//商品登録の自動ユニークID
            'image' => '/image/sample/image_tuna.png',//登録日
            'category' => 'マグロ',//カテゴリー
            'variety' => 'インドマグロ',//魚種
            'get' => '天然',//天然養殖
            'name' => 'マグロ5',//商品名称
            'unit' => 'セット', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '柵切り',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_1',//id
            'select_2' => 'check_1',//for idと同じ値
        ],
        [
            'masterId' => 'A123-002',//商品登録の自動ユニークID
            'image' => '/image/sample/image_tuna.png',//登録日
            'category' => 'マグロ',//カテゴリー
            'variety' => 'インドマグロ',//魚種
            'get' => '天然',//天然養殖
            'name' => 'マグロ10kg',//商品名称
            'unit' => 'セット', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '柵切り',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_2',//id
            'select_2' => 'check_2',//for idと同じ値
        ],
        [
            'masterId' => 'A123-003',//商品登録の自動ユニークID
            'image' => '/image/sample/image_aji.png',//登録日
            'category' => '鮮魚',//カテゴリー
            'variety' => 'アジ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'アジ',//商品名称
            'unit' => 'セット', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_3',//id
            'select_2' => 'check_3',//for idと同じ値
        ],
        [
            'masterId' => 'A123-004',//商品登録の自動ユニークID
            'image' => '/image/sample/image_buri.png',//登録日
            'category' => '鮮魚',//カテゴリー
            'variety' => 'ブリ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'ブリ',//商品名称
            'unit' => '尾', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_4',//id
            'select_2' => 'check_4',//for idと同じ値
        ],
        [
            'masterId' => 'A123-005',//商品登録の自動ユニークID
            'image' => '/image/sample/image_hirame.png',//登録日
            'category' => '鮮魚',//カテゴリー
            'variety' => 'ヒラメ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'ヒラメ',//商品名称
            'unit' => '尾', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_5',//id
            'select_2' => 'check_5',//for idと同じ値
        ],
        [
            'masterId' => 'A123-006',//商品登録の自動ユニークID
            'image' => '/image/sample/image_hoya.png',//登録日
            'category' => 'その他',//カテゴリー
            'variety' => 'ほや',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'ほや',//商品名称
            'unit' => '個', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => 'なし',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_6',//id
            'select_2' => 'check_6',//for idと同じ値
        ],
        [
            'masterId' => 'A123-007',//商品登録の自動ユニークID
            'image' => '/image/sample/image_ika.png',//登録日
            'category' => 'イカ・タコ',//カテゴリー
            'variety' => 'イカ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'ダイオウイカ',//商品名称
            'unit' => '個', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_7',//id
            'select_2' => 'check_7',//for idと同じ値
        ],
        [
            'masterId' => 'A123-008',//商品登録の自動ユニークID
            'image' => '/image/sample/image_iwashi.png',//登録日
            'category' => '鮮魚',//カテゴリー
            'variety' => 'イワシ',//魚種
            'get' => '養殖',//天然養殖
            'name' => '真鰯',//商品名称
            'unit' => 'セット', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_8',//id
            '_2' => 'check_8',//for idと同じ値
        ],
        [
            'masterId' => 'A123-009',//商品登録の自動ユニークID
            'image' => '/image/sample/image_kan.png',//登録日
            'category' => '鮮魚',//カテゴリー
            'variety' => 'カンパチ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'カンパチ',//商品名称
            'unit' => '尾', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_9',//id
            'select_2' => 'check_9',//for idと同じ値
        ],
        [
            'masterId' => 'A123-010',//商品登録の自動ユニークID
            'image' => '/image/sample/image_kani.png',//登録日
            'category' => 'カニ',//カテゴリー
            'variety' => 'カニ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'タラバガニ',//商品名称
            'unit' => '杯', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_10',//id
            'select_2' => 'check_10',//for idと同じ値
        ],
        [
            'masterId' => 'A123-011',//商品登録の自動ユニークID
            'image' => '/image/sample/image_kare.png',//登録日
            'category' => '鮮魚',//カテゴリー
            'variety' => 'カレイ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'かれい',//商品名称
            'unit' => '個', //単位
            'weight' => '5',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => '神経〆',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_11',//id
            'select_2' => 'check_11',//for idと同じ値
        ],
        [
            'masterId' => 'A123-011',//商品登録の自動ユニークID
            'image' => '/image/sample/image_uni.png',//登録日
            'category' => 'ウニ・イクラ・白子・魚卵',//カテゴリー
            'variety' => 'ウニ',//魚種
            'get' => '養殖',//天然養殖
            'name' => 'ウニ1kg',//商品名称
            'unit' => '個', //単位
            'weight' => '1kg',//基準重量
            'range' => '5',//計量許容値(%)
            'max' => '4',//1箱の最大容量(kg)
            'addition' => 'なし',//加工・締め
            'inputDate' => '2021/06/21',//登録日
            'select_1' => 'check_12',//id
            'select_2' => 'check_12',//for idと同じ値
        ],
    ];
}

?>
