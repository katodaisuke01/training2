<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryUser extends FormRequest
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
            'email' => 'required|email|unique:delivery_users|max:100',
            'type' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'tel' => 'required|numeric|digits_between:7,15',
            'vehicle_number' => 'required',
            'photo' => 'required|file',
            'password' => 'required|min:8|regex:/^[0-9a-zA-Z]*$/',
            'password_confirmation' => 'required_with:password|same:password|min:8|regex:/^[0-9a-zA-Z]*$/',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'メールアドレス',
            'type' => '種別',
            'last_name' => '姓',
            'first_name' => '名',
            'last_name_kana' => 'セイ',
            'first_name_kana' => 'カナ',
            'tel' => '電話番号',
            'vehicle_number' => '車両番号',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必ず正しく入力してください。',
        ];
    }
}
