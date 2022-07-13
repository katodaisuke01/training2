<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'order_product_id',
        'total_quantity',
        'total_weight',
        'landing_date',
    ];

    public function order_product()
    {
        return $this->belongsTo('App\Models\OrderProduct');
    }

    public function order_stocks()
    {
        return $this->hasMany('App\Models\OrderStock');
    }
}
