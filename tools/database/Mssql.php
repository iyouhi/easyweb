<?php
class Mssql {
	var $querynum = 0;
	var $link;
	var $histories;

	var $dbhost;
	var $dbuser;
	var $dbpw;

	var $pconnect;
	var $tablepre;
	var $time;

	var $goneaway = 5;

	function connect($dbhost, $dbuser, $dbpw, $dbname = '', $pconnect = 0, $tablepre='', $time = 0) {
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpw = $dbpw;
		$this->dbname = $dbname;
		$this->pconnect = $pconnect;
		$this->tablepre = $tablepre;
		$this->time = $time;

		if($pconnect) {
			if(!$this->link = mssql_pconnect($dbhost, $dbuser, $dbpw)) {
				die('Can not connect to MSSQL server');
			}
		} else {
			if(!$this->link = mssql_connect($dbhost, $dbuser, $dbpw)) {
				die('Can not connect to MySQL server');
			}
		}

		if($dbname) {
			mssql_select_db($dbname, $this->link);
		}

	}

	function fetch_array($query) {
		return mssql_fetch_array($query);
	}

	function query($sql) {
		$query = mssql_query($sql);
		return $query;
	}

	
	
	
	function result($query, $row) {
		$query = @mssql_result($query, $row);
		return $query;
	}

	function num_rows($query) {
		$query = mssql_num_rows($query);
		return $query;
	}

	function num_fields($query) {
		return mssql_num_fields($query);
	}

	function free_result($query) {
		return mssql_free_result($query);
	}

	function fetch_row($query) {
		$query = mssql_fetch_row($query);
		return $query;
	}

	function fetch_fields($query) {
		return mssql_fetch_field($query);
	}

	function close() {
		return mssql_close($this->link);
	}

}

?>