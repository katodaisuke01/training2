<?php
function navList()
{
    return [
        [
            'class' => 'dashboard',
            'name' => 'ダッシュボード',
            'path' => 'management',
        ],
        [
            'class' => 'order',
            'name' => '注文管理',
            'path' => 'order',
        ],
        [
            'class' => 'item',
            'name' => '商品管理',
            'path' => 'item',
        ],
        [
            'class' => 'staff',
            'name' => 'スタッフ管理',
            'path' => 'staff',
        ],
        [
            'class' => 'master',
            'name' => 'マスタ管理',
            'path' => 'master',
        ],
    ];
}

?>
