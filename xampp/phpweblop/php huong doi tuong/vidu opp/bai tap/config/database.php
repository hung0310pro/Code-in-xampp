<?php
class database{
	private $conn;
	public function getconn(){
		if($this->conn == null){
			$conn = mysqli_connect('localhost', 'root', '', 'projectmvc') 
	                or die ('Không thể kết nối CSDL');
	        mysqli_set_charset($conn, 'UTF8');
	        $this->conn = $conn;
		}
		return $this->conn;
	} 

	public function __destruct(){
		if($this->conn != null){
			mysqli_close($this->conn);
		}
	}

	protected function execquery($sql){
	$conn = $this->getconn();
	$res = mysqli_query($conn,$sql);
    if(mysqli_error($conn) != 0 )
    {
    	return "Error query".mysqli_error($this->conn);
    }
    $datares = array();
    while($row = mysqli_fetch_assoc($res)){
    	$obj = new stdClass(); // lớp stdclass là 1 lớp đc có sẵn trong php bình thường cho chỉ là 1 lớp rỗng
    	foreach ($row as $field_name => $field_value){
    		$obj->$field_name = $field_value;
    	}
    	$datares[] = $obj; 
    }
    return $datares;
	} 
}