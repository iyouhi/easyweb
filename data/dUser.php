<?php
include_once SLC_ROOT . 'data/dBase.php';
class dUser extends dBase{
	/*
	*获取用户列表
	*/
	public function getUserList() {
		$sql = "SELECT * FROM `user` ORDER BY `uid`";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*根据用户名获取用户id
	*/
	public function getUidByName($name) {
		$sql = "SELECT uid FROM `user` WHERE `name` ='{$name}'";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*根据id获取用户信息
	*/
	public function getUserInfoByUid($uids) {
		$str = implode(",",$uids);
		$sql = "SELECT * FROM `user` WHERE `uid` in ({$str})";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*修改用户密码
	*/
	public function changePasswd($uid, $newpasswd) {
		$sql = "UPDATE `user` SET `password` = '$newpasswd' WHERE `uid`= '$uid'";
		$st = $this->db->query($sql);
		return $st;
	}
	/*
	*添加用户
	*/
	public function addUser($user){
		$sql1 = $sql2 = $s = '';
		foreach($user as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `user` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;		
	}
	/*
	*修改用户
	*/
	public function editUser($uid, $userinfo){
		$sqlstr = $s = '';
		foreach($userinfo as $key=>$value)
		{
			$sqlstr .= $s.$key."='" . $value . "'";
			$s = ',';
		}
		$sql="UPDATE `user` SET $sqlstr WHERE uid = $uid";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;		
	}
	/*
	*删除分组
	*/
	public function delUser($uid){
		$sql = "DELETE FROM `user` WHERE `uid`='$uid'";
		$re = $this->db->query($sql);
		return $re;
	}
}
?>