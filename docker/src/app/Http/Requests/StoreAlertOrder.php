<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlertOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'order_id' => 'required|numeric',
            'alerts' => '',
        ];
    }

    public function attributes(): array
    {
        return [
            'alert' => '商品の異常',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必ず正しく入力してください。',
        ];
    }
}
