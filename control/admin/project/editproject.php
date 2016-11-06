<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditProject extends Base{
	const SYSID = 30;
	private $mProject;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['pid'] = $this->gpc->GetNum('pid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['pid'] = $this->gpc->PostNum('pid');
			$this->para['project'] = $this->gpc->PostArray('project');
			//var_dump($_POST,$this->para['project']);exit;
		}
		$this->mProject = Factory::create("model::mProject");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mProject->editProject($this->para['pid'],$this->para['project']);
			if($re){
				showmessage("修改成功", "editproject.php?pid=".$this->para['pid'], 1);
			}else{
				showmessage("修改失败", "editproject.php?pid=".$this->para['pid'], 1);
			}
		}elseif($this->para['pid']){
			$project = $this->mProject->getProjectByPids($this->para['pid']);
			$this->output['project'] = $project[$this->para['pid']];
		}else{
			showmessage('操作有误');	
		}
		return true;
	}
}
new EditProject('admin/project/editproject.html','smarty');
?>