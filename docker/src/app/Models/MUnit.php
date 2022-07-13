<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MUnit extends Model
{
    use SoftDeletes;

    public function order_products()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }
}
