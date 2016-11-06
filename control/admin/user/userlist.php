<?php
include_once (SLC_ROOT . 'control/Base.php');
class UserList extends Base{
	const SYSID = 10;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		return true;
	}
	public function action(){
		$userobj = Factory::create("model::mUser");
		$userlist = $userobj->getUserList();
		$this->output['userlist'] = $userlist;
		return true;
	}
}
new UserList('admin/user/userlist.html','smarty');
?>
