<?php
include_once (SLC_ROOT . 'control/Base.php');
class HomePositionList extends Base{
	const SYSID = 32;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['page'] = $this->gpc->GetNum('page');
		$this->para['pagesize'] = $this->gpc->GetNum('pagesize');
		$this->para['page'] = $this->para['page'] ? $this->para['page'] : 1;
		$this->para['pagesize'] = $this->para['pagesize'] ? $this->para['pagesize'] : 10;
		return true;
	}
	public function action(){
		$mHomePosition = Factory::create("model::mHomePosition");
		$homePositionList = $mHomePosition->getHomePositionList();
		
		$this->output['homePositionList'] = $homePositionList;
		return true;
	}
}
new HomePositionList('admin/homeposition/homepositionlist.html','smarty');
