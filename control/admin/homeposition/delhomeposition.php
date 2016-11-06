<?php
include_once (SLC_ROOT . 'control/Base.php');
class DelHomePosition extends Base{
	const SYSID = 32;
	private $mHomePosition;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['position_id'] = $this->gpc->GetNum('position_id');
		return true;
	}
	public function action(){
		$this->mHomePosition = Factory::create("model::mHomePosition");
		if(!$this->para['position_id']){
			showmessage("操作有误");
		}else{
			$re = $this->mHomePosition->delHomePosition($this->para['position_id']);
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
new DelHomePosition();
?>