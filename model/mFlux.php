<?php
class mFlux {
	private $dFlux;
	public function __construct() {
		$this->dFlux = Factory::create ( "data::dFlux" );
	}
	/*
	*流量统计列表
	*/
	public function getFluxList($page = 1, $pagesize = 10) {
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$fluxList = $this->dFlux->getFluxList ( $start, $pagesize );
		return $fluxList;
	}
	/*
	*获取pv
	*/
	public function getFluxCount($flag=FALSE) {
		$fluxCount = $this->dFlux->getFluxCount ( );
		if($flag){
			return $fluxCount['fcount'] + $fluxCount['realcount'];
		}
		return $fluxCount;
	}	
	/*
	*添加一条访问记录
	*/
	public function addFlux($fluxInfo=array()) {
		if(!is_array($fluxInfo) || empty($fluxInfo)){
			return FALSE;			
		}
		$re = $this->dFlux->addFlux ( $fluxInfo );
		$re = $this->dFlux->increaseCount();
		return TRUE;
	}
	/*
	*设置初始pv
	*/
	public function setFluxCount($count) {
		$re = $this->dFlux->setFluxCount ( $count );
		return TRUE;
	}
}
?>