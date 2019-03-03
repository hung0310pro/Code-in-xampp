<?php

class ReporSachModel
{
	protected $cnnmodel;
	protected $sachmodel;
	const tb_name = 'tb_sach';

	public function __construct()
	{
		$this->cnnmodel = new ConectionModel();
		$this->sachmodel = new SachModel();
	}

	public function getListbook()
	{
		return $this->cnnmodel->xemDanhsach(self::tb_name);
	}

	/* hàm trả về 1 đối tượng sách
	 * input là id của sách
	 * output là đối tượng sách
	 *
	 * */
	public function getSach($idsach)
	{
		return $this->cnnmodel->xemChitiet(self::tb_name, $idsach->getId());
	}

	public function updateBook($sach)
	{
		$mang = array();
		$mang['namebook'] = $sach->getNamebook();
		$mang['author'] = $sach->getAuthor();
		$mang['p_year'] = $sach->getPyear();
		return $this->cnnmodel->update($mang, $sach->getId(), self::tb_name);
	}

	public function themSach($sach)
	{
		$mang = array();
		$mang['namebook'] = $sach->getNamebook();
		$mang['author'] = $sach->getAuthor();
		$mang['p_year'] = $sach->getPyear();
		$addsach = $this->cnnmodel->add(self::tb_name, $mang);
		return $addsach;
	}

	public function deleteBook($idsach)
	{
		return $this->cnnmodel->delete(self::tb_name, $idsach->getId());
	}
}