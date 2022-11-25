<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveProductRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('products')->ignore($this->id)
            ],
            'summary' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'photo' => [
                'mimes:jpg,png'
            ],
            'stock' => [
                'required',
                'integer'
            ],
            'size' => [
                'required'
            ],
            'price' => [
                'required',
                'integer'
            ],
            'discount' => [
                'integer'
            ],


        ];
        return $formRules;
    }

    public function messages()
    {
        $message = [
            'title.required' => 'Hãy nhập tên sản phẩm',
            'title.unique' => 'Tên đã tồn tại',
            'summary.required' => 'Hãy nhập tóm tắt',
            'description.required' => 'Hãy nhập nội dung chi tiết',
            'photo.mimes' => 'Hãy chọn đúng file ảnh',
            'stock.required' => 'Hãy nhập tên số lượng trong kho',
            'stock.integer' => 'Số lượng phải là số',
            'size.required' => 'Hãy nhập size sản phẩm',
            'price.required' => 'Hãy nhập giá sản phẩm',
            'price.integer' => 'Giá sản phẩm phải là số',
            'discount.integer' => 'Giá giảm phải là số',
        ];
        return $message;
    }
}
