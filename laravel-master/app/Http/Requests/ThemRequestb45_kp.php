<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemRequestb45_kp extends FormRequest
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
            'theloai' => 'required:theloai,Ten', // bảng thể loại, cột Ten
        ];
    }

    public function messages(){
        return [
            'theloai.required' => 'Điền Thể Loại',
        ];
    }
}
