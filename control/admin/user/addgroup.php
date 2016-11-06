<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddGroup extends Base{
	const SYSID = 11;
	private $mGroup;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['group'] = $this->gpc->PostArray('group');
		}
		$this->mGroup = Factory::create("model::mGroup");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mGroup->addGroup($this->para['group']);
			if($re === true){
				showmessage("添加成功", "usergroup.php", 1);
			}else{
				showmessage("添加失败", "addgroup.php", 1);
			}
		}
		return true;
	}
}
new AddGroup('admin/user/addgroup.html','smarty');
?>