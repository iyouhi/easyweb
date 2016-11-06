<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddDownload extends Base{
	const SYSID = 71;
	private $mDownload;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['cid'] = $this->gpc->GetNum('cid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['download'] = $this->gpc->PostArray('download');
		}
		$this->mDownload = Factory::create("model::mDownload");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mDownload->addDownload($this->para['download']);
			if($re === true){
				showmessage("添加成功", "adddownload.php", 1);
			}else{
				showmessage("添加失败", "adddownload.php", 1);
			}
		}
		return true;
	}
}
new AddDownload('admin/download/adddownload.html','smarty');
?>
