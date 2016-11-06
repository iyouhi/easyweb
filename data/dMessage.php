<?php
include_once SLC_ROOT . 'data/dBase.php';
class dMessage extends dBase{
	/*
	*获取消息列表
	*/
	public function getMessageList( $start=0, $offset=10 ) {
		$sql = "SELECT * FROM `message` ORDER BY `id` DESC LIMIT $start, $offset";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取消息总数
	*/
	public function getMessageCount() {
		$sql = "SELECT count(*) FROM `message`";
		$re = $this->db->result_first($sql);
		return intval($re);
	}	
	/*
	*回复消息
	*/
	public function reply($messageid, $content=''){
		$sql = "UPDATE `message` SET `reply`='$content' WHERE `id`='$messageid'";
		$this->db->query($sql);
		return true;		
	}
	/*
	*删除消息
	*/
	public function delete($messageid) {
		$sql = "DELETE FROM `message` WHERE `id`='$messageid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*添加消息
	*/
	public function add($message) {
		$sql1 = $sql2 = $s = '';
		foreach($message as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `message` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;	
	}
}

