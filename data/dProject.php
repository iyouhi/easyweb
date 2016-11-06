<?php
include_once SLC_ROOT . 'data/dBase.php';
class dProject extends dBase{
	/**
	 * 
	 * 获取用户项目列表
	 * @param unknown_type $uid
	 * @param unknown_type $start
	 * @param unknown_type $offset
	 */
	public function getProjectListByUid($uid, $start=0,$offset=10) {
		$sql = "SELECT * FROM `project` WHERE `uid` = '$uid' ORDER BY `pid` LIMIT $start, $offset";
		$re = $this->getData($sql);
		return $re;
	}
	/**
	*获取用户项目总数
	*/
	public function getProjectTotalNumByUid($uid){
		$sql = "SELECT COUNT(*) FROM `project` WHERE `uid`='$uid'";
		$re = $this->db->result_first($sql);
		return intval($re);
	}
	/**
	 * 
	 * 根据pid获取项目
	 * @param array $pids
	 */
	public function getProjectByPids($pids) {
		if(!is_array($pids)) return false;
		$qstr = join(",", $pids);
		$sql = "SELECT * FROM `project` WHERE `pid` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}
	/**
	 * 
	 * 根据domain获取项目
	 * @param string $domain
	 */
	public function getProjectByDomain($domain) {
		if(empty($domain)) return false;
		$sql = "SELECT * FROM `project` WHERE `domain` = '$domain'";
		$re = $this->db->fetch_first($sql);
		return $re;
	}
	/*
	*删除项目
	*/
	public function delProject($pid){
		$sql = "DELETE FROM `project` WHERE `pid`='$pid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*添加项目
	*/
	public function addProject($project){
		$sql1 = $sql2 = $s = '';
		foreach($project as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `project` ($sql1) VALUES ($sql2)";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return $this->db->insert_id();
	}
	
	/*
	*修改项目
	*/
	public function editProject($pid, $project){
		$sqlstr = $s = '';
		foreach($project as $key=>$value)
		{
			$sqlstr .= $s.$key."='".$value."'";
			$s = ',';
		}
		$sql="UPDATE `project` SET $sqlstr WHERE pid = $pid";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;
	}
}
?>