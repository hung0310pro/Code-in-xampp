<?php

class ReporTheMuonModel
{
	protected $ktcnn;
	const bangsinhvien = 'tb_sinhvien';
	const bangsach = 'tb_sach';
	const bangthemuon = 'tb_themuon';
	const bangtrunggian = 'tb_trunggian';

	public function __construct()
	{
		$this->ktcnn = new ConectionModel();
	}

	public function getListsinhvien()
	{
		return $this->ktcnn->xemDanhsach(self::bangsinhvien);
	}

	public function getListsach()
	{
		return $this->ktcnn->xemDanhsach(self::bangsach);
	}

	public function getRowsinhvien($id)
	{
		return $this->ktcnn->xemchitiet(self::bangsinhvien, $id);
	}


	public function getListmuons()
	{
		return $this->ktcnn->xemDanhsach(self::bangthemuon);
	}

	public function getRowmuon($idtm)
	{
		return $this->ktcnn->xemChitiet(self::bangthemuon, $idtm->getId());
	}

	public function updateMuons($muon)
	{
		$mang = [];
		$mang['borrow_date'] = $muon->getBorrowdate();
		$mang['pay_date'] = $muon->getPaydate();
		$mang['state'] = $muon->getState();
		return $this->ktcnn->update($mang, $muon->getId(), self::bangthemuon);
	}

	public function deleteMuons($idtm)
	{
		return $this->ktcnn->delete(self::bangthemuon, $idtm->getId());
	}

	public function addMuons($muon, $mang)
	{
		$mang1 = array();
		$mang1['id_sinhvien'] = $muon->getIdsinhvien();
		$mang1['borrow_date'] = $muon->getBorrowdate();
		$mang1['pay_date'] = $muon->getPaydate();
		$mang1['state'] = 1;
		$add1 = $this->ktcnn->add(self::bangthemuon, $mang1);
		foreach ($mang as $value) {
			$mang2 = array(
				"id_the" => $add1,
				"id_sach" => $value,
			);
			$this->ktcnn->add(self::bangtrunggian, $mang2);
		}
		return $add1;
	}


}