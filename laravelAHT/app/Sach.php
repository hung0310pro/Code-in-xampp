<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
	protected $table = 'tb_sach';
	public $timestamps = false;
	private $tenSach;
	private $tacGia;
	private $namSanxuat;
	private $id;

	public function sachVathe()
	{
		return $this->hasMany('App\Sachvsthe', 'id_sach', 'id');
	}

	public function setTensach($tenSach)
	{
		$this->tenSach = $tenSach;
	}

	public function getTensach()
	{
		return $this->tenSach;
	}

	public function setTacgia($tacGia)
	{
		$this->tacGia = $tacGia;
	}

	public function getTacgia()
	{
		return $this->tacGia;
	}

	public function setNamsx($namSanxuat)
	{
		$this->namSanxuat = $namSanxuat;
	}

	public function getNamsx()
	{
		return $this->namSanxuat;
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
