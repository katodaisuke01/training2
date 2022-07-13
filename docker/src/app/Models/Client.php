<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tel',
        'email',
        'zip_code',
        'prefecture_name',
        'address1',
        'address2',
        'address3',
        'delivery_partnar_id',
        'manager_last_name',
        'manager_first_name',
        'shelf_number',
        'deleted_at',
    ];

    protected $appends = ['display_address','client_area_name'];

    public function getDisplayAddressAttribute()
    {
        return $this->prefecture_name . $this->address1 . $this->address2 . $this->address3;
    }

    /**
     * エリア名
     */
    public function getClientAreaNameAttribute()
    {
        $area_name = data_get($this, 'area.name');
        return $area_name;
    }

    /**
     * @return HasOne
     */
    public function shelf(): HasOne
    {
        return $this->hasOne(Shelf::class);
    }

    /**
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * @return HasMany
     */
    public function client_packages(): HasMany
    {
        return $this->hasMany(ClientPackage::class);
    }

    /**
     * @see https://dev.to/othmane_nemli/laravel-wherehas-and-with-550o
     */
    public function scopeWithWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    /**
     * @return bool
     */
    public function getExistsPickedPackageAttribute(): bool
    {
        return $this->client_packages
            ->where('status', ClientPackage::TYPE_PICKED)
            ->isNotEmpty();
    }

    /**
     * @return Collection
     */
    public static function getChunksForTable(): Collection
    {
        return self::with(['shelf' => function ($q) {
            $q->orderBy('position_row');
        }])
            ->get()
            ->chunk(Shelf::PER_ROW);
    }
}

