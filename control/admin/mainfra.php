<?php
include_once (SLC_ROOT . 'control/Base.php');
class Mainfra extends Base{
	public function checkPara(){
		return true;
	}
	public function action(){

		return true;
	}
}
new Mainfra('admin/mainfra.html','smarty');
?>
