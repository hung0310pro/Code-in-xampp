<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reporsinhvien extends Model
{
	const BANG_SACH = 'tb_sach';
	const BANG_SINHVIEN = 'tb_sinhvien';
	const BANG_TRUNGG = 'tb_trunggian';
	const BANG_THE = 'tb_themuon';
	const ID_SINHVIEN = 'id_sinhvien';
	const ID_SACH = 'id_sach';
	const ID_THE = 'id_the';

	public function getListsv()
	{
		return $listSv = Sinhvien::all()->toArray();
	}

	public function addSinhvien($sinhvien)
	{
		$sinhviens = new Sinhvien();
		$sinhviens->name = $sinhvien->getTen();
		$sinhviens->birthday = $sinhvien->getNgaysinh();
		$sinhviens->age = $sinhvien->getTuoi();
		$sinhviens->class = $sinhvien->getLop();
		$sinhviens->save();
	}

	public function getSinhvien($sinhvien)
	{
		return $sinhvien = Sinhvien::find($sinhvien->getId())->toArray();
	}

	public function updateSV($sinhvien)
	{
		$sinhviens = Sinhvien::find($sinhvien->getId());
		$sinhviens->name = $sinhvien->getTen();
		$sinhviens->birthday = $sinhvien->getNgaysinh();
		$sinhviens->age = $sinhvien->getTuoi();
		$sinhviens->class = $sinhvien->getLop();
		$sinhviens->save();
	}

	public function deleteSv($sinhvien)
	{
		return Sinhvien::where('id', $sinhvien->getId())->delete();
	}

	public function getListthe($sinhvien)
	{
		return $listthe = DB::table(self::BANG_THE)->where(self::ID_SINHVIEN, '=', $sinhvien->getId())->get();
	}

	public function demSach($sinhvien)
	{
		return $data = DB::table(self::BANG_TRUNGG)->where(self::BANG_THE . '.' . self::ID_SINHVIEN, '=', $sinhvien->getId())->join(self::BANG_THE, self::BANG_THE . '.id', '=', self::BANG_TRUNGG . '.' . self::ID_THE)->join(self::BANG_SINHVIEN, self::BANG_SINHVIEN . '.id', '=', self::BANG_THE . '.' . self::ID_SINHVIEN)->count();
	}

	public function trangthaiSach($sinhvien, $state)
	{
		/*return $sachst = DB::select("select count(*) as soluong from " . self::BANG_TRUNGG . " join " . self::BANG_THE . " on " . self::BANG_THE . ".id = " . self::BANG_TRUNGG . ".id_the join " . self::BANG_SINHVIEN . " on " . self::BANG_SINHVIEN . ".id = " . self::BANG_THE . "." . self::ID_SINHVIEN . " where " . self::BANG_THE . "." . self::ID_SINHVIEN . " = '" . $sinhvien->getId() . "' and state = " . $state);*/

		return $data = DB::table(self::BANG_TRUNGG)->where(self::BANG_THE . '.' . self::ID_SINHVIEN, '=', $sinhvien->getId())->where('state', '=', $state)->join(self::BANG_THE, self::BANG_THE . '.id', '=', self::BANG_TRUNGG . '.' . self::ID_THE)->join(self::BANG_SINHVIEN, self::BANG_SINHVIEN . '.id', '=', self::BANG_THE . '.' . self::ID_SINHVIEN)->count();
	}

	public function getListsachid($id)
	{
		return $data = DB::table(self::BANG_TRUNGG)->where(self::BANG_TRUNGG . '.' . self::ID_THE, '=', $id)->leftjoin(self::BANG_SACH, self::BANG_TRUNGG . '.' . self::ID_SACH, '=', self::BANG_SACH . '.id')->get();
	}
}
