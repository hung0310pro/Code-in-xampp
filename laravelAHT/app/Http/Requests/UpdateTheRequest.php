<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTheRequest extends FormRequest
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
			'ngaymuon' => 'required::tb_themuon,borrow_date',
			'ngaytra' => 'required::tb_themuon,pay_date', // tên bảng và tên cột
			'trangthai' => 'required::tb_themuon,state',
		];
	}

	public function messages()
	{
		return [
			'ngaymuon.required' => 'Bạn chưa điền ngày mượn',
			'ngaytra.required' => 'Bạn chưa điền ngày trả',
			'trangthai.required' => 'Bạn chưa chọn trạng thái',
		];
	}
}
