<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPackage extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    const TYPE_PICKED = 1;
    const TYPE_SHIPPED = 2;
    const STATUS_LIST = [
        self::TYPE_PICKED => '摘み取り済',
        self::TYPE_SHIPPED => '出荷チェック済',
    ];

    /**
     * 商品
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * 顧客
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * @param string $url
     */
    public static function findByUrl(string $url)
    {
        $client_package_id = last(
            explode(
                '/',
                parse_url($url, PHP_URL_PATH)
            )
        );

        return self::find($client_package_id);
    }
}
