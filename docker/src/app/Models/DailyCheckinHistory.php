<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DailyCheckinHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'm_business_id',
        'checkin_date',
        'image_path',
    ];

    public function m_business()
    {
        return $this->belongsTo('App\Models\MBusiness');
    }

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        return $this['image_path'] ? Storage::disk('s3')->temporaryUrl($this['image_path'], Carbon::now()->addMinute()) : '';
    }
}
