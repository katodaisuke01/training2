<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait KeywordSearch
{
    /**
     * @param $keyword
     * @return string[]
     */
    public function parseKeyword($keyword): array
    {
        $_q = str_replace('　', ' ', $keyword);  //全角スペースを半角に変換
        $_q = preg_replace('/\s(?=\s)/', '', $_q); //連続する半角スペースは削除
        $_q = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $_q); //円マーク、パーセント、アンダーバーはエスケープ処理
        return array_unique(explode(' ', $_q)); //キーワードを半角スペースで配列に変換し、重複する値を削除
    }

    /**
     * User検索の条件を記載
     * 必要に応じてオーバライドして利用してください
     *
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
            //1つのキーワードに対し、名前かメールアドレスのいずれかが一致しているユーザを抽出
            //キーワードが複数ある場合はAND検索
            $query->where(function ($_query) use ($keyword) {
                $_query->where('first_name', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('last_name', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('first_name_kana', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('last_name_kana', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('email', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('type', 'LIKE', '%' . $keyword . '%')
                    ->orwhere('service_id', 'LIKE', '%' . $keyword . '%');
            });
        }
        return $query;
    }
}
