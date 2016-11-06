<?php
class mGroup{
	private $dGroup;
	public function __construct() {
		$this->dGroup = Factory::create("data::dGroup");
	}
	/*
	*添加用户分组
	*/
	public function addGroup($group) {
		if(!is_array($group))return false;		
		$re = $this->dGroup->addGroup($group);
		return $re;
	}
	/*
	*修改用户分组
	*/
	public function editGroup($gid, $group, $power=array()) {
		if(!is_array($group))return false;		
		$power = join(',', $power);
		$re = $this->dGroup->editGroup($gid, $group, $power);
		return $re;
	}
	/*
	*删除用户分组
	*/
	public function delGroup($gid) {		
		$re = $this->dGroup->delGroup($gid);
		return $re;
	}
	/*
	*获取分组信息
	*/
	public function getGroupList() {		
		$groupList = $this->dGroup->getGroupList();
		$re = array();
		foreach($groupList as $v){
			$re[$v['gid']] = $v;
		}
		return $re;
	}
	/*
	*根据组id获取组信息
	*/
	public function getGroupByGids($gids) {
		if(!is_array($gids))$gids = array($gids);
		$groupList = $this->dGroup->getGroupByGids($gids);
		$re = array();
		foreach($groupList as $v){
			$re[$v['gid']] = $v;
		}
		return $re;
	}
}
?>