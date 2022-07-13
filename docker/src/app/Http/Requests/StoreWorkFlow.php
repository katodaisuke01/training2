<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkFlow extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'order_package' => 'required',
            // 'qr_code' => 'nullable|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'order_package' => '保存する箱',
            // 'qr_code' => 'QRコード',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを選択してください。',
            // '*.numeric' => ':attributeを半角で読み取ってください。',
        ];
    }
}
