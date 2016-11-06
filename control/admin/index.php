<?php
include_once (SLC_ROOT . 'control/Base.php');
class Index extends Base{
	public function checkPara(){
		return true;
	}
	public function action(){
		return true;
	}
}
new Index('admin/index.html','smarty');
?>
