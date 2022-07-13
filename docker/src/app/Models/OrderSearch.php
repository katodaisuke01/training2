<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderSearch extends Model
{
    protected $fillable = [
        'm_business_id',
        'order_product_id',
        'client_id',
        'delivery_partnar_id',
        'quantity',
        'shipping_date',
        'article',
        'shipping_status',
        'simultaneous_order_code',
        'additional_order_flg',
        'deleted_at',
    ];

    public function getQuery()
    {
        return new Order;
    }
}
