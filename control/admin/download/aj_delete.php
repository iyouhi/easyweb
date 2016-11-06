<?php
include_once (SLC_ROOT . 'control/Base.php');
class DeleteDownload extends Base{
	const SYSID = 70;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			exit("M0002");
		}
		$this->para['id'] = $this->gpc->PostNum('id');
		return true;
	}
	public function action(){
		$mDownload = Factory::create("model::mDownload");
		$re = $mDownload->delete($this->para['id']);
		if(!$re)exit("M0003");		
		exit("M0001");
	}
}
new DeleteDownload();

