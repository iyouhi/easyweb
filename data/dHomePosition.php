<?php
include_once SLC_ROOT . 'data/dBase.php';
class dHomePosition extends dBase{
	/**
	*获取推荐列表
	*/
	public function getHomePositionList() {
		$sql = "SELECT * FROM `home_position` WHERE `pid`={$GLOBALS['cProject']['pid']} ORDER BY `position_id` ";
		$re = $this->getData($sql);
		return $re;
	}

	/*
	*根据id获取推荐
	*/
	public function getHomePositionByIds($ids) {
		if(!is_array($ids)) return false;

		$qstr = join(",", $ids);
		$sql = "SELECT * FROM `home_position` WHERE `position_id` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}

	public function addHomePosition($home_position){
		if (!isset($home_position['pid'])){
			$home_position['pid'] = $GLOBALS['cProject']['pid'];
		}
		$sql1 = $sql2 = $s = '';
		foreach($home_position as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `home_position` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;
	}
	/*
	*修改推荐
	*/
	public function editHomePosition($id, $home_position){
		$sqlstr = $s = '';
		foreach($home_position as $key=>$value)
		{
			$sqlstr .= $s.$key."='".$value."'";
			$s = ',';
		}
		$sql="UPDATE `home_position` SET $sqlstr WHERE `position_id` = $id";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;
	}
	/*
	*删除推荐
	*/
	public function delHomePosition($id){
		$sql = "DELETE FROM `home_position` WHERE `position_id`='$id'";
		$re = $this->db->query($sql);
		return $re;
	}
}
?>