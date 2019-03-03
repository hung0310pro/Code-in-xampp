<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
	protected $table = 'tb_sinhvien';
	public $timestamps = false;
	private $ten;
	private $ngaysinh;
	private $tuoi;
	private $lop;
	private $id;

	public function themuon()
	{
		return $this->hasMany('App\Themuon', 'idsinhvien', 'id');
	}

	public function setTen($ten)
	{
		$this->ten = $ten;
	}

	public function getTen()
	{
		return $this->ten;
	}

	public function setNgaysinh($ngaysinh)
	{
		$this->ngaysinh = $ngaysinh;
	}

	public function getNgaysinh()
	{
		return $this->ngaysinh;
	}

	public function setTuoi($tuoi)
	{
		$this->tuoi = $tuoi;
	}

	public function getTuoi()
	{
		return $this->tuoi;
	}

	public function setLop($lop)
	{
		$this->lop = $lop;
	}

	public function getLop()
	{
		return $this->lop;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}
}
