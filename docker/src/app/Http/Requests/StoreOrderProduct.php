<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'fish_category' => 'required',
            'process_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'base_weight' => 'numeric',
            // 'max_quantity' => 'integer',
            'tolerance' => 'required|integer',
            // 'landing_configuration' => 'integer',
            // 'purification_configuration' => 'integer',
            'title' => 'required',
            'natural_type' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'カテゴリー',
            'fish_category' => '魚種',
            'process_id' => '加工・締め',
            'unit_id' => '単位',
            'price' => '販売価格',
            'base_weight' => '基準重量',
            // 'max_quantity' => '最大容量',
            'tolerance' => '計量許容値',
            // 'landing_configuration' => '水揚げ日',
            // 'purification_configuration' => '浄化日',
            'title' => '商品名称',
            'natural_type' => '天然・養殖',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
        ];
    }
}
