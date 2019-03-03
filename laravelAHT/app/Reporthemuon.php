<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporthemuon extends Model
{
	public function getListtm()
	{
		return $listThemuon = Themuon::all()->toArray();
	}

	public function getSinhvien($sinhvien)
	{
		return $nameSinhvien = Sinhvien::find($sinhvien->getID())->toArray();
	}

	public function getListsach()
	{
		return $listSach = Sach::all()->toArray();
	}

	public function getListsinhvien()
	{
		return $listSinhvien = Sinhvien::all()->toArray();
	}

	public function getThemuon($themuon)
	{
		return $themuon = Themuon::find($themuon->getId())->toArray();
	}

	public function addThe($themuon)
	{
		$themuons = new Themuon();
		$themuons->id_sinhvien = $themuon->getIdsinhvien();
		$themuons->borrow_date = $themuon->getNgaymuon();
		$themuons->pay_date = $themuon->getNgaytra();
		$themuons->state = $themuon->getTrangthai();
		$themuons->save();
		foreach ($themuon->getSach() as $value) {
			$sachVsthes = new Sachvsthe();
			$sachVsthes->id_the = $themuons->id;
			$sachVsthes->id_sach = $value;
			$sachVsthes->save();
		}
		return $themuons->id;
	}

	public function updateThe($themuon)
	{
		$themuons = Themuon::find($themuon->getId());
		$themuons->borrow_date = $themuon->getNgaymuon();
		$themuons->pay_date = $themuon->getNgaytra();
		$themuons->state = $themuon->getTrangthai();
		return $themuons->save();
	}

	public function deleteThemuon($themuon)
	{
		return $themuon = Themuon::where('id', $themuon->getId())->delete();
	}
}
