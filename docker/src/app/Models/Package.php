<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'pack_code',
        'pack_status',
        'user_id',
        'shipping_date',
        'shipping_number',
        'shipping_schedule_time',
        'industry_group_id',
        'delivery_partnar_id',
        'm_business_id',
        'instock_date',
        'image_path',
        'saved_type',
        'package_height',
        'package_width',
        'package_depth',
        'temporary_weight',
        'loading_weight',
        'logistic_cost',
    ];

    protected $visible = ['pack_status', 'industry_group_name'];

    protected $appends = [
        'industry_group_name',
    ];

    // 梱包(産地) >> 作業(倉庫)ステータス
    const TYPE_NOT_CONFIRMED = 1;
    const TYPE_CONFIRMED = 2;
    // ソラシドエア
    const TYPE_PICKUP = 3;
    const TYPE_SHIPPING = 4;
    const TYPE_CHECKED_IN = 5;
    // 倉庫
    const TYPE_ACCEPTED = 6;
    const TYPE_HANDLE = 7;
    const TYPE_SORTED = 8;
    const PACKAGE_STATUS_LIST = [
        self::TYPE_NOT_CONFIRMED => '未梱包',
        self::TYPE_CONFIRMED => '梱包済',
        self::TYPE_PICKUP => '集荷済',
        self::TYPE_SHIPPING => '輸送中',
        self::TYPE_CHECKED_IN => '輸送済',
        self::TYPE_ACCEPTED => '荷受け済',
        self::TYPE_HANDLE => '荷捌き済',
        self::TYPE_SORTED => '仕分け済',
    ];

    // 保存状態
    const TYPE_FRESH = 1;
    const TYPE_FROZEN = 2;
    const SAVED_TYPE_LIST = [
        self::TYPE_FRESH => '生鮮',
        self::TYPE_FROZEN => '冷凍',
    ];

    // 貨物室の確保状況
    const TYPE_RESERVED_SPACE = 1;

    /**
     * 商品
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * 産地
     */
    public function industry_group()
    {
        return $this->belongsTo('App\Models\IndustryGroup');
    }

    /**
     * 倉庫
     */
    public function m_business()
    {
        return $this->belongsTo('App\Models\MBusiness');
    }

    /**
     * 倉庫
     */
    public function delivery_Partnars()
    {
        return $this->belongsTo('App\Models\DeliveryPartnar');
    }

    // 箱に紐づく商品の総重量
    public function getPackageTotalOrderWeightAttribute()
    {
        $orders = $this->orders;
        $total_weight = 0;
        foreach ($orders as $v) {
            if (data_get($v, 'weight')) {
                $total_weight += data_get($v, 'weight');
            }
        }
        return $total_weight;
    }

    public function scopeConfirm($query)
    {
        return $query->where('shipping_date', date('Y-m-d'))
            ->where(function ($query) {
                $query->where('pack_status', Package::TYPE_CONFIRMED)
                    ->orWhere('pack_status', Package::TYPE_PICKUP);
            });
    }

    public function getCastWeightValueAttribute()
    {
        return $this->castWeight($this->package_total_order_weight);
    }

    public function getCastTemporaryWeightValueAttribute()
    {
        return $this->castWeight($this->temporary_weight);
    }

    private function castWeight($weight)
    {
        if ($weight < 1000) {
            $cast_weight = $weight;
        } else {
            $cast_weight = round($weight * 0.001, 1); // g => kg
        }
        return $cast_weight;
    }

    /**
     * @return bool
     */
    public function getIsOrderProcessedAttribute(): bool
    {
        return $this->orders()
                ->where('instock_status', Order::TYPE_NOT_CONFIRMED)
                ->count() === 0;
    }

    /**
     * @return string
     */
    public function getIndustryGroupNameAttribute(): string
    {
        return $this
            ->industry_group()
            ->first()
            ->name;
    }

    public function getTransportDonePackageAttribute()
    {
        if (
            $this->shipping_number &&
            $this->shipping_schedule_time &&
            $this->package_height &&
            $this->package_width &&
            $this->package_depth &&
            $this->loading_weight
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function scopePickup($query)
    {
        return $query->where('packages.pack_status', $this::TYPE_PICKUP);
    }

    public function scopeCheckin($query)
    {
        return $query
            ->where('packages.shipping_date', date('Y-m-d'))
            ->where(function ($query) {
                $query->where('packages.pack_status', $this::TYPE_PICKUP)
                    ->orWhere('packages.pack_status', $this::TYPE_SHIPPING)
                    ->orWhere('packages.pack_status', $this::TYPE_CHECKED_IN);
            });
    }

    /**
     * @param int $length
     * @return string
     */
    public static function generateCode(int $length = 10): string
    {
        $max = pow(10, $length) - 1;                    // コードの最大値算出
        $rand = rand(0, $max);                          // 乱数生成

        // 乱数の頭0埋め
        return sprintf('%0' . $length . 'd', $rand);
    }

    /**
     * @return int
     */
    public function getCountNotConfirmedAttribute(): int
    {
        return $this->orders
            ->where('instock_status', Order::TYPE_NOT_CONFIRMED)
            ->count();
    }

    /**
     * @return int
     */
    public function getCountConfirmedAttribute(): int
    {
        return $this->orders
            ->where('instock_status', Order::TYPE_CONFIRMED)
            ->count();
    }

    /**
     * @return int
     */
    public function getCountSortedAttribute(): int
    {
        return $this->orders
            ->where('instock_status', Order::TYPE_SORTED)
            ->count();
    }

    /**
     * @return int
     */
    public function getCountPickedAttribute(): int
    {
        return $this->orders
            ->where('instock_status', Order::TYPE_PICKET)
            ->count();
    }

    /**
     * @return int
     */
    public function getCountShippedAttribute(): int
    {
        return $this->orders
            ->where('instock_status', Order::TYPE_SHIPPED)
            ->count();
    }

    /**
     * @param string $url
     * @return Package
     */
    public static function findByUrl(string $url): Package
    {
        $package_id = last(
            explode(
                '/',
                parse_url($url, PHP_URL_PATH)
            )
        );

        return self::find($package_id);
    }
}
