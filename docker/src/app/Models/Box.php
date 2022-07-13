<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Box extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'industry_group_id',
        'box_name',
        'width',
        'height',
        'depth',
        'limit_capacity',
    ];

    protected $visible = [
        'id',
        'box_name',
        'width',
        'height',
        'depth',
        'limit_capacity',
    ];

    /**
     * 事業グループ
     */
    public function industry_group()
    {
        return $this->belongsTo('App\Models\IndustryGroup')->withTrashed();
    }

    /**
     * 事業グループ名
     */
    public function getIndustryGroupName()
    {
        $boxes = $this->industry_group()->first();
        return $boxes->name;
    }

}
