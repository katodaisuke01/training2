<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasuredProduct extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    /**
     * 配列/JSONシリアル化時の日付のデフォルトフォーマット
     *
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y/m/d H:i:s');
    }

    /**
     * @param $query
     * @param string $column
     * @param $start_date
     * @param $end_date
     * @return Builder
     */
    public function scopeDatePick($query, string $column = 'created_at', $start_date = null, $end_date = null): Builder
    {
        if (!$start_date || !$end_date) {
            return $query->whereDate($column, Carbon::today());
        }

        return $query->whereBetween(
            $column,
            [
                (new Carbon($start_date))->startOfDay(),
                (new Carbon($end_date))->endOfDay(),
            ]
        );
    }

    /**
     * @param int $measured_product_id
     * @return Collection
     */
    public static function getNewData(int $measured_product_id): Collection
    {
        return self::where('id', '>', $measured_product_id)
            ->get();
    }

    /**
     * @return int
     */
    public static function getLatestId(): int
    {
        return data_get(self::latest('id')->first(), 'id') ?? 0;
    }

    /**
     * 元データ例 <LF>G3000534.7g72<CR>
     * @param $rawWeight
     * @return array
     */
    public static function parseWeight($rawWeight): array
    {
        $code_num = strpos($rawWeight, 'G');
        $status = substr($rawWeight, $code_num + 1, 1);

        preg_match('/G.(.+)g/', $rawWeight, $weight);

        return ['status' => $status, 'weight' => (float)$weight[1]];
    }
}
