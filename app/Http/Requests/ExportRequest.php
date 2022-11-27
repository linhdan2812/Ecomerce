<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $formRules = [
            'time' => [
                'required','numeric','max:12','min:1'
            ],
        ];
        return $formRules;
    }
    public function messages()
    {
        $message = [
            'tittimele.required' => 'Hãy nhập tên sản phẩm',
            'time.numeric' => 'Giá sản phẩm phải là số',
        ];
        return $message;
    }
}
