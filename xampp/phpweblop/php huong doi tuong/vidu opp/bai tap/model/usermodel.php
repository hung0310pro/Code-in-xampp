<?php
class usermodel extends database{
	public function loadlist(){
		$sql = "select * from san_pham";
		return $this->execquery($sql);
	}
}