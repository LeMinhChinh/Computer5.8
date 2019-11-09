<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateEditDetail extends FormRequest
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
            'qtyPr' => 'required',
            'desPr' => 'desPr',
            'specPr' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'namePr.required' => 'Vui lòng nhập trên sản phẩm',

            'qtyPr.required' => 'Vui lòng nhập số lượng sản phẩm',
            'qtyPr.numeric' => 'Số lượng sản phẩm phải là số',

            'desPr.required' => 'Vui lòng nhập miêu tả sản phẩm',

            'specPr.required' => 'Vui lòng chọn thông số sản phẩm'
        ];
    }
}
