<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateCreateDetail extends FormRequest
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
            'specPr' => 'required',
            'qtyPr' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'namePr.required' => 'Vui lòng chọn tên sản phẩm',

            'specPr.required' => 'Vui lòng chọn thông số sản phẩm',
            'specPr.unique' => 'Sản phẩm đã tồn tại',

            'qtyPr.required' => 'Vui lòng nhập số lượng sản phẩm'
        ];
    }
}
