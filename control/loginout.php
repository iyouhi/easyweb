<?php
include_once(dirname(__FILE__) . '/Base.php');
class LoginOut extends Base{
	public function checkPara(){
		return true;
	}
	public function action(){
		$mLogin = Factory::create("model::mLogin");
		$mLogin->loginOut('fguser');
		header("Location:/index.php");
		return true;
	}
}
new LoginOut();
?>
