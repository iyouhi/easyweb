<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddProject extends Base{
	const SYSID = 30;
	private $mProject;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['pid'] = $this->gpc->GetNum('pid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['project'] = $this->gpc->PostArray('project');
		}
		$this->mProject = Factory::create("model::mProject");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mProject->addProject($this->para['project']);
			if($re){
				showmessage("添加成功");
			}else{
				showmessage("添加失败");
			}
		}
		return true;
	}

}
new AddProject('admin/project/addproject.html','smarty');
?>