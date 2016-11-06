<?php
include_once (SLC_ROOT . 'control/Base.php');
class DeleteMessage extends Base{
	const SYSID = 40;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			exit("M0002");
		}
		$this->para['id'] = $this->gpc->PostNum('id');
		return true;
	}
	public function action(){
		$mMessage = Factory::create("model::mMessage");
		$re = $mMessage->delete($this->para['id']);
		if(!$re)exit("M0003");		
		exit("M0001");
	}
}
new DeleteMessage();

