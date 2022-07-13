<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasuringLog extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    const TYPE_START = 1;
    const TYPE_STOP = 0;

    const TYPE_LIST = [
        self::TYPE_START => '開始',
        self::TYPE_STOP => '停止',
    ];

    /**
     * @return bool
     */
    public static function isMeasuring(): bool
    {
        return self::query()
            ->where('type', self::TYPE_START)
            ->exists();
    }

    /**
     * @return MeasuringLog
     */
    public static function measuring(): MeasuringLog
    {
        return self::where('type', self::TYPE_START)
            ->latest()
            ->first();
    }

    /**
     * @return int
     */
    public static function measuringId(): int
    {
        return data_get(self::measuring(), 'id');
    }

    /**
     * @return int
     */
    public static function stopIfExpire(): int
    {
        return self::where('type', self::TYPE_START)
            ->where('created_at', '<', Carbon::now()->subHour())
            ->update([
                'type' => self::TYPE_STOP
            ]);
    }
}
