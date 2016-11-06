<?php
include_once (SLC_ROOT . 'control/Base.php');
class UserGroup extends Base{
	const SYSID = 11;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		return true;
	}
	public function action(){
		$userobj = Factory::create("model::mGroup");
		$grouplist = $userobj->getGroupList();
		$this->output['grouplist'] = $grouplist;
		return true;
	}
}
new UserGroup('admin/user/usergroup.html','smarty');
?>
