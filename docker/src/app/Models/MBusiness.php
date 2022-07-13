<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class MBusiness extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prefecture',
        'prefecture_name',
        'address1',
        'address2',
        'zip_code',
        'delivery_prefecture',
        'delivery_prefecture_name',
        'delivery_address1',
        'delivery_address2',
        'delivery_zipcode',
        'tel',
        'fax',
        'email',
        'responsible_last_name',
        'responsible_first_name',
        'bank_name',
        'bank_branch',
        'bank_account_type',
        'bank_account_number',
        'bank_account_holder',
        'image_path',
        'deleted_at',
    ];

    /**
     * 箱
     *
     * @return HasMany
     */
    public function packages(): HasMany
    {
        return $this->hasMany('App\Models\Package');
    }

    /**
     * 集荷済の箱
     */
    public function pickup_packages()
    {
        return $this->hasMany('App\Models\Package')
            ->pickup()
            ->orderBy('id', 'asc');
    }

    public function checkin_target_packages()
    {
        return $this->hasMany('App\Models\Package')
            ->checkin()
            ->orderBy('id', 'asc');
    }

    public function daily_checkin_histories()
    {
        return $this->hasOne('App\Models\DailyCheckinHistory');
    }

    public function getAddress()
    {
        $address = $this->prefecture_name . '' . $this->address1 . '' . $this->address2 . '' . $this->address3;
        return $address;
    }

    public function getAddressAttribute(): string
    {
        return $this->prefecture_name . $this->address1 . $this->address2 . $this->address3;
    }

    // 管理者email
    public function getAdminEmailAddressAttribute()
    {
        $users = \App\Models\Wuser::where('m_business_id', $this->id)
            ->select('email')
            ->where('type', 'MANAGER')
            ->pluck('email');
        return $users;
    }

    public function getAddressWithZipCodeAttribute(): string
    {
        return '〒' . $this->zip_code . ' ' . $this->address;
    }

    public function getDeliveryAddressAttribute(): string
    {
        return $this->delivery_prefecture_name . $this->delivery_address1 . $this->delivery_address2 . $this->delivery_address3;
    }

    public function getDeliveryAddressWithZipCodeAttribute(): string
    {
        return '〒' . $this->delivery_zipcode . ' ' . $this->delivery_address;
    }

    /**
     * @return string
     */
    public function getVaryAttribute(): string
    {
        return '配送先';
    }

    /**
     * @return string
     */
    public function getResponsibleNameAttribute(): string
    {
        return $this->responsible_last_name . ' ' . $this->responsible_first_name;
    }

    /**
     * @return int
     */
    public function getOrderTimesAttribute(): int
    {
        return $this->packages()->count();
    }

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        return $this['image_path'] ? Storage::disk('s3')->temporaryUrl($this['image_path'], Carbon::now()->addMinute()) : '';
    }

    /**
     * @return int
     */
    public function getCountNotConfirmedAttribute(): int
    {
        return $this->packages->sum('count_not_confirmed');
    }

    /**
     * @return int
     */
    public function getCountConfirmedAttribute(): int
    {
        return $this->packages->sum('count_confirmed');
    }

    /**
     * @return int
     */
    public function getCountSortedAttribute(): int
    {
        return $this->packages->sum('count_sorted');
    }

    /**
     * @return int
     */
    public function getCountPickedAttribute(): int
    {
        return $this->packages->sum('count_picked');
    }

    /**
     * @return int
     */
    public function getCountShippedAttribute(): int
    {
        return $this->packages->sum('count_shipped');
    }

    /**
     * @return string
     */
    public function getCompleteProgressRateAttribute(): string
    {
        $complete_progress = 0;
        if ($this->count_shipped):
            $progress = $this->count_shipped / $this->packages->sum('orders_count');
            $complete_progress = number_format($progress * 100, 1);
        endif;
        return $complete_progress;
    }

    /**
     * @return string
     */
    public function getProgressRateAttribute(): string
    {
        $complete_progress = 0;
        $confirmed_progress = 0;
        $sorted_progress = 0;
        $picked_progress = 0;
        $shipped_progress = 0;

        if ($this->count_confirmed):
            $progress = $this->count_confirmed / $this->packages->sum('orders_count');
            $confirmed_progress = number_format($progress * 25, 1);
        endif;
        if ($this->count_sorted):
            $progress = $this->count_sorted / $this->packages->sum('orders_count');
            $sorted_progress = number_format($progress * 50, 1);
        endif;
        if ($this->count_picked):
            $progress = $this->count_picked / $this->packages->sum('orders_count');
            $picked_progress = number_format($progress * 75, 1);
        endif;
        if ($this->count_shipped):
            $progress = $this->count_shipped / $this->packages->sum('orders_count');
            $shipped_progress = number_format($progress * 100, 1);
        endif;

        $complete_progress = number_format($confirmed_progress + $sorted_progress + $picked_progress + $shipped_progress, 1);
        return $complete_progress;
    }
}
