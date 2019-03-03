<?php

class ConectionModel extends Database
{
	protected $namecolum1 = 'id_sinhvien';
	protected $namecolum2 = 'id_the';

	public function xemDanhsach($table) //danhsach
	{
		$sql = "select * from " . $table;
		return parent::ExecQuerySelect($sql);
	}

	public function xemchitiet($table, $id) // xemchitiet
	{
		$sql = "select * from " . $table . " where id = '" . $id . "'";
		return parent::Query_Get_Row1($sql);
	}

	public function add($table, $param)
	{
		$field_list = '';
		$value_list = '';
		foreach ($param as $key => $value) {
			$field_list .= ",$key";
			$value_list .= ",'" . $value . "'";
		}
		$sql = "INSERT INTO " . $table . "(" . trim($field_list, ",") . ") VALUES (" . trim($value_list, ",") . ")";

		return parent::Add_Query($sql);
	}

	public function update($param, $id, $table)
	{
		$sql = '';
		foreach ($param as $key => $value) {
			$sql .= "$key = '" . trim($value) . "',";
		}
		$sql = "UPDATE " . $table . " SET " . trim($sql, ",") . " WHERE id = " . $id;
		return parent::ExcQuery($sql);
	}

	public function delete($table, $id)
	{
		$sql = "delete from " . $table . " where id = '" . $id . "'";
		return parent::Delete_Query($sql);
	}

	public function countRow($table, $id)
	{
		$sql = "select count(*) as soluong from " . $table . " join tb_themuon on tb_themuon.id = tb_trunggian.id_the join tb_sinhvien on tb_sinhvien.id = tb_themuon.id_sinhvien where tb_themuon.id_sinhvien = " . $id;
		return parent::Query_Get_Row1($sql);
	}

	public function countRowstate($table, $id, $state)
	{
		$sql = "select count(*) as soluong from " . $table . " join tb_themuon on tb_themuon.id = tb_trunggian.id_the join tb_sinhvien on tb_sinhvien.id = tb_themuon.id_sinhvien where tb_themuon.id_sinhvien = '" . $id . "' and state = " . $state;
		return parent::Query_Get_Row1($sql);
	}

	public function getListrow($table, $id) //listrow
	{
		$sql = "select * from " . $table . " where " . $this->namecolum1 . " = " . $id;
		return parent::ExecQuerySelect($sql);
	}

	public function getListrow1($table, $id, $table2) //listrow1
	{
		$sql = "select * from " . $table . " left join " . $table2 . " on " . $table . ".id_sach = " . $table2 . ".id where " . $this->namecolum2 . " = " . $id;
		return parent::ExecQuerySelect($sql);
	}

}