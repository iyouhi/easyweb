<?php
include_once (SLC_ROOT . 'control/Base.php');
class DeleteGroup extends Base{
	const SYSID = 11;
	private $mGroup;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['gid'] = $this->gpc->GetNum('gid');
		return true;
	}
	public function action(){
		$this->mGroup = Factory::create("model::mGroup");
		if(!$this->para['gid']){
			showmessage("操作有误");
		}else{
			$re = $this->mGroup->delGroup($this->para['gid']);
		}
		if($re === true){
			showmessage("删除成功");
		}else{
			if(isset($re['msg'])){
				showmessage($re['msg']);
			}
			showmessage('删除失败');
		}
		return true;
	}
}
new DeleteGroup();
?>