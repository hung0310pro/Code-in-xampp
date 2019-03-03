<?php

class TheMuonModel
{
	protected $_idsinhvien;
	protected $_borrowdate;
	protected $_paydate;
	protected $_state;
	protected $id;

	public function setIdsinhvien($idsinhvien)
	{
		$this->_idsinhvien = $idsinhvien;
	}

	public function getIdsinhvien()
	{
		return $this->_idsinhvien;
	}

	public function setBorrowdate($borrowdate)
	{
		$this->_borrowdate = $borrowdate;
	}

	public function getBorrowdate()
	{
		return $this->_borrowdate;
	}

	public function setPaydate($paydate)
	{
		$this->_paydate = $paydate;
	}

	public function getPaydate()
	{
		return $this->_paydate;
	}

	public function setState($state)
	{
		$this->_state = $state;
	}

	public function getState()
	{
		return $this->_state;
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