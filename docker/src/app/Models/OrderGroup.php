<?php

namespace App\Models;

use App\Traits\KeywordSearch;
use App\Traits\SortByDates;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderGroup extends Model
{
    use KeywordSearch;
    use SortByDates;

    protected $fillable = [
        'group_name',
        'm_business_id',
        'client_id',
        'delivery_partnar_id',
        'total_quantity',
        'additional_total_count',
        'shipping_date',
    ];

    protected $dates = ['shipping_date'];

    /**
     * 顧客
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client')->withTrashed();
    }

    /**
     * 事業者
     */
    public function m_business()
    {
        return $this->belongsTo('App\Models\MBusiness')->withTrashed();
    }

    /**
     * 配送業者
     */
    public function delivery_partnar()
    {
        return $this->belongsTo('App\Models\DeliveryPartnar')->withTrashed();
    }

    /**
     * 発注
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * 配送業者名
     */
    public function getDeliveryPartnarName()
    {
        $order_product = $this->delivery_partnar()->first();
        return $order_product->name;
    }

    /**
     * 注文顧客名
     */
    public function getClientName()
    {
        $order_product = $this->client()->first();
        return $order_product->name;
    }

    /**
     * 注文顧客電話番号
     */
    public function getClientTel()
    {
        $order_product = $this->client()->first();
        return $order_product->tel;
    }

    /**
     * 注文顧客メールアドレス
     */
    public function getClientEmail()
    {
        $order_product = $this->client()->first();
        return $order_product->email;
    }

    public function getCreateDateAttribute()
    {
        return \Carbon::parse($this->created_at)->format('Y/m/d');
    }

    /**
     * @param Builder $query
     * @param $keyword
     * @return Builder
     */
    public function scopeKeywordSearch(Builder $query, $keyword): Builder
    {
        if (empty($keyword)) {
            return $query;
        }

        foreach ($this->parseKeyword($keyword) as $keyword) {
            $query->whereHas('client', function ($_query) use ($keyword) {    // リレーション名 user を渡す
                $_query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('email', 'LIKE', '%' . $keyword . '%');
            });
        }
        return $query;
    }
}
