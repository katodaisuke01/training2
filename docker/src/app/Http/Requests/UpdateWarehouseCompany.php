<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseCompany extends FormRequest
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
            'name' => 'required|string|max:100',
            'prefecture' => 'required|numeric',
            'address1' => 'required|string|max:100',
            'address2' => 'required|string|max:100',
            'zip_code' => 'required|numeric|digits:7',
            'delivery_prefecture' => 'required|numeric',
            'delivery_address1' => 'required|string|max:100',
            'delivery_address2' => 'required|string|max:100',
            'delivery_zipcode' => 'required|numeric|digits:7',
            'tel' => 'required|numeric|digits_between:7,15',
            'fax' => 'required|numeric|digits_between:7,15',
            'email' => 'required|email|max:100',
            'image' => 'file',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '荷主名称',
            'prefecture' => '都道府県',
            'address1' => '住所（配送先）',
            'address2' => '住所（配送先）',
            'zip_code' => '郵便番号',
            'delivery_prefecture' => '都道府県（集荷先）',
            'delivery_address1' => '住所（集荷先）',
            'delivery_address2' => '住所（集荷先）',
            'delivery_zipcode' => '郵便番号（集荷先）',
            'tel' => '電話番号',
            'fax' => 'ファックス',
            'email' => 'メールアドレス',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必ず正しく入力してください。',
        ];
    }
}
