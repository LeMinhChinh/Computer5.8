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
            'specPr' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'namePr.required' => 'Tên sản phẩm không được để trống',
            'specPr.required' => 'Vui lòng chọn thông số sản phẩm'
        ];
    }
}
