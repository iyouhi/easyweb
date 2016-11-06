<?php
include_once (SLC_ROOT . 'control/Base.php');
class DelSinglePage extends Base{
	const SYSID = 21;
	private $mSinglePage;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['id'] = $this->gpc->GetNum('id');
		return true;
	}
	public function action(){
		$this->mSinglePage = Factory::create("model::mSinglePage");
		if(!$this->para['id']){
			showmessage("操作有误");
		}else{
			$re = $this->mSinglePage->delSinglePage($this->para['id']);
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
new DelSinglePage();
?>