<?php
include_once (SLC_ROOT . 'control/Base.php');
class Login extends Base{
	var $need_login = 0;	
	public function checkPara(){
		$this->para['username'] = $this->gpc->PostString('username');
		$this->para['password'] = $this->gpc->PostString('password');
		$this->para['vcode'] = $this->gpc->PostString('vcode');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		return true;
	}
	public function action(){
		$this->output['msg'] = "";
		$mLogin = Factory::create("model::mLogin");
		if($this->para['issubmit']){
			if(empty($this->para['vcode'])){
				$this->output['msg'] = '请输入验证码';
				return false;
			}
			if(empty($this->para['username']) || empty($this->para['password'])){
				$this->output['msg'] = '请输入用户名和密码';
				return false;
			}
			$vCode = Factory::create("tools::VCode");
			$vCodeRes = $vCode->checkVCode($this->para['vcode']);
			if(!$vCodeRes){
				$this->output['msg'] = '验证码验证失败。';
				return false;
			}
			$re = $mLogin->Login($this->para['username'], $this->para['password']);
			if($re == true){
				header("content-type:text/html; charset=utf-8");
				header("Location:" . BASE_DOMAIN . "admin/index.php");
				exit;
			}else{
				$this->output['msg'] = "用户名或密码错误，登录失败！";
				return false;
			}
		}else{
			$this->para['cUserInfo'] = $mLogin->isLogined();
			if($this->para['cUserInfo'] !== false){
				header("content-type:text/html; charset=utf-8");
				header("Location:" . BASE_DOMAIN . "admin/index.php");
				exit;
			}
		}
		return true;
	}
}
new Login('admin/login.html','smarty');
?>
