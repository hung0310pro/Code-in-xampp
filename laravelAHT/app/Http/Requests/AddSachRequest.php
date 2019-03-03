<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSachRequest extends FormRequest
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
			'tensach' => 'required::tb_sach,namebook',
			'tacgia' => 'required::tb_sach,author', // tên bảng và tên cột
			'namsx' => 'required::tb_sach,p_year',
		];
	}

	public function messages()
	{
		return [
			'tensach.required' => 'Bạn chưa điền tên sách',
			'tacgia.required' => 'Bạn chưa điền tên tác giả',
			'namsx.required' => 'Bạn chưa điền năm sản xuất',
		];
	}
}
