<?php
class Page
{
	var $totalnum;
	var $pagesize;
	var $page;
	var $url;
	var $pageDate;
	/*
	 * $pageRecNum  每页条目数
	 * $pagenum 当前页码数
	 * $url 页码前面的url
	 * $totalnum 总条目数量
	 * $page 输出数组
	 */
	function getPageInfo($url, $totalnum, $page, $pagesize){
		$this->pagesize = $pagesize;
		$this->page = $page;
		$this->url = $url;
		if(substr($this->url,0,1) == '?'){
			$this->url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].$this->url;
		}
		if($totalnum===''){
			$totalnum = 0;
		}
		$this->totalnum = $totalnum;
		$pageInfo = $this->getPageData();
		return $pageInfo;
	}
	function getPageData(){
		if($this->url) $this->url = preg_replace("/(.*)([&?]page=[0-9]*)(.*)/i", "\\1\\3", $this->url);
		$s = strpos($this->url, '?') === FALSE ? '?' : '&';
		$pageData = array(
			'page' => $this->page,
			'pagesize' => $this->pagesize,
			'totalnum' => $this->totalnum,
			'totalpage' => ceil($this->totalnum/$this->pagesize),
			'url' => $this->url
		);
		
		if($this->page <= 1){
			$pageData['previous'] = '';
			$pageData['first'] = '';
		} else {
			$pageData['previous'] = $this->url . $s . "page=" . ($this->page - 1);
			$pageData['first'] = $this->url . $s . "page=1";
		}
		if($this->page >= $pageData['totalpage'] ){
			$pageData['next'] = '';
			$pageData['last'] = '';
		} else {
			$pageData['next'] = $this->url . $s . "page=" . ($this->page + 1);
			$pageData['last'] = $this->url . $s . "page=" . $pageData['totalpage'];
		}		
		return $pageData;
	}
}
?>