<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditWuserUpdate extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'required',
            'last_name_kana' => 'required|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_kana' => 'required|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'service_id' => 'required|min:6|',
            'email' => 'required|email|max:100',
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
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
        ];
    }
}
