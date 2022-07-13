<?php

namespace App\Models;

use App\Traits\KeywordSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MBusiness;


class Wuser extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use KeywordSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'email',
        'password',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'm_business_id',
        'type',
        'dealing_type',
        'image_path',
        'deleted_at',
    ];

    // 役職
    const OFFICER_GENERAL = 1;
    const OFFICER_LEADER = 2;
    const OFFICER_SECOND_LEADER = 3;
    const OFFICER_CONTRACT_EMPLOYEE = 4;
    const OFFICER_PART_TIME = 5;
    const OFFICER_LIST = [
        self::OFFICER_GENERAL => '一般社員',
        self::OFFICER_LEADER => 'リーダー',
        self::OFFICER_SECOND_LEADER => 'サブリーダー',
        self::OFFICER_PART_TIME => '契約社員',
        self::OFFICER_PART_TIME => 'アルバイト',
    ];

    // 権限
    const TYPE_NORMAL = 1;
    const TYPE_MANAGER = 2;
    const AUTHORITY_LIST = [
        self::TYPE_NORMAL => '一般',
        self::TYPE_MANAGER => '管理者',
    ];

    /**
     * @return BelongsTo
     */
    public function m_business(): BelongsTo
    {
        return $this->belongsTo('App\Models\MBusiness');
    }

    /**
     * @return HasMany
     */
    public function staffWorks(): HasMany
    {
        return $this->hasMany(StaffWork::class);
    }

    public function getUserName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getUserNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getBusinessNameAttribute()
    {
        $business = MBusiness::find($this->m_business_id);

        return $business->name;
    }
}
