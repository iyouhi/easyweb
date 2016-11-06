<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Download extends Base {
	private $mDownload;
	public function checkPara() {
		$this->para ['id'] = $this->gpc->GetNum ( 'id' );
		if(empty($this->para['id'])){
			showmessage("参数错误");
		}
		$this->mDownload = Factory::create ( "model::mDownload" );
		return true;
	}
	public function action() {		
		//下载
		$downloadInfo = $this->mDownload->getDownload($this->para['id']);
		$downfile = UPLOAD_DIR . 'zfile/' . $downloadInfo['filepath'];
		if(!file_exists($downfile))showmessage("此文件不存在");
		//echo ext($downfile);
		header("Content-Type:application/msword");
		header("Content-Disposition:attachment;filename='".$downloadInfo['filename']."'");
		echo file_get_contents($downfile);
		exit;
	}
}
new Download ( );
?>
