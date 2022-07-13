<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class DeliveryUser extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'service_id',
        'delivery_partner_id',
        'password',
        'type',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'tel',
        'vehicle_number',
        'image_path',
        'date_last',
        'deleted_at',
    ];

    // 権限
    const TYPE_NORMAL = 'NORMAL';
    const TYPE_MANAGER = 'MANAGER';
    const AUTHORITY_LIST = [
        self::TYPE_NORMAL => 'ドライバー',
        self::TYPE_MANAGER => '管理者',
    ];

    public function delivery_partnar()
    {
        return $this->belongsTo('App\Models\DeliveryPartnar');
    }

    public function getNameAttribute(): string
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getImageAttribute(): string
    {
        return $this['image_path'] ? Storage::disk('s3')->temporaryUrl($this['image_path'], Carbon::now()->addMinute()) : '';
    }
}
