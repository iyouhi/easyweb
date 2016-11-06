<?php
include_once (SLC_ROOT . 'control/Base.php');
class UploadPic extends Base{
	public function checkPara(){
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		$this->para['textid'] = $_REQUEST['textid'];
		$this->para['picfile'] = $_FILES;
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$mFile = Factory::create("model::mFile");
			$result = array();
			$re = $mFile->upload($this->para['picfile'],$result);
			if($re === true){
				echo "<script>window.parent.Finish('".json_encode($result['msg'])."','" . $result['filename'] . "');</script>";				
			} else {
				echo "<script>window.parent.Finish('".json_encode($result['msg'])."','');</script>";				
			}
			exit;
		}
		$this->output['textid'] = $this->para['textid'];
		return true;
	}
}
new UploadPic('admin/article/uploadpic.html','smarty');
