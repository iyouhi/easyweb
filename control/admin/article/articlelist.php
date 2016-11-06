<?php
include_once (SLC_ROOT . 'control/Base.php');
class ArticleList extends Base{
	const SYSID = 30;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['status'] = $this->gpc->GetNum('status');
		$this->para['page'] = $this->gpc->GetNum('page');
		$this->para['pagesize'] = $this->gpc->GetNum('pagesize');
		$this->para['status'] = $this->para['status'] ? $this->para['status'] : 1;
		$this->para['page'] = $this->para['page'] ? $this->para['page'] : 1;
		$this->para['pagesize'] = $this->para['pagesize'] ? $this->para['pagesize'] : 20;
		return true;
	}
	public function action(){
		$mArticle = Factory::create("model::mArticle");
		$articleList = $mArticle->getArticleList($this->para['status'], $this->para['page'], $this->para['pagesize']);
		$catid = array();
		foreach ($articleList as $v){
			$catid[] = $v['cid'];
		}
		$cat = $mArticle->getCategoryByCid($catid);
		$total = $mArticle->getArticleTotalNum($this->para['status']);
		$pageObj = Factory::create("tools::Page");
		$url = BASE_DOMAIN. "admin/article/articlelist.php?status=" . $this->para['status'];
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['articlelist'] = $articleList;
		$this->output['pageinfo'] = $pageinfo;
		$this->output['catinfo'] = $cat;
		return true;
	}
}
new ArticleList('admin/article/articlelist.html','smarty');
?>
