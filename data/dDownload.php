<?php
include_once SLC_ROOT . 'data/dBase.php';
class dDownload extends dBase{
	/*
	*获取下载列表
	*/
	public function getDownloadList( $start=0, $offset=10 ) {
		$sql = "SELECT * FROM `download` ORDER BY `id` DESC LIMIT $start, $offset";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取下载信息
	*/
	public function getDownload( $downloadid ) {
		$sql = "SELECT * FROM `download` WHERE `id`='$downloadid'";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取下载总数
	*/
	public function getDownloadCount() {
		$sql = "SELECT count(*) FROM `download`";
		$re = $this->db->result_first($sql);
		return intval($re);
	}	
	/*
	*删除下载
	*/
	public function delete($downloadid) {
		$sql = "DELETE FROM `download` WHERE `id`='$downloadid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*添加下载
	*/
	public function addDownload($download) {
		$sql1 = $sql2 = $s = '';
		foreach($download as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `download` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;	
	}
}

