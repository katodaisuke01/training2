<?php

namespace App\Models;

use App\Traits\KeywordSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\MCategory;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SoftDeletes;
    use KeywordSearch;

    protected $fillable = [
        'm_category_id',
        'm_fish_category_id',
        'm_business_id',
        'm_base_id',
        'm_tolerance_id',
        'm_process_id',
        'm_unit_id',
        'title',
        'article',
        'max_quantity',
        'base_weight',
        'tolerance',
        'landing_configuration',
        'purification_configuration',
        'dealing_type',
        'natural_type',
        'status',
        'm_base_id',
        'image_path',
        'price',
        'industry_group_id',
        'color',
        'deleted_at',
    ];

    // 天然 Or 養殖
    const TYPE_NATURAL = 0;
    const TYPE_AQUACULTURE = 1;
    const NATURAL_TYPE_LIST = [
        self::TYPE_NATURAL => '天然',
        self::TYPE_AQUACULTURE => '養殖',
    ];

    // 複数まとめて処理
    const TYPE_SINGLE = 0;
    const TYPE_MULCH = 1;
    const MULCH_TYPE_LIST = [
        self::TYPE_SINGLE => 'しない',
        self::TYPE_MULCH => 'する',
    ];

    // ステータス
    const TYPE_SPERE = 0;
    const TYPE_PUBLIC = 1;
    const RELEASE_TYPE_LIST = [
        self::TYPE_SPERE => '下書き',
        self::TYPE_PUBLIC => '公開',
    ];

    /**
     * カテゴリー
     */
    public function m_category()
    {
        return $this->belongsTo('App\Models\MCategory')->withTrashed();
    }

    /**
     * 魚種カテゴリー
     */
    public function m_fish_category()
    {
        return $this->belongsTo('App\Models\MFishCategory')->withTrashed();
    }

    /**
     * 加工・締めカテゴリー
     */
    public function m_process()
    {
        return $this->belongsTo('App\Models\MProcess')->withTrashed();
    }

    /**
     * 単位カテゴリー
     */
    public function m_unit()
    {
        return $this->belongsTo('App\Models\MUnit')->withTrashed();
    }

    /**
     * 発注
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order')->withTrashed();
    }

    /**
     * 発注
     */
    public function stocks()
    {
        return $this->hasMany('App\Models\Stock');
    }

    /**
     * 発注
     */
    public function today_stock()
    {
        return $this->hasMany('App\Models\Stock')
            ->where('landing_date', date('Y-m-d'));
    }

    /**
     * 産地
     */
    public function industry_group()
    {
        return $this->belongsTo('App\Models\IndustryGroup');
    }

    /**
     * カテゴリー名称
     */
    public function getCategoryName()
    {
        $category = $this->m_category()->first();
        return $category->name;
    }

    /**
     * カテゴリー名称
     */
    public function getCategoryNameAttribute()
    {
        $category = $this->m_category()->first();
        return $category->name;
    }

    /**
     * 魚種カテゴリー名称
     */
    public function getFishName()
    {
        $fish_category = $this->m_fish_category()->first();
        return $fish_category->name;
    }

    public function getFishNameAttribute()
    {
        $fish_category = $this->m_fish_category()->first();
        return $fish_category->name;
    }

    /**
     * 加工・締め名称
     */
    public function getProcessName()
    {
        $process = $this->m_process()->first();
        if (!is_null($process)) {
            return $process->name;
        } else {
            return "";
        }
    }

    public function getProcessNameAttribute()
    {
        $process = $this->m_process()->first();
        return $process->name;
    }

    /**
     * 単位名称
     */
    public function getUnitName()
    {
        $unit = $this->m_unit()->first();
        return $unit->name;
    }

    public function getUnitNameAttribute()
    {
        $unit = $this->m_unit()->first();
        return $unit->name;
    }

    public function getCreateDateAttribute()
    {
        return \Carbon::parse($this->created_at)->format('Y/m/d');
    }

    public function summarize()
    {
        if ($this->dealing_type == 0) {
            return false;
        } else {
            return true;
        }
    }

    // 管理者email
    public function getAdminEmailAddressAttribute()
    {
        $users = User::where('industry_group_id', $this->industry_group_id)
            ->select('email')
            ->where('type', 'MANAGER')
            ->pluck('email');
        return $users;
    }

    public function getCastWeightValueAttribute()
    {
        $value = $this->base_weight;

        if ($value < 1000) {
            $cast_weight = $value;
        } else {
            $cast_weight = round($value * 0.001, 1); // g => kg
        }
        return $cast_weight;
    }

    /**
     * @param Builder $query
     * @param $category
     * @return Builder
     */
    public function scopeCategorySort(Builder $query, $category): Builder
    {
        if (!empty($category && $category != 'all')) {
            $query->where('m_category_id', $category);
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @param $keyword
     * @return Builder
     */
    public function scopeKeywordSearch(Builder $query, $keyword): Builder
    {
        if (empty($keyword)) {
            return $query;
        }

        foreach ($this->parseKeyword($keyword) as $keyword) {
            //キーワードが複数ある場合はAND検索
            $query->where('title', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
    }
}
