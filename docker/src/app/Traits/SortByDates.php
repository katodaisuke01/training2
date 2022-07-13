<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SortByDates
{
    /**
     * @param Builder $query
     * @param $sort_created_at
     * @param $sort_shipping_date
     * @return Builder
     */
    public function scopeSortByDates(Builder $query, $sort_created_at, $sort_shipping_date)
    {
        if ($sort_created_at == 'up') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort_created_at == 'down') {
            $query->orderBy('created_at', 'desc');
        }
        if ($sort_shipping_date == 'up') {
            $query->orderBy('shipping_date', 'asc');
        } elseif ($sort_shipping_date == 'down') {
            $query->orderBy('shipping_date', 'desc');
        }
        return $query;
    }
}
