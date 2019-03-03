<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Themuon extends Model
{
	protected $table = 'tb_themuon';
	public $timestamps = false;
	protected $idsinhvien;
	protected $borrowdate;
	protected $paydate;
	protected $state;
	protected $sach;
	protected $id;

	public function sachVathe()
	{
		return $this->hasMany('App\Sachvsthe', 'idthe', 'id');
	}

	public function setIdsinhvien($idsinhvien)
	{
		$this->idsinhvien = $idsinhvien;
	}

	public function getIdsinhvien()
	{
		return $this->idsinhvien;
	}

	public function setNgaymuon($borrowdate)
	{
		$this->borrowdate = $borrowdate;
	}

	public function getNgaymuon()
	{
		return $this->borrowdate;
	}

	public function setNgaytra($paydate)
	{
		$this->paydate = $paydate;
	}

	public function getNgaytra()
	{
		return $this->paydate;
	}

	public function setTrangthai($state)
	{
		$this->state = $state;
	}

	public function getTrangthai()
	{
		return $this->state;
	}

	public function setSach($sach)
	{
		$this->sach = $sach;
	}

	public function getSach()
	{
		return $this->sach;
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
