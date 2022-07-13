<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accept extends Model
{
    protected $fillable = [
        'wuser_id',
        'package_id',
        'accept_date',
    ];

    /**
     * 作業者
     */
    public function wuser()
    {
        return $this->belongsTo('App\Models\Wuser')->withTrashed();
    }

    /**
     * 箱
     */
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
