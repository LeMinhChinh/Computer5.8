<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateCreateBill extends FormRequest
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
            "nameCt" => "required",
            "phoneCt"  => "required|numeric|min:10",
            "emailCt"     => "required|email",
            "addCt"     => "required",
            "payCt"     => "required"
        ];
    }

    public function messages()
    {
        return [
            'nameCt.required' => 'Vui lòng nhập họ tên',

            'phoneCt.required' => 'Vui lòng nhập số điện thoại',
            'phoneCt.numeric' => 'Định dạng số điện thoại không đúng',
            'phoneCt.min' => 'Số điện thoại chưa đúng',

            'emailCt.required' => 'Vui lòng nhập địa chỉ email',
            'emailCt.email' => 'Địa chỉ email chưa đúng',

            'addCt.required' => 'Vui lòng nhập địa chỉ nhận hàng',

            'payCt.required' => 'Vui lòng chọn hình thức thanh toán',
        ];
    }
}
