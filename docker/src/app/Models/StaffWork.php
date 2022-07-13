<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class StaffWork extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'wuser_id', 
        'task_id',  
        'package_id',
        'order_id',  
        'amount', 
        'client_package_id',
        'completed_flg',
    ];

    protected $appends = [
        'wuser_image'
    ];

    // 作業種別
    const TASK_RECEIPT = 1;
    const TASK_HANDLING = 2;
    const TASK_SORTING = 3;
    const TASK_PICKING = 4;
    const TASK_SHIPPING_CONFIRMATION = 5;
    const TASK_STATUS_LIST = [
        self::TASK_RECEIPT => '荷受け',
        self::TASK_HANDLING => '荷捌き',
        self::TASK_SORTING => '仕分け',
        self::TASK_PICKING => '摘取り',
        self::TASK_SHIPPING_CONFIRMATION => '出荷チェック',
    ];

    // 作業進捗
    const TYPE_NOT_START = 0;
    const TYPE_PROCESS = 1;
    const TYPE_COMPLETE = 2;
    const PROGRESS_STATUS_LIST = [
        self::TYPE_NOT_START => '未着手',
        self::TYPE_PROCESS => '作業中',
        self::TYPE_COMPLETE => '完了',
    ];    

    public function wuser(): BelongsTo 
    {
     return $this->belongsTo(Wuser::class);
    }

    public function getWuserImageAttribute()
    {
        $wuser = $this->wuser->first();
        return $wuser->image_path ? Storage::disk('s3')->temporaryUrl($wuser->image_path, Carbon::now()->addMinute()) : '';
    }

    // 完了しているタスクの総数
    public function getAllTaskCompletedAmountAttribute($taskid)
    {
        $amount = StaffWork::where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->count();
        return $amount;
    }

    // 完了している当月のタスクの総数
    public function getMonthlyTaskCompletedAmountAttribute($taskid)
    {
        $amount = StaffWork::where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->whereMonth('staff_works.created_at', Carbon::today()->month)->count();
        return $amount;
    }

    // 完了している今週のタスクの総数
    public function getWeeklyTaskCompletedAmountAttribute($taskid)
    {
        $today = Carbon::today();
        $day_of_week = $today->dayOfWeek;
        $monday = Carbon::today()->subDay($day_of_week -1);
        $amount = StaffWork::where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->whereDate('staff_works.created_at', '>=', $monday)->count();
        return $amount;
    }

    // 完了している今日のタスクの総数
    public function getDailyTaskCompletedAmountAttribute($taskid)
    {
        $amount = StaffWork::where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->whereDate('staff_works.created_at', Carbon::today())->count();
        return $amount;
    }

    // 当月の作業している人数
    public function getMonthlyStaffAmountAttribute($taskid)
    {
        $staff_amount = StaffWork::select('wuser_id')->where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->whereMonth('staff_works.created_at', Carbon::today()->month)->groupBy('task_id')->distinct('wuser_id')->count();
        return $staff_amount;
    }

    // 今週の作業している人数
    public function getWeeklyStaffAmountAttribute($taskid)
    {
        $today = Carbon::today();
        $day_of_week = $today->dayOfWeek;
        $monday = Carbon::today()->subDay($day_of_week -1);
        $staff_amount = StaffWork::select('wuser_id')->where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->whereDate('staff_works.created_at', '>=', $monday)->groupBy('task_id')->distinct('wuser_id')->count();
        return $staff_amount;
    }

    // 当日の作業している人数
    public function getDailyStaffAmountAttribute($taskid)
    {
        $staff_amount = StaffWork::select('wuser_id')->where('task_id', $taskid)->where('completed_flg', self::TYPE_COMPLETE)->whereDate('staff_works.created_at', Carbon::today())->groupBy('task_id')->distinct('wuser_id')->count();
        return $staff_amount;
    }

}