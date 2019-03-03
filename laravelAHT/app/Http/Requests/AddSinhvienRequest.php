<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSinhvienRequest extends FormRequest
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
			'tensv' => 'required::tb_sinhvien,name',
			'ngaysinh' => 'required::tb_sinhvien,birthday', // tên bảng và tên cột
			'tuoi' => 'required::tb_sinhvien,age',
			'lop' => 'required::tb_sinhvien,class',
		];
	}

	public function messages()
	{
		return [
			'tensv.required' => 'Bạn chưa điền tên',
			'ngaysinh.required' => 'Bạn chưa điền ngày sinh',
			'tuoi.required' => 'Bạn chưa điền tuổi',
			'lop.required' => 'Bạn chưa điền lớp',
		];
	}
}
