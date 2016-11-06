<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditUser extends Base{
	const SYSID = 10;
	private $mUser;
	private $mGroup;
	private $cateTree;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['uid'] = $this->gpc->GetNum('uid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['user'] = $this->gpc->PostArray('user');
		}
		$this->mUser = Factory::create("model::mUser");
		$this->mGroup = Factory::create("model::mGroup");
		$this->cateTree = Factory::create("tools::CateTree");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$this->para['uid'] = $this->gpc->PostNum('uid');
			$re = $this->mUser->editUser($this->para['uid'],$this->para['user']);
			if($re === true){
				showmessage("修改成功", "edituser.php?uid=" . $this->para['uid'], 1);
			}else{
				showmessage("修改失败", "edituser.php?uid=" . $this->para['uid'], 1);
			}
		}
		$userInfo = $this->mUser->getUserInfoByUid($this->para['uid']);
		$userExt = $this->mUser->getUserExtByUid($this->para['uid']);
		//获取分类树
		$this->output['userinfo'] = $userInfo[$this->para['uid']];
		$this->output['userext'] = $userExt[$this->para['uid']];
		$this->output['category'] = $this->getGroupTree($this->output['userinfo']['gid']);
		return true;
	}
	public function getGroupTree($gid){
		$categoryList = $this->mGroup->getGroupList();
		$this->cateTree->CateTree($categoryList, 'gid', 'pgid', 'gname');
		$str = "<option value=\$gid \$selected>\$spacer\$gname</option>";
		$category = $this->cateTree->getTree(0,$str, $gid);
		return $category;
	}
}
new EditUser('admin/user/edituser.html','smarty');
