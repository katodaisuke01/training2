<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkLog extends Model
{
    protected $fillable = [
        'order_simultaneous_order_code',
        'user_id',
        'start_at',
        'end_at',
    ];
}
