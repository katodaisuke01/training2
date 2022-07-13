<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use function JmesPath\search;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'm_business_id',
        'order_product_id',
        'client_id',
        'delivery_partnar_id',
        'order_stock_id',
        'quantity',
        'shipping_date',
        'article',
        'shipping_status',
        'simultaneous_order_code',
        'page_number',
        'additional_order_flg',
        'additional_order_flg_2',
        'order_group_id',
        'order_business_group_id',
        'package_id',
        'client_package_id',
        'order_package_id',
        'image_path',
        'weight',
        'deleted_at',
        'landing_configuration_date',
        'purification_configuration_date',
        'instock_status',
        'limit_price',
        'approval_flg',
        'sell_down_price',
        'reply_status',
    ];

    protected $visible = [
        'instock_status',
        'image',
        'order_product_name',
        'order_client_name',
        'api_response_weight',
        'delivery_partnar_name',
        'shelf_number',
        'id',
        'quantity',
        'weight',
        'cast_weight',
    ];

    protected $dates = ['shipping_date'];

    protected $appends = [
        'delivery_partnar_name',
        'order_product_name',
        'order_client_name',
        'image',
        'title',
        'industry_name',
        'shelf_number',
        'api_response_weight',
        'cast_weight',
    ];

    // 発送ステータス
    const TYPE_NOT_START = 0;
    const TYPE_PACKING = 1;
    const TYPE_PROCESS_DONE = 2;
    const TYPE_COMPLETE = 3;
    const SHIPPING_STATUS_LIST = [
        self::TYPE_NOT_START => '未着手',
        self::TYPE_PACKING => '梱包完了',
        self::TYPE_PROCESS_DONE => '処理済',
        self::TYPE_COMPLETE => '発送済',
    ];

    // 入荷ステータス
    const TYPE_NOT_CONFIRMED = 0;
    const TYPE_CONFIRMED = 1;
    const TYPE_SORTED = 2;
    const TYPE_PICKET = 3;
    const TYPE_SHIPPED = 4;
    const INSTOCK_STATUS_LIST = [
        self::TYPE_NOT_CONFIRMED => '未着手',
        self::TYPE_CONFIRMED => '荷受け済',
        self::TYPE_SORTED => '仕分け済',
        self::TYPE_PICKET => '摘み取り済み',
        self::TYPE_SHIPPED => '出荷チェック済み',
    ];

    // 価格返事ステータス
    const TYPE_NOT_APPLOVAL = 0;
    const TYPE_APPLOVAL = 1;
    const REPLY_STATUS_LIST = [
        self::TYPE_NOT_APPLOVAL => '非承認',
        self::TYPE_APPLOVAL => '承認',
    ];

    /**
     * 従業員
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    /**
     * 顧客
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client')->withTrashed();
    }

    /**
     * 生鮮業者
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
     * 商品
     */
    public function order_product()
    {
        return $this->belongsTo('App\Models\OrderProduct')->withTrashed();
    }

    /**
     * 産地
     */
    public function industry_group()
    {
        return $this->belongsTo('App\Models\IndustryGroup')->withTrashed();
    }

    /**
     * グループ
     */
    public function order_group()
    {
        return $this->belongsTo('App\Models\OrderGroup');
    }

    /**
     * グループ
     */
    public function order_business_group()
    {
        return $this->belongsTo('App\Models\OrderBusinessGroup');
    }

    /**
     * グループ
     */
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }

    /**
     * 箱
     */
    public function client_package()
    {
        return $this->belongsTo('App\Models\ClientPackage');
    }

    /**
     * グループ
     */
    public function order_package()
    {
        return $this->belongsTo('App\Models\OrderPackage');
    }

    /**
     * 商品名称
     */
    public function getOrderProductName()
    {
        $order_product = data_get($this, 'order_product.title');
        return $order_product;
    }

    /**
     * 商品名称
     */
    public function getOrderProductNameAttribute()
    {
        $order_product = data_get($this, 'order_product.title');
        return $order_product;
    }

    /**
     * 顧客名称
     */
    public function getOrderClientNameAttribute()
    {
        $client = data_get($this, 'client.name');
        return $client;
    }


    /**
     * 商品名称
     */
    public function getTitleAttribute()
    {
        return $this->getOrderProductName();
    }

    /**
     * 産地名称
     */
    public function getIndustryNameAttribute()
    {
        $industry_group = data_get($this, 'industry_group.name');
        return $industry_group;
    }

    /**
     * 棚番号
     */
    public function getShelfNumberAttribute()
    {
        $shelf_number = data_get($this, 'client.shelf_number');
        return $shelf_number;
    }

    /**
     * 配送業者名
     */
    public function getDeliveryPartnarName()
    {
        $order_product = data_get($this, 'delivery_partnar.name');
        return $order_product;
    }

    /**
     * 配送業者名
     */
    public function getDeliveryPartnarNameAttribute()
    {
        $order_product = data_get($this, 'delivery_partnar.name');
        return $order_product;
    }

    /**
     * 注文顧客名
     */
    public function getClientName()
    {
        $order_product = data_get($this, 'client.name');
        return $order_product;
    }

    /**
     * 事業者名
     */
    public function getBusinessClientName()
    {
        $business = data_get($this, 'm_business.name');
        return $business;
    }

    public function getCreateDateAttribute()
    {
        return \Carbon::parse($this->created_at)->format('Y/m/d');
    }

    public function getLandingDateAttribute()
    {
        $order_product = $this->order_product()->first();
        return \Carbon::parse($this->shipping_date)->subDays($order_product->landing_configuration)->format('Y/m/d');
    }

    public function getDisplayShippingTimeAttribute()
    {
        return \Carbon::parse($this->shipping_date)->format('H時i分');
    }

    public function getProductTitleAttribute()
    {
        $order_product = $this->order_product()->first();
        return $order_product->title;
    }

    public function getPurificationDateAttribute()
    {
        $order_product = $this->order_product()->first();
        return \Carbon::parse($this->shipping_date)->subDays($order_product->purification_configuration)->format('Y/m/d');
    }

    public function getWorkingUserAttribute()
    {
        $user = $this->user()->first();
        if ($user) {
            $name = $user->last_name . ' ' . $user->first_name;
        } else {
            $name = null;
        }

        return $name;
    }

    // 作業画面で追加した注文件数
    public function getAddOrderCountAttribute()
    {
        $additional_count = Order::where('simultaneous_order_code', $this->simultaneous_order_code)->where('additional_order_flg_2', 1)->count();

        return $additional_count;
    }

    public function getApiResponseWeightAttribute()
    {
        $value = null;
        if ($this->weight) {
            $value = round($this->weight * 0.001, 2); // g => kg
        }
        return $value;
    }

    // 作業画面で追加した注文件数の合計
    public function getTotalOrderCountAttribute()
    {
        $additional_count = Order::where('simultaneous_order_code', $this->simultaneous_order_code)->where('additional_order_flg_2', 1)->count();

        return $this->quantity + $additional_count;
    }

    /**
     * @return string
     */
    public function getCastWeightAttribute(): string
    {
        return $this->cast_weight_value . $this->cast_weight_unit;
    }

    public function getCastWeightValueAttribute()
    {
        $value = null;
        if ($this->weight) {
            if ($this->weight < 1000) {
                $value = number_format($this->weight);
            } else {
                $value = number_format(round($this->weight * 0.001, 1)); // g => kg
            }
        }
        return $value;
    }

    public function getCastWeightUnitAttribute()
    {
        $unit = 'kg';
        if ($this->weight) {
            if ($this->weight < 1000) {
                $unit = 'g';
            } else {
                $unit = 'kg';
            }
        }
        return $unit;
    }

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        return $this['image_path'] ? Storage::disk('s3')->temporaryUrl($this['image_path'], Carbon::now()->addMinute()) : '';
    }

    /**
     * @param string $url
     * @return Order
     */
    public static function findByStockUrl(string $url): Order
    {
        $order_stock_id = last(
            explode(
                '/',
                parse_url($url, PHP_URL_PATH)
            )
        );

        return self::where('order_stock_id', $order_stock_id)->first();
    }

    /**
     * @param $m_business_id
     * @return int
     */
    public static function countConfirmedToday($m_business_id): int
    {
        return self::where('m_business_id', $m_business_id)
            ->where('instock_status', '>=', self::TYPE_CONFIRMED)
            ->whereDate('shipping_date', Carbon::today())
            ->whereNotNull('package_id')
            ->count();
    }

    /**
     * @param $m_business_id
     * @return int
     */
    public static function countSortedToday($m_business_id): int
    {
        return self::where('m_business_id', $m_business_id)
            ->where('instock_status', '>=', self::TYPE_SORTED)
            ->whereDate('shipping_date', Carbon::today())
            ->whereNotNull('package_id')
            ->count();
    }

    /**
     * @param $m_business_id
     * @return string
     */
    public static function todaysSortProgress($m_business_id): string
    {
        return self::countSortedToday($m_business_id) . '/' . self::countConfirmedToday($m_business_id);
    }

    public static function generateCode($length = 6)
    {
        $max = pow(10, $length) - 1;                    // コードの最大値算出
        $rand = random_int(0, $max);                    // 乱数生成
        $code = sprintf('%0' . $length . 'd', $rand);     // 乱数の頭0埋め

        return $code;
    }
}
