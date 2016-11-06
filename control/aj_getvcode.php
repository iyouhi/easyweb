<?php
include_once(dirname(__FILE__) . '/Base.php');
class GetVCode extends Base{
	var $need_login = 0;
	public function checkPara(){
		return true;
	}
	public function action(){
		$vCode = Factory::create("tools::VCode");
		$vCode->createVCode(true);
		return true;
	}
}
new GetVCode();
?>
