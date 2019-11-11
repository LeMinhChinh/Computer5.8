<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateInfo extends FormRequest
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
            'userAcc' => 'required',
            'emailAcc' => 'required|email',
            'fnameAcc' => 'required',
            'phoneAcc' => 'required|numeric|min:10',
            'genderAcc' => 'required',
            'ageAcc' => 'required',
            'addAcc' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'userAcc.required' => 'Vui lòng nhập tên đăng nhập',

            'emailAcc.required' => 'Vui lòng nhập email',
            'emailAcc.email' => 'Định dạng email không đúng',

            'fnameAcc.required' => 'Vui lòng nhập đầy đủ họ tên',

            'phoneAcc.required' => 'Vui lòng nhập số điện thoại',
            'phoneAcc.numeric' => 'Định dạng số điện thoại không đúng',
            'phoneAcc.min' => 'Số điện thoại không đúng',

            'genderAcc.required' => 'Vui lòng chọn giới tính',

            'ageAcc.required' => 'Vui lòng nhập ngày sinh',

            'addAcc.required' => 'Vui lòng nhập địa chỉ'
        ];
    }
}
