<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateCreateSpec extends FormRequest
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
            'ramPr' => 'required',
            'cpuPr' => 'required',
            'hddPr' => 'required',
            'colorPr' => 'required',
            'screenPr' => 'required',
            'batteryPr' => 'required',
            'osPr' => 'required',
            'sizePr' => 'required',
            'weightPr' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ramPr.required' => 'Vui lòng nhập ram sản phẩm',
            'cpuPr.required' => 'Vui lòng nhập cpu sản phẩm',
            'hddPr.required' => 'Vui lòng nhập hard drive sản phẩm',
            'colorPr.required' => 'Vui lòng nhập color sản phẩm',
            'screenPr.required' => 'Vui lòng nhập screen sản phẩm',
            'batteryPr.required' => 'Vui lòng nhập battery sản phẩm',
            'osPr.required' => 'Vui lòng nhập operating system sản phẩm',
            'sizePr.required' => 'Vui lòng nhập size sản phẩm',
            'weightPr.required' => 'Vui lòng nhập weight sản phẩm'
        ];
    }
}
