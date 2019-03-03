<?php

class SinhVienModel
{
	protected $_name;
	protected $_birthday;
	protected $_age;
	protected $_class;
	protected $id;

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function setBirthday($birthday)
	{
		$this->_birthday = $birthday;
	}

	public function getBirthday()
	{
		return $this->_birthday;
	}

	public function setAge($age)
	{
		$this->_age = $age;
	}

	public function getAge()
	{
		return $this->_age;
	}

	public function setClass($class)
	{
		$this->_class = $class;
	}

	public function getClass()
	{
		return $this->_class;
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