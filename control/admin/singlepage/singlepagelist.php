<?php
include_once (SLC_ROOT . 'control/Base.php');
class SinglePageList extends Base{
	const SYSID = 21;
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
		$mSinglePage = Factory::create("model::mSinglePage");
		$singlePageList = $mSinglePage->getSinglePageList($this->para['page'], $this->para['pagesize']);

		$total = $mSinglePage->getSinglePageTotalNum();
		$pageObj = Factory::create("tools::Page");
		$url = BASE_DOMAIN. "admin/singlepage/singlepagelist.php";
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);

		$this->output['singlePageList'] = $singlePageList;
		$this->output['pageinfo'] = $pageinfo;
		return true;
	}
}
new SinglePageList('admin/singlepage/singlepagelist.html','smarty');
?>
