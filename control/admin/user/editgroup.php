<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditGroup extends Base{
	const SYSID = 11;
	private $mGroup;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['gid'] = $this->gpc->GetNum('gid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['group'] = $this->gpc->PostArray('group');
			$this->para['power'] = $this->gpc->PostArray('power');
		}
		
		$this->mGroup = Factory::create("model::mGroup");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$this->para['gid'] = $this->gpc->PostNum('gid');
			$re = $this->mGroup->editGroup($this->para['gid'],$this->para['group'], $this->para['power']);
			if($re === true){
				showmessage("修改成功", "editgroup.php?gid=" . $this->para['gid'], 1);
			}else{
				showmessage("修改失败", "editgroup.php?gid=" . $this->para['gid'], 1);
			}
		}
		$groupinfo = $this->mGroup->getGroupByGids($this->para['gid']);
		$groupinfo[$this->para['gid']]['power'] = explode(",", $groupinfo[$this->para['gid']]['power']);
		$this->output['groupinfo'] = $groupinfo[$this->para['gid']];
		include_once(SLC_ROOT . 'config/adminmenu.php');
		$this->output['menucate'] = $menuCate;
		$this->output['menulist'] = $menuList;
		return true;
	}
}
new EditGroup('admin/user/editgroup.html','smarty');
?>