<?php
include_once (SLC_ROOT . 'control/Base.php');
class DownloadList extends Base{
	const SYSID = 70;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['page'] = $this->gpc->GetNum('page');
		$this->para['pagesize'] = $this->gpc->GetNum('pagesize');
		$this->para['page'] = $this->para['page'] ? $this->para['page'] : 1;
		$this->para['pagesize'] = $this->para['pagesize'] ? $this->para['pagesize'] : 20;
		return true;
	}
	public function action(){
		$mDownload = Factory::create("model::mDownload");
		$downloadList = $mDownload->getDownloadList($this->para['page'], $this->para['pagesize']);		
		$total = $mDownload->getDownloadCount();		
		$this->output['downloadList'] = $downloadList;
		$this->output['total'] = $total;
		
		//分页
		$pageObj = Factory::create("tools::Page");
		$url = "";
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['pageinfo'] = $pageinfo;
		return true;
	}
}
new DownloadList('admin/download/downloadlist.html','smarty');
