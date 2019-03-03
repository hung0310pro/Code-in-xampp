<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'fullname' => 'required:user,fullname',
            'password1' => 'required:user,password',
        ];
    }

    // bắt buộc cái hàm in ra lỗi phải là messages()

    public function messages(){
        return [
            'fullname.required' => 'Bạn phải điền tên đăng nhập',
            'password1.required' => 'Bạn phải điền password',
        ];
    }
}
