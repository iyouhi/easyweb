<?php
class mDownload {
	private $dFlux;
	public function __construct() {
		$this->dDownload = Factory::create ( "data::dDownload" );
	}
	/*
	*获取下载列表
	*/
	public function getDownloadList($page = 1, $pagesize = 10) {
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$messageList = $this->dDownload->getDownloadList ( $start, $pagesize );
		return $messageList;
	}
	/*
	*获取下载信息
	*/
	public function getDownload($downloadid) {
		if(empty($downloadid))return false;
		$downloadInfo = $this->dDownload->getDownload($downloadid);
		return $downloadInfo[0];
	}
	/*
	*获取下载总数
	*/
	public function getDownloadCount() {
		$count = $this->dDownload->getDownloadCount ();
		return $count;
	}
	/*
	 *删除下载 
	 */
	public function delete($id){
		$re = $this->dDownload->delete($id);
		return TRUE;
	}
	/*
	 *添加下载 
	 */
	public function addDownload($downloadInfo){
		if( !is_array($downloadInfo) || empty($downloadInfo))return false;
		$downloadInfo['ctime'] = date("Y-m-d H:i:s", time(0));
		$re = $this->dDownload->addDownload($downloadInfo);
		return $re;
	}
}

