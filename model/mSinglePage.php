<?php
class mSinglePage{
	private $dSinglePage;
	/*
	*获取内容列表
	*/
	public function __construct() {
		$this->dSinglePage = Factory::create("data::dSinglePage");
	}
	/*
	*获取单页面列表
	*/
	public function getSinglePageList($page=1, $pagesize=10) {
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$articleList = $this->dSinglePage->getSinglePageList($start, $pagesize);
		return $articleList;
	}
	/*
	*获取单页面总数
	*/
	public function getSinglePageTotalNum(){
		return $this->dSinglePage->getSinglePageTotalNum();
	}

	/*
	*根据单页面id获取单页面信息
	*/
	public function getSinglePageByIds($id) {
		if(!is_array($id))$id = array($id);
		$singlePageList = $this->dSinglePage->getSinglePageByIds($id);
		$re = array();
		foreach($singlePageList as $v){
			$v['content'] = str_replace(array("\r\n", "\n", "\r"), '', $v['content']);
			$re[$v['id']] = $v;
		}
		return $re;
	}
	/*
	*添加单页面
	*/
	public function addSinglePage($singlePage) {
		if(!empty($singlePage['content'])){
			$singlePage['content'] = str_replace(array("\r\n", "\n", "\r", "\\"), '', htmlspecialchars_decode($singlePage['content']));
		}
		//添加单页面
		$re = $this->dSinglePage->addSinglePage($singlePage);
		return $re;
	}
	/*
	*修改单页面
	*/
	public function editSinglePage($id, $singlePage) {
		if(!empty($singlePage['content'])){
			$singlePage['content'] = str_replace(array("\r\n", "\n", "\r", "\\"), '', htmlspecialchars_decode($singlePage['content']));
		}
		//修改单页面
		$re = $this->dSinglePage->editSinglePage($id, $singlePage);
		return $re;
	}
	/*
	*删除单页面
	*/
	public function delSinglePage($id) {
		if(empty($id))return false;
		$re = $this->dSinglePage->delSinglePage($id);
		return $re;
	}
}
?>