<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogOrderCreate extends FormRequest
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
            'shipping_date' => 'required|date',
            'zipcode' => 'required',
            'prefecture_name' => 'required',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'address3' => 'nullable|string|max:255',
            'tel' => 'required|string|max:255',
            'email' => 'required|email|max:100|',
            'delivery_partnar' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'shipping_date' => '発送日',
            'product_id' => '商品',
            'quantity' => '数量',
            'zipcode' => '郵便番号',
            'prefecture_name' => '県名',
            'address1' => '市区町村',
            'address2' => '番地',
            'tel' => '電話番号',
            'email' => 'メールアドレス',
            'delivery_partnar' => '配送業者',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => ':attributeを入力・選択してください。',
        ];
    }
}
