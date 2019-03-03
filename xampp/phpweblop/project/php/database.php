<?php
class database
{
private $conn;
function connect()
{
   if(!$this->conn)
   { 
      $this->conn = mysqli_connect("localhost","root","","project") or die("bạn kết nối vs cơ sở dữ liệu thất bại");
      mysqli_query($this->conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
   }
}

function disconnect()
{
	if($this->conn)
	{
		mysqli_close($this->conn);
	}
}

function get_list($sql)
{
	$this->connect();
	$result = mysqli_query($this->conn,$sql);
	if(!$result)
	{
		die("câu truy vấn bị sai");
	}
	$data = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$data[] = $row;
	}
	return $data;
}

function get_row($sql)
{
	$this->connect();
	$result = mysqli_query($this->conn,$sql);
	if(!$result)
	{
		die("câu truy vấn bị sai");
	}
	if(mysqli_num_rows($result) > 0)
	{
		$data = mysqli_fetch_assoc($result);
	}
	mysqli_free_result($result);
	return $data;
}

function insert($table,$data)
{
	$this->connect();
	$feil_key = "";
    $feil_value = "";
    foreach ($data as $key => $value) {
    	 $feil_key .= ",$key"; 
    	 $feil_value .= ",'".mysql_escape_string($value)."'"; 
    }
    $sql = "INSERT INTO ".$table. "(".trim($feil_key, ",").") VALUES (".trim($feil_value, ",").")";
	return mysqli_query($this->conn,$sql);
}
function show_error($loi, $key){
	$this->connect();
    echo '<span style="color: red">'.(empty($loi[$key]) ? "" : $loi[$key]). '</span>';
}
}
?>