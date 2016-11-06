<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Intro extends Base {
	public function checkPara() {
		phpinfo();exit;
		return true;
	}
	public function action() {		
		$odb_conn=mssql_connect('114.251.25.34:2433','dggnjc','njqsicdgg123');
		mssql_select_db('dbtest',$odb_conn);
		$query="select code,gold,name,zhil,peij from au_goldplsj where code='0105-1000001-010003'";
		$odb_comm=mssql_query($query);
		$odb_row_num=mssql_num_rows($odb_comm);
		for($i=0;$i<$odb_row_num;$i++)
		{
			$row=mssql_fetch_array($odb_comm);
			var_dump($row);
		}
		return true;
	}
}
new Intro ();
?>