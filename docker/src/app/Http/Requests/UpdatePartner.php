<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartner extends FormRequest
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
            'type' => 'required|numeric',
            'prefecture' => 'required|numeric',
            'address1' => 'required|string|max:100',
            'address2' => 'required|string|max:100',
            'tel' => 'required|numeric|digits_between:7,15',
            'email' => 'required|email|max:100',
            'responsible_last_name' => 'required',
            'responsible_first_name' => 'required',
            'bank_name' => 'required|string|max:100',
            'bank_branch' => 'required|string|max:100',
            'bank_account_type' => 'required|numeric',
            'bank_account_number' => 'required|numeric',
            'bank_account_holder' => 'required|string|max:100|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '荷主名称',
            'type' => '種別',
            'prefecture' => '都道府県',
            'address1' => '住所（配送先）',
            'address2' => '住所（配送先）',
            'tel' => '電話番号',
            'email' => 'メールアドレス',
            'responsible_last_name' => '担当者姓',
            'responsible_first_name' => '担当者名',
            'bank_name' => '取引銀行',
            'bank_branch' => '支店名',
            'bank_account_type' => '口座種別',
            'bank_account_number' => '口座番号',
            'bank_account_holder' => '口座名義',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必ず正しく入力してください。',
        ];
    }
}
