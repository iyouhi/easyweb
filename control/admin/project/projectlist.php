<?php
include_once (SLC_ROOT . 'control/Base.php');
class ProjectList extends Base{
	const SYSID = 72;
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
		$mProject = Factory::create("model::mProject");
		$projectList = $mProject->getProjectListByUid($_SESSION['admin']['uid'], $this->para['page'], $this->para['pagesize']);
		$total = $mProject->getProjectTotalNumByUid($_SESSION['admin']['uid']);
		$pageObj = Factory::create("tools::Page");
		$url = BASE_DOMAIN. "admin/project/projectlist.php";
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['projectlist'] = $projectList;
		$this->output['pageinfo'] = $pageinfo;
		return true;
	}
}
new ProjectList('admin/project/projectlist.html','smarty');

