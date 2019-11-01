<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'txtEmail' => 'required|email',
            'txtName' => 'required',
            'txtPassword' => 'required|min:8',
            'txtRePassword' => 'required_with:txtPassword|same:txtPassword|min:8',
            'txtFName' => 'required',
            'txtPhone' => 'required',
            'txtBirth' => 'required',
            'txtAddress' => 'required',
            'gender' => 'required|in:1,0'
        ];
    }

    public function messages()
    {
        return [
            'txtEmail.required' => "Vui lòng nhập Email",
            'txtEmail.email' => "Định dạng email không đúng",

            'txtName.required' => "Vui lòng nhập tên đăng nhập",

            'txtPassword.required' => "Vui lòng nhập mật khẩu",
            'txtPassword.min' => "Mật khẩu không được dưới 8 kí tự",

            'txtRePassword.required_with' => "Vui lòng nhập lại mật khẩu",
            'txtRePassword.same' => "Mật khẩu nhập lại chưa khớp",

            'txtFName.required' => "Vui lòng nhập đầy đủ họ tên",

            'txtPhone.required' => "Vui lòng nhập số điện thoại",

            'txtBirth.required' => "Vui lòng nhập ngày sinh",

            'txtAddress.required' => "Vui lòng nhập địa chỉ",

            'gender.required' => "Vui lòng chọn giới tính",
            'gender.in' => "Lựa chọn không tồn tại"
        ];
    }
}
