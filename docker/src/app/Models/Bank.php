<?php

namespace App\Models;

class Bank
{
    const TYPE_NORMAL = 1;
    const TYPE_CURRENT = 2;

    const TYPE_LIST = [
        self::TYPE_NORMAL => '普通',
        self::TYPE_CURRENT => '当座',
    ];
}
