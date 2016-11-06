<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditArticleList extends Base{
	protected $need_login = 1;
	const SYSID = 30;
	private $mProject;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		$this->para['projectid'] = $this->gpc->PostNum('projectid');
		
		$this->mProject = Factory::create("model::mProject");
		return true;
	}
	public function action(){
		$this->output['msg'] = "";
		if($this->para['issubmit']){
			$projects = $this->mProject->getProjectByPids($this->para['projectid']);
			if(!$projects){
				showmessage("项目不存在", "selectcproject.php", 1);
			}
			$_SESSION['cProject'] = $projects[$this->para['projectid']];
			header("Location:" . BASE_DOMAIN . "admin/index.php");
			exit;
		}else{
			 $projects = $this->mProject->getProjectListByUid($_SESSION['admin']['uid']);
			 if (empty($projects))
			 {
			 	showmessage("还没有项目，现在就去创建", "/admin/project/addproject.php", 2);
			 }
			 $this->output['projects'] = $projects;
		}
		return true;
	}
	
}
new EditArticleList('admin/selectcproject.html','smarty');
?>