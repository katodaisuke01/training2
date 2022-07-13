<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWuserCreate extends FormRequest
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
            'last_name' => 'sometimes|required',
            'first_name' => 'sometimes|required',
            'last_name_kana' => 'sometimes|required|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_kana' => 'sometimes|required|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'service_id' => 'sometimes|required|min:6|',
            'email' => 'sometimes|required|email|max:100|unique:users',
            'password' => 'sometimes|required|min:8|regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
            'password_confirmation' => 'sometimes|required_with:password|same:password|min:8|regex:/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
        ];
    }

    public function attributes()
    {
        return [
            'last_name' => '姓',
            'first_name' => '名',
            'last_name_kana' => 'セイ',
            'first_name_kana' => 'カナ',
            'service_id' => 'ログインユーザーID',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
        ];
    }
}
