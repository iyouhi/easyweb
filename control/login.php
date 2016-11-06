<?php
include_once(dirname(__FILE__) . '/Base.php');
class Login extends Base{	
	public function checkPara(){
		$this->para['username'] = $this->gpc->PostString('username');
		$this->para['password'] = $this->gpc->PostString('password');
		$this->para['vcode'] = $this->gpc->PostString('vcode');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		return true;
	}
	public function action(){
		$mLogin = Factory::create("model::mLogin");
		if($this->para['issubmit']){
			if(empty($this->para['vcode'])){
				showmessage('请输入验证码');
				return false;
			}
			if(empty($this->para['username']) || empty($this->para['password'])){
				showmessage('请输入用户名和密码');
				return false;
			}
			$vCode = Factory::create("tools::VCode");
			$vCodeRes = $vCode->checkVCode($this->para['vcode']);
			if(!$vCodeRes){
				showmessage('验证码验证失败。');
				return false;
			}
			$re = $mLogin->Login($this->para['username'], $this->para['password'], "fguser");
			if($re == true){
				header("content-type:text/html; charset=utf-8");
				header("Location:" . BASE_DOMAIN . "committee/comitelist.php?cid=7");
				exit;
			}else{
				showmessage("登陆失败");
				return false;
			}
		}else{
			header("content-type:text/html; charset=utf-8");
			header("Location:" . BASE_DOMAIN . "index.php");
			exit;
		}
		return true;
	}
}
new Login();
?>
