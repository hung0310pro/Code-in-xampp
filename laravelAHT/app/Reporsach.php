<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reporsach extends Model
{
	const NAME_TABLE = 'tb_sach';

	public function getListsach()
	{
		return $listSach = Sach::all()->toArray();
	}

	public function addSach($sach)
	{
		$sachs = new Sach();
		$sachs->namebook = $sach->getTensach();
		$sachs->author = $sach->getTacgia();
		$sachs->p_year = $sach->getNamsx();
		return $sachs->save();
	}

	public function getSach($sach)
	{
		return Sach::find($sach->getId())->toArray();

	}

	public function updateSach($sach)
	{
		$sachs = Sach::find($sach->getId());
		$sachs->namebook = $sach->getTensach();
		$sachs->author = $sach->getTacgia();
		$sachs->p_year = $sach->getNamsx();
		return $sachs->save();
	}

	public function deleteSach($sach)
	{
		return $sach = Sach::where('id', $sach->getId())->delete();
	}
}
