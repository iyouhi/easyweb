<?php
include_once SLC_ROOT . 'data/dBase.php';
class dGroup extends dBase{
	/*
	*添加分组
	*/
	public function addGroup($group){
		$sql1 = $sql2 = $s = '';
		foreach($group as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `user_group` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;		
	}
	/*
	*修改分组
	*/
	public function editGroup($gid, $group, $power){
		$sqlstr = $s = '';
		foreach($group as $key=>$value)
		{
			$sqlstr .= $s.$key."='" . $value . "'";
			$s = ',';
		}
		if(!empty($power)){
			$sqlstr .= $s. "`power`='$power'";	
		}
		$sql="UPDATE `user_group` SET $sqlstr WHERE gid = $gid";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;		
	}
	/*
	*删除分组
	*/
	public function delGroup($gid){
		$sql = "DELETE FROM `user_group` WHERE `gid`='$gid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*获取分组列表
	*/
	public function getGroupList() {
		$sql = "SELECT * FROM `user_group` ORDER BY `gid`";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*根据组id获取组信息
	*/
	public function getGroupByGids($gids) {
		if(!is_array($gids)) return false;
		$qstr = join(",", $gids);
		$sql = "SELECT * FROM `user_group` WHERE `gid` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}
}
?>