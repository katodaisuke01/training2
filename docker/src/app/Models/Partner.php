<?php

namespace App\Models;

class Partner
{
    const TYPE_INDUSTRY_GROUP = 1;
    const TYPE_M_BUSINESS = 2;

    const TYPE_LIST = [
        self::TYPE_INDUSTRY_GROUP => '産地',
        self::TYPE_M_BUSINESS => '配送先',
    ];

    /**
     * @param $type
     * @return IndustryGroup|MBusiness|false
     */
    public static function getModelClass(int $type)
    {
        if ($type === self::TYPE_INDUSTRY_GROUP) {
            return new IndustryGroup();
        } elseif ($type === self::TYPE_M_BUSINESS) {
            return new MBusiness();
        }
        return false;
    }

    /**
     * @return false|int|string
     */
    public static function getType($vary)
    {
        return array_search($vary, self::TYPE_LIST);
    }
}
