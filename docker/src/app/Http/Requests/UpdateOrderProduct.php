<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderProduct extends FormRequest
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
            'm_category_id' => 'required',
            'm_fish_category_id' => 'required',
            'm_process_id' => 'required',
            'm_unit_id' => 'required',
            'tolerance' => 'required|integer',
            'landing_configuration' => 'required|integer',
            'purification_configuration' => 'required|integer',
            'title' => 'required',
            'dealing_type' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'm_category_id' => 'カテゴリー',
            'm_fish_category_id' => '魚種',
            'm_process_id' => '加工・締め',
            'm_unit_id' => '単位',
            'base_weight' => '基準重量',
            'tolerance' => '計量許容値',
            'landing_configuration' => '水揚げ日',
            'purification_configuration' => '浄化日',
            'title' => '商品名称',
            'dealing_type' => '天然・養殖',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
        ];
    }
}
