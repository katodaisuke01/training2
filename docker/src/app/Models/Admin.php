<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'email',
        'password',
        'name',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'officer',
        'type',
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
}
