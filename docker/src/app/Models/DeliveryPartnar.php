<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryPartnar extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'manager_last_name',
        'manager_first_name',
        'tel',
        'email',
        'delivery_category',
        'deleted_at',
    ];

    /**
     * 箱
     *
     * @return HasMany
     */
    public function delivery_users(): HasMany
    {
        return $this->hasMany('App\Models\DeliveryUser');
    }

    /**
     * @return string
     */
    public function getEmailAtManagerAttribute(): string
    {
        $target = $this->delivery_management_users;
        return $target;
    }

    // 管理者email
    public function getAdminEmailAddressAttribute()
    {
        $users = \App\Models\DeliveryUser::where('delivery_partner_id', $this->id)
            ->select('email')
            ->where('type', 'MANAGER')
            ->pluck('email');
        return $users;
    }
}

