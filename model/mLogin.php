<?php
class mLogin{
	public $msg;
	/*
	*判断用户是否登陆
	*/
	public function isLogined($alias='admin') {
		if(isset($_SESSION[$alias])){
			$info = $_SESSION[$alias];
			if($info['uid'] && $info['name'] != ''){
				return $info;	
			}
		}
		return false;
	}

	/*
	*获取当前登陆用户信息
	*/
	public function getCurrentUser($alias){
		if(isset($_SESSION[$alias])){
			$info = $_SESSION[$alias];
			if($info['uid'] && $info['name'] != ''){
				return $info;	
			}
		}
		return false;
	}

	/*
	*用户登陆
	*$username	string 用户名
	*$password	string	密码
	*/
	public function login($username, $password, $alias='admin'){
		$mUser = Factory::create("model::mUser");
		$uid = $mUser->getUidByname($username);
		if($uid === false) {
			$this->msg = "user_not_exist";
			return false;
		}
		$userInfo = $mUser->getUserInfoByUid(array($uid));
		$user = $userInfo[$uid];
		$md5_password = $this->password($password);
		//$md5_password = "";
		if($user['password'] !== $md5_password){
			$this->msg = "password_not_right";
			return false;
		}
		$power = self::getGroupPower($user['gid']);
		$user['power'] = $power;
		$_SESSION[$alias] = $user;

		return true;
	}
	public static function getGroupPower($gid){
		$mGroup = Factory::create("model::mGroup");
		$groupInfo = $mGroup->getGroupByGids($gid);
		return $groupInfo[$gid]['power'];
	}
	/*
	*退出登陆
	*/
	public function loginOut($alias='admin'){
		unset($_SESSION[$alias]);
		unset($_SESSION['cProject']);
		return true;
	}
	/*
	*密码md5加密
	*/
	public function password($password){
		return md5(PASSWORD_KEY . $password);
	}

	public static function checkPower($sysid){
		if(!isset($_SESSION['admin'])){
			showmessage("请先登录", BASE_DOMAIN . "admin/login.php");
		}
		if($_SESSION['admin']['uid'] === '1'){
			return true;
		}
		if(empty($_SESSION['admin']['power'])){
			exit("不许动");
		}
		$power = explode(',', $_SESSION['admin']['power']);
		if(!in_array($sysid, $power)){
			return false;
		}
		return true;
	}
}
?>
