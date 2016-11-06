<?php
class dBase{
	public $db;
	public function __construct() {
		$this->db = $this->connectDb(DBHOST, DBUSER, DBPWD, DBNAME, DBCHARSET, DBPCONNECT);
	}
	/*
	*连接数据库
	*/
	public function connectDb($DBHOST, $DBUSER, $DBPWD, $DBNAME, $DBCHARSET, $DBPCONNECT){
		$db = Factory::create("tools::database::Db");
		$db->connect($DBHOST, $DBUSER, $DBPWD, $DBNAME, $DBCHARSET, $DBPCONNECT);
		$db->query("set names " . DBCHARSET);
		return $db;
	}
	/*
	*读数据库
	*/
	public function getData($sql){
		$st = $this->db->query($sql);
		$re = array();
		while ($row = $this->db->fetch_array($st)) {
            $re[] = $row; 
        }
		return $re;
	}

}
?>
