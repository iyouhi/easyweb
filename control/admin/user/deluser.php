<?php
include_once (SLC_ROOT . 'control/Base.php');
class CategoryList extends Base{
	const SYSID = 10;
	private $mUser;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['uid'] = $this->gpc->GetNum('uid');
		return true;
	}
	public function action(){
		$this->mUser = Factory::create("model::mUser");
		if(!$this->para['uid']){
			showmessage("操作有误");
		}else{
			$re = $this->mUser->delUser($this->para['uid']);
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
new CategoryList();
?>