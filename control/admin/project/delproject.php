<?php
class DelProject extends Base{
	const SYSID = 30;
	private $mproject;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['pid'] = $this->gpc->GetNum('pid');
		return true;
	}
	public function action(){
		$this->mProject = Factory::create("model::mProject");
		if(!$this->para['pid']){
			showmessage("操作有误");
		}else{
			$re = $this->mProject->delProject($this->para['pid']);
		}
		if($re === true){
			showmessage("删除成功");
		}else{
			showmessage('删除失败');
		}
		return true;
	}
}
new DelProject();
?>