<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryCreate extends FormRequest
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
            'name' => 'required',
            'email' => 'email|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
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