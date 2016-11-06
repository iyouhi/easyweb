<?php
include_once (SLC_ROOT . 'control/Base.php');
class FluxList extends Base{
	const SYSID = 50;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['page'] = $this->gpc->GetNum('page');
		$this->para['pagesize'] = $this->gpc->GetNum('pagesize');
		$this->para['fcount'] = $this->gpc->PostNum('fcount');
		$this->para['page'] = $this->para['page'] ? $this->para['page'] : 1;
		$this->para['pagesize'] = $this->para['pagesize'] ? $this->para['pagesize'] : 20;
		return true;
	}
	public function action(){
		$mFlux = Factory::create("model::mFlux");
		if($this->para['fcount'] !== FALSE){
			$re = $mFlux->setFluxCount($this->para['fcount']);
			if($re){
				header("Location:" . BASE_DOMAIN . "admin/flux/fluxlist.php");
				exit;	
			}else {
				showmessage("设置失败");
			}
		}
		$fluxlist = $mFlux->getFluxList($this->para['page'], $this->para['pagesize']);		
		$fluxCount = $mFlux->getFluxCount();		
		$this->output['fluxlist'] = $fluxlist;
		$this->output['fluxCount'] = $fluxCount;
		
		//分页
		$total = $fluxCount['realcount'];
		$pageObj = Factory::create("tools::Page");
		$url = "";
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['pageinfo'] = $pageinfo;
		return true;
	}
}
new FluxList('admin/flux/fluxlist.html','smarty');
