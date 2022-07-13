<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerSipping extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'client_id' => '顧客ID',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必ず正しく入力してください。',
        ];
    }
}
