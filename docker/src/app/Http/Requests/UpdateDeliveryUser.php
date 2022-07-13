<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateDeliveryUser extends FormRequest
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
    public function rules(Request $request): array
    {
        // unique:対象テーブル,対象カラム,主キーの値,主キーのカラム名で自身を除外できる
        return [
            'id' => 'required',
            'email' => 'sometimes|required|email|unique:delivery_users,email,' . $request->id . ',id|max:100',
            'type' => 'required',
            'last_name' => 'sometimes|required',
            'first_name' => 'sometimes|required',
            'tel' => 'required|numeric|digits_between:7,15',
            'vehicle_number' => 'sometimes|required',
            'photo' => 'file',
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
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必ず正しく入力してください。',
        ];
    }
}
