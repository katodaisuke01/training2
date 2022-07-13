<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'stock_id',
        'order_product_id',
        'image_path',
        'weight',
        'order_id',
        'status',
        'disposal_time',
    ];

    const STATUS_TYPE_NON = 0;
    const STATUS_TYPE_EXSIST = 1;
    const STOCK_STATUS_TYPE_LIST = [
        self::STATUS_TYPE_NON => '在庫なし',
        self::STATUS_TYPE_EXSIST => '在庫あり',
    ];

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock');
    }

    public function order_product()
    {
        return $this->belongsTo('App\Models\OrderProduct');
    }

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        return $this['image_path'] ? Storage::disk('s3')->temporaryUrl($this['image_path'], Carbon::now()->addMinute()) : '';
    }

    public function getCastWeightValueAttribute()
    {
        $value = null;
        if ($this->weight) {
            if ($this->weight < 1000) {
                $value = $this->weight;
            } else {
                $value = round($this->weight * 0.001, 1); // g => kg
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
     * @param OrderProduct $product
     * @param $value
     * @param $stock_id
     * @return void
     */
    public static function createByProduct(OrderProduct $product, $value, $stock_id)
    {
        $len = 0;
        if (isset($value['quantity'])) { // 数量
            $len = $value['quantity'];
            if ($product->dealing_type == 1) { // 複数まとめて処理の場合
                $len = round($value['quantity'] / data_get($product, 'max_quantity'), 0);
            }
        } elseif (isset($value['weight'])) { // 重量
            $len = round($value['weight'] / data_get($product, 'base_weight'), 0);
        }

        for ($i = 0; $i < $len; $i++) {
            $order_stock = OrderStock::create([
                'stock_id' => $stock_id,
                'status' => OrderStock::STATUS_TYPE_EXSIST
            ]);
        }
    }
}
