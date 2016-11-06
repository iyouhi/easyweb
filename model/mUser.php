<?php
class mUser{
	private $dUser;
	public function __construct() {
		$this->dUser = Factory::create("data::dUser");
	}
	/*
	*获取用户列表
	*/
	public function getUserList() {
		$userList = $this->dUser->getUserList();
		return $userList;
	}
	/*
	*根据用户名获取用户id
	*/
	public function getUidByName($name) {
		$userList = $this->dUser->getUidByName($name);
		if(empty($userList))return false;
		$uid = $userList[0]['uid'];
		return $uid;
	}
	/*
	*根据用户id获取用户信息
	*/
	public function getUserInfoByUid($uids) {
		if(!is_array($uids)) $uids = array($uids);		
		$userList = $this->dUser->getUserInfoByUid($uids);
		$userinfo = array();
		foreach($userList as $v){
			$userinfo[$v['uid']] = $v;
		}
		return $userinfo;
	}
	/*
	*修改用户密码
	*/
	public function changePasswd($uid, $oldpasswd, $newpasswd) {
		$mLogin = Factory::create("model::mLogin");		
		$userInfo = $this->getUserInfoByUid($uid);
		if($mLogin->password($oldpasswd) !== $userInfo[$uid]['password']){
			return 'E0001';
		}
		$newpasswd = $mLogin->password($newpasswd);
		$re = $this->dUser->changePasswd($uid, $newpasswd);
		return $re;
	}
	/*
	*添加用户
	*/
	public function addUser($user) {
		if(!is_array($user))return false;	
		if(!isset($user['password'])){				//初始密码与用户名相同
			$mLogin = Factory::create("model::mLogin");	
			$user['password'] = $mLogin->password($user['name']);
		}
		$re = $this->dUser->addUser($user);
		return $re;
	}
	/*
	*修改用户
	*/
	public function editUser($uid, $userinfo) {
		if(!is_array($userinfo))return false;		
		$re = $this->dUser->editUser($uid, $userinfo);
		return $re;
	}
	/*
	*删除用户
	*/
	public function delUser($uid) {		
		$re = $this->dUser->delUser($uid);
		return $re;
	}
}
?>
