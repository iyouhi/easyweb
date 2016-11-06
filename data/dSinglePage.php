<?php
include_once SLC_ROOT . 'data/dBase.php';
class dSinglePage extends dBase{
	/*
	*获取单页面列表
	*/
	public function getSinglePageList($start=0,$offset=10) {
		$sql = "SELECT * FROM `singlepage` ORDER BY `id` LIMIT $start, $offset";
		$re = $this->getData($sql);
		return $re;
	}
	
	/*
	*获取单页面总数
	*/
	public function getSinglePageTotalNum(){
		$sql = "SELECT COUNT(*) FROM `singlepage`";
		$re = $this->db->result_first($sql);
		return intval($re);
	}

	/*
	*根据id获取单页面
	*/
	public function getSinglePageByIds($ids) {
		if(!is_array($ids)) return false;
		$qstr = join(",", $ids);
		$sql = "SELECT * FROM `singlepage` WHERE `id` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}

	public function addSinglePage($singlepage){
		$sql1 = $sql2 = $s = '';
		foreach($singlepage as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `singlepage` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;
	}
	/*
	*修改单页面
	*/
	public function editSinglePage($id, $singlepage){
		$sqlstr = $s = '';
		foreach($singlepage as $key=>$value)
		{
			$sqlstr .= $s.$key."='".$value."'";
			$s = ',';
		}
		$sql="UPDATE `singlepage` SET $sqlstr WHERE id = $id";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;
	}
	/*
	*删除单页面
	*/
	public function delSinglePage($id){
		$sql = "DELETE FROM `singlepage` WHERE `id`='$id'";
		$re = $this->db->query($sql);
		return $re;
	}
}
?>