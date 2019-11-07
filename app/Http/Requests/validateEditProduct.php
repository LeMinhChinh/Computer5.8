<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateEditProduct extends FormRequest
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
            'namePr' => 'required',
            'pricePr' => 'required|numeric',
            'percentPr' => 'required|numeric',
            'typePr' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'namePr.required' => 'Vui lòng nhập tên sản phẩm',

            'pricePr.required' => 'Vui lòng nhập giá sản phẩm',
            'pricePr.numeric' => 'Giá sản phẩm phải là số',

            'percentPr.required' => 'Vui lòng nhập % giảm giá cho sản phẩm',
            'percentPr.numeric' => 'Giảm giá sản phẩm phải là số',

            'typePr.required' => 'Vui lòng chọn loại sản phẩm'
        ];
    }
}
