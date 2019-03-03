<?php
/**
 * Created by MRS.
 * User: sonmobi@gmail.com
 * Date: 6/23/2018
 * Time: 18:17
 */
//$config = array(.....);
class LopA{
    const IP ='192.168.1.1';
    public $pc_name = 'may01';
    private $host = 'localhost';
    private $user_db = 'root';
    private $pass_db = '12345';
    public function getConn(){
        global $config;
    }
    public function getIP(){
        return "IP = ". self::IP;
    }
}

$pc = new LopA();
    echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
            print_r($pc);
    echo '</pre>';
// In địa chỉ IP của đối tượng $pc
//echo $pc::IP;
//echo $pc->getIP();
//echo LopA::IP;