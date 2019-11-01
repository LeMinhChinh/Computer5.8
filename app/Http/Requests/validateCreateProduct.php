<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateCreateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'namePr' => 'required|unique:product,name',
            'pricePr' => 'required|numeric',
            'percentPr' => 'required|numeric',
            // 'promoPr' => 'required|numeric',
            'imgPr' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'namePr.required' => 'Vui lòng nhập tên sản phẩm',
            'namePr.unique' => 'Sản phẩm đã tồn tại',

            'pricePr.required' => 'Vui lòng nhập giá sản phẩm',
            'pricePr.numeric' => 'Giá sản phẩm phải là số',

            'percentPr.required' => 'Vui lòng nhập % giảm giá cho sản phẩm',
            'percentPr.numeric' => 'Giảm giá sản phẩm phải là số',

            // 'promoPr.required' => 'Vui lòng nhập giá khuyến mãi cho sản phẩm',
            // 'promoPr.numeric' => 'Giá khyến mãi sản phẩm phải là số',

            'imgPr.required' => 'Vui lòng chọn ảnh cho sản phẩm'
        ];
    }
}
