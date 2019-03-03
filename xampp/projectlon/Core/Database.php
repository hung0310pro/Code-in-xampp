<?php
class Database{
	private $conn =null;
	public function getConn(){
		if($this->conn == null ){
			// làm công việc gọi kết nối csdl

			$this->OpenConn();
		}
		return $this->conn;
	}

	private function OpenConn(){
        $conn = mysqli_connect('localhost','root','') or die("Loi ket noi CSDL");
        mysqli_select_db($conn,'projectcuoimvc') or die('Loi select DB');
        mysqli_set_charset($conn, 'utf8');
        $this->conn = $conn;
    }

	protected function ExecQuerySelect($sql){
		$conn = $this->getConn();

		$res = mysqli_query($conn, $sql);
		if(mysqli_errno($conn) !=0)
			return 'Error query: '. mysqli_error($conn);

		$dataRes = array();
		while($row = mysqli_fetch_assoc($res)){
			$dataRes[] = $row;
		}
         mysqli_free_result($res);
		return $dataRes; 
	}

	protected function Query_Get_Row1($sql){
        $conn = $this->getConn();
        $res = mysqli_query($conn, $sql);
        $dataRes = array();
        if(mysqli_errno($conn) !=0) {
            return 'Error query: ' . mysqli_error($conn);
        }
        if(mysqli_num_rows($res) > 0){
            $dataRes = mysqli_fetch_assoc($res);
        }
         mysqli_free_result($res);
        return $dataRes;
    }

    protected function Delete_Query($sql){
        $conn = $this->getConn();
        $res = mysqli_query($conn,$sql);
        if(mysqli_errno($conn) != ""){
            return "Error query".mysqli_error($conn);
        }

        return $res;
    }

	protected function Add_Query($sql){
        $conn = $this->getConn();
        $res = mysqli_query($conn,$sql);
        if(mysqli_errno($conn) != ""){
            return "Error query".mysqli_error($conn);
        }
        $new_id = mysqli_insert_id($conn);

        return $new_id;
    }

    protected  function ExcQuery($sql){
	    $conn = $this->getConn();
        $res = mysqli_query($conn,$sql);
        if(mysqli_errno($conn) != ""){
            return "Error query".mysqli_error($conn);
        }
  
        return $res;
    }

	public function __destruct(){
		if($this->conn != null)
			mysqli_close($this->conn);
	}
}

