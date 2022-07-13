<?php

namespace App\Http\Requests\Industry;

use Illuminate\Foundation\Http\FormRequest;

class DacsNewDataRequest extends FormRequest
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
            'id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'id' => '計量済みID',
        ];
    }

    public function messages()
    {
        return [
            'order_ids.required' => ':attributeを入力してください。',
        ];
    }
}
