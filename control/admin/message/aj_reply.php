<?php
include_once (SLC_ROOT . 'control/Base.php');
class ReplyMessage extends Base{
	const SYSID = 40;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			exit("M0002");
		}
		$this->para['id'] = $this->gpc->PostNum('id');
		$this->para['reply'] = $this->gpc->PostString('reply');
		return true;
	}
	public function action(){
		$mMessage = Factory::create("model::mMessage");
		$re = $mMessage->reply($this->para['id'], $this->para['reply']);
		if(!$re)exit("M0003");		
		exit("M0001");
	}
}
new ReplyMessage();

