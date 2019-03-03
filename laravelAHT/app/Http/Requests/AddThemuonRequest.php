<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddThemuonRequest extends FormRequest
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
			'tensach' => 'required::tb_trunggian,id_sach',
			'sinhvien' => 'required::tb_themuon,id_sinhvien',
		];
	}

	public function messages()
	{
		return [
			'ngaymuon.required' => 'Bạn chưa điền ngày mượn',
			'ngaytra.required' => 'Bạn chưa điền ngày trả',
			'tensach.required' => 'Bạn chưa chọn tên sách',
			'sinhvien.required' => 'Bạn chưa chọn tên sinh viên',
		];
	}
}
