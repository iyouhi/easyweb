<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddUser extends Base{
	const SYSID = 10;
	private $mGroup;
	private $cateTree;
	private $mUser;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['gid'] = $this->gpc->GetNum('gid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['user'] = $this->gpc->PostArray('user');
		}
		$this->mGroup = Factory::create("model::mGroup");
		$this->mUser = Factory::create("model::mUser");
		$this->cateTree = Factory::create("tools::CateTree");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mUser->addUser($this->para['user']);
			if($re === true){
				showmessage("添加成功", "userlist.php", 1);
			}else{
				showmessage("添加失败", "userlist.php", 1);
			}
		}
		//获取分类树
		$this->output['category'] = $this->getGroupTree($this->para['gid']);
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
new AddUser('admin/user/adduser.html','smarty');
?>