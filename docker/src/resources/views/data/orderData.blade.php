<?php
function orderList()
{
    return [
        [
            'add' => 'add',//追加かどうか
            'input' => '2021/06/21',//登録日
            'name' => 'KDDI株式会社',//注文事業者
            'order' => '15',//注文魚種数
            'deliver' => '大田倉庫',//配送先
            'deliverDate' => '2021/06/22', //配送予定日
            'stage1' => '20',//未着手
            'stage2' => '12',//梱包完了
            'stage3' => '11',//処理済
        ],
        [
            'add' => '',
            'input' => '2021/06/21',
            'name' => 'カンパニーA株式会社',
            'order' => ' 12',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '15',
            'stage2' => '10',
            'stage3' => '8',
        ],
        [
            'add' => '',
            'input' => '2021/06/21',
            'name' => '株式会社事業者B',
            'order' => '21',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '20',
            'stage2' => '12',
            'stage3' => '11',
        ],
        [
            'add' => 'add',
            'input' => '2021/06/21',
            'name' => '株式会社カンパニーC',
            'order' => '14',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '15',
            'stage2' => '10',
            'stage3' => '8',
        ],
        [
            'add' => '',
            'input' => '2021/06/21',
            'name' => '株式会社事業者D',
            'order' => '17',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '20',
            'stage2' => '12',
            'stage3' => '11',
        ],
        [
            'add' => 'add',
            'input' => '2021/06/21',
            'name' => 'KDDI株式会社',
            'order' => '15',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '15',
            'stage2' => '10',
            'stage3' => '8',
        ],
        [
            'add' => '',
            'input' => '2021/06/21',
            'name' => '事業者カンパニーA株式会社',
            'order' => ' 12',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '20',
            'stage2' => '12',
            'stage3' => '11',
        ],
        [
            'add' => '',
            'input' => '2021/06/21',
            'name' => '株式会社事業者B',
            'order' => '21',
            'deliver' => '大田倉庫',
            'deliverDate' => '2021/06/22',
            'stage1' => '15',
            'stage2' => '10',
            'stage3' => '8',
        ],
    ];
}

?>

<?php
function acceptList()
{
    return [
        [
            'select' => '',
            'id' => 'sorting--1',
            'image_path' => '/image/sample/image_aji.png',//画像
            'weight' => '520',//計量値
            'name' => 'アジ（真鯵）',//名称
            'pre_price' => '800',//せり価格
            'price' => '1,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//加工・締め
            'transport' => 'ソラシドエア',//輸送
            'order' => 'リストランテ ペッシェ',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => 'select',
            'id' => 'sorting--2',
            'image_path' => '/image/sample/image_buri.png',//画像
            'weight' => '520',//計量値
            'name' => '天然ぶり',//名称
            'pre_price' => '800',//
            'price' => '1,200',//価格
            'check' => 'c-icon__check c-icon__w32',//チェックマーク
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '個室ダイニング あお',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--3',
            'image_path' => '/image/sample/image_hirame.png',//画像
            'weight' => '520',//計量値
            'name' => 'ひらめ',//名称
            'pre_price' => '800',//
            'price' => '1,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//注文者住所
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '海鮮バル Fish&Bird',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--4',
            'image_path' => '/image/sample/image_ika.png',//画像
            'weight' => '520',//計量値
            'name' => 'いか',//名称
            'pre_price' => '800',//
            'price' => '1,200',//価格
            'check' => 'c-icon__check c-icon__w32',//チェックマーク
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '居酒屋 空と海と',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--5',
            'image_path' => '/image/sample/image_tuna.png',//画像
            'weight' => '520',//計量値
            'name' => '本マグロ',//名称
            'pre_price' => '800',//
            'price' => '1,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '個室洋風居酒屋 日々のさかな',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--6',
            'image_path' => '/image/sample/image_kani.png',//画像
            'weight' => '670',//計量値
            'name' => 'カニ',//名称
            'pre_price' => '3.600',//
            'price' => '5,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '洋食 やまもと',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--7',
            'image_path' => '/image/sample/image_kani.png',//画像
            'weight' => '670',//計量値
            'name' => 'カニ',//名称
            'pre_price' => '3.600',//
            'price' => '5,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '海鮮居酒屋 漁火の庭',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--8',
            'image_path' => '/image/sample/image_kani.png',//画像
            'weight' => '670',//計量値
            'name' => 'カニ',//名称
            'pre_price' => '3.600',//
            'price' => '5,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '海鮮バル ピンチョス',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
        [
            'select' => '',
            'id' => 'sorting--9',
            'image_path' => '/image/sample/image_kani.png',//画像
            'weight' => '670',//計量値
            'name' => 'カニ',//名称
            'pre_price' => '3.600',//
            'price' => '5,200',//価格
            'check' => 'c-icon__next c-icon__w16',//
            'from' => '鹿児島県漁協佐多支社',//産地
            'fromID' => 'A-12345',//産地ID
            'transport' => 'ソラシドエア',//輸送
            'order' => '海鮮バル ISARIBI',//注文者
            'address' => '東京都中央区銀座1-11-23',//注文者住所
        ],
    ];
}

?>
