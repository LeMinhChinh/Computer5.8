<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateAccount extends FormRequest
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
            'roleAcc' => 'required',
            'sttAcc' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'roleAcc.required' => 'Vui lòng chọn role',
            'sttAcc.required' => 'Vui lòng chọn status'
        ];
    }
}
