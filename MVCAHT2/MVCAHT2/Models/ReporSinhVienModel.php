<?php

class ReporSinhVienModel
{

	protected $_cnn;
	const table_name = 'tb_sinhvien';
	const table_the = 'tb_themuon';
	const table_trunggian = 'tb_trunggian';
	const table_sach = 'tb_sach';

	public function __construct()
	{
		$this->_cnn = new ConectionModel();
	}

	public function getListsv()
	{
		return $this->_cnn->xemDanhsach(self::table_name);
	}

	public function addSv($sinhvien)
	{
		$mang = array();
		$mang['name'] = $sinhvien->getName();
		$mang['birthday'] = $sinhvien->getBirthday();
		$mang['age'] = $sinhvien->getAge();
		$mang['class'] = $sinhvien->getClass();
		return $this->_cnn->add(self::table_name, $mang);

	}

	public function getRowsv($idsinhvien)
	{
		return $this->_cnn->xemChitiet(self::table_name, $idsinhvien->getId());
	}

	public function updateSv($sinhvien)
	{
		$mang = array();
		$mang['name'] = $sinhvien->getName();
		$mang['birthday'] = $sinhvien->getBirthday();
		$mang['age'] = $sinhvien->getAge();
		$mang['class'] = $sinhvien->getClass();
		return $this->_cnn->update($mang, $sinhvien->getId(), self::table_name);
	}

	public function deleteSv($idsinhvien)
	{
		return $this->_cnn->delete(self::table_name, $idsinhvien->getId());
	}


	public function getListthe($idsinhvien)
	{
		return $this->_cnn->getListrow(self::table_the, $idsinhvien->getId());
	}

	public function getListsach($id)
	{
		return $this->_cnn->getListrow1(self::table_trunggian, $id, self::table_sach);
	}

	public function namesach($idsinhvien)
	{
		return $this->_cnn->xemChitiet(self::table_sach, $idsinhvien->getId());
	}

	public function countSach($idsinhvien)
	{
		return $this->_cnn->countRow(self::table_trunggian, $idsinhvien->getId());
	}

	public function countSachstate($idsinhvien, $state)
	{
		return $this->_cnn->countRowstate(self::table_trunggian, $idsinhvien->getId(), $state);
	}


}