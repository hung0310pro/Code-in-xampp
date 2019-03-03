<?php

class SachModel
{
	protected $_namebook;
	protected $_author;
	protected $_p_year;
	protected $id;

	public function setNamebook($namebook)
	{
		$this->_namebook = $namebook;
	}

	public function getNamebook()
	{
		return $this->_namebook;
	}

	public function setAuthor($author)
	{
		$this->_author = $author;
	}

	public function getAuthor()
	{
		return $this->_author;
	}

	public function setPyear($p_year)
	{
		$this->_p_year = $p_year;
	}

	public function getPyear()
	{
		return $this->_p_year;
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