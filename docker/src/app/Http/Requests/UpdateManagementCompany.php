<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagementCompany extends FormRequest
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
            'pickup_prefecture' => 'required|numeric',
            'pickup_address1' => 'required|string|max:100',
            'pickup_address2' => 'required|string|max:100',
            'pickup_zipcode' => 'required|numeric|digits:7',
            'tel' => 'required|numeric|digits_between:7,15',
            'fax' => 'required|numeric|digits_between:7,15',
            'email' => 'required|email|max:100',
            'image' => 'file',
            'user_name' => 'string',
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
            'pickup_prefecture' => '都道府県（集荷先）',
            'pickup_address1' => '住所（集荷先）',
            'pickup_address2' => '住所（集荷先）',
            'pickup_zipcode' => '郵便番号（集荷先）',
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
