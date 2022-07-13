<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shelf extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $appends = [
        'position_name',
        'position_key',
    ];

    const PER_ROW = 3;

    /**
     * @return string
     */
    public function getPositionNameAttribute(): string
    {
        return $this->position_column . '-' . $this->position_row;
    }

    /**
     * @return string
     */
    public function getPositionKeyAttribute(): string
    {
        return $this->position_column . $this->position_row;
    }
}
