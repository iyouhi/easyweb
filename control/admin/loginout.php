<?php
include_once (SLC_ROOT . 'control/Base.php');
class LoginOut extends Base{
	var $need_login = 0;	
	public function checkPara(){
		return true;
	}
	public function action(){
		$mLogin = Factory::create("model::mLogin");
		$mLogin->loginOut();
		header("Location:/admin/login.php");
		return true;
	}
}
new LoginOut();
?>