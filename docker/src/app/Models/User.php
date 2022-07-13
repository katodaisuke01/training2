<?php

namespace App\Models;

use App\Traits\KeywordSearch;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
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
        'type',
        'dealing_type',
        'image_path',
        'industry_group_id',
        'deleted_at',
    ];

    // デフォルトの出荷ステータス時間
    const DEFAULT_SHIPPING_SCHEDULE_TIME = '16:00:00';

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

    public function industry_group()
    {
        return $this->belongsTo('App\Models\IndustryGroup');
    }

    public function getUserName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }
}
