<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddBannerRequest extends FormRequest
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
            'photo' => [
                'required',
                'mimes:png,jpg'
            ]
        ];
        return $formRules;
    }
    public function messages()
    {
        $message = [
            'photo.required' => 'Hãy chọn banner',
            'photo.mimes' => 'Hãy chọn đúng file ảnh',
        ];
        return $message;
    }
}
