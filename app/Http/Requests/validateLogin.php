<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateLogin extends FormRequest
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
            'txtPassword' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtEmail.required' => "Vui lòng nhập Email",
            'txtEmail.email' => "Định dạng email không đúng",
            'txtPassword.required' => "Vui lòng nhập mật khẩu"
        ];
    }
}
