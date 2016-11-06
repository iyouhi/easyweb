<?php
include_once SLC_ROOT . 'data/dBase.php';
class dFlux extends dBase{
	/*
	*获取流量日志
	*/
	public function getFluxList( $start=0, $offset=10 ) {
		$sql = "SELECT * FROM `flux_log` ORDER BY `id` DESC LIMIT $start, $offset";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取流量日志
	*/
	public function getFluxCount() {
		$sql = "SELECT * FROM `flux_count` LIMIT 1";
		$re = $this->getData($sql);
		return $re[0];
	}
	/*
	*设置初始流量
	*/
	public function setFluxCount($count) {
		$sql = "UPDATE `flux_count` SET `fcount`='$count'";
		$re = $this->db->query($sql);
		return $re;
	}
	
	/*
	*添加流量日志
	*/
	public function addFlux($fluxinfo){
		$sql1 = $sql2 = $s = '';
		foreach($fluxinfo as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `flux_log` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;		
	}
	/*
	*访问数加1
	*/
	public function increaseCount() {
		$sql = "UPDATE `flux_count` SET `realcount`=`realcount`+1";
		$re = $this->db->query($sql);
		return $re;
	}
}

