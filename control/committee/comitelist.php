<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Committee extends Base {
	private $mArticle;
	private $mDownload;
	public function checkPara() {
		$this->para ['cid'] = $this->gpc->GetNum ( 'cid' );
		$this->para ['page'] = $this->gpc->GetNum ( 'page' );
		$this->para ['pagesize'] = $this->gpc->GetNum ( 'pagesize' );
		$this->para ['cid'] = $this->para ['cid'] ? $this->para ['cid'] : 6;
		$this->para ['page'] = $this->para ['page'] ? $this->para ['page'] : 1;
		$this->para ['pagesize'] = $this->para ['pagesize'] ? $this->para ['pagesize'] : 20;
		$this->mArticle = Factory::create ( "model::mArticle" );
		$this->mDownload = Factory::create ( "model::mDownload" );
		return true;
	}
	public function action() {
		$mLogin = Factory::create("model::mLogin");
		$cuser = $mLogin->isLogined('fguser');
		$this->output["cuser"] = $cuser;
		//新闻资讯
		$this->para ['xwzxCid'] = 1;
		$xwzxList = $this->mArticle->getArticleBycid ( $this->para ['xwzxCid'], "", 1, 1, 10 );
		$this->output ['xwzxList'] = $xwzxList;

		//下载列表
		$downloadList = $this->mDownload->getDownloadlist(1,20);
		$this->output['downloadList'] = $downloadList;

		//获取文章列表
		$articleList = $this->mArticle->getArticleBycid ( $this->para ['cid'], '', 1, $this->para['page'], $this->para['pagesize'] );
		$cateInfo = $this->mArticle->getCategoryByCid($this->para['cid']);
		$total = $this->mArticle->getArticleTotalNum(1, $this->para['cid']);
		$pageObj = Factory::create("tools::Page");
		$url = BASE_DOMAIN. "article/list.php?cid=" . $this->para['cid'];
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['pageinfo'] = $pageinfo;
		$this->output ['articleList'] = $articleList;
		$this->output['cateInfo'] = $cateInfo[$this->para['cid']]; 
		return true;
	}
}
new Committee ( 'committee/comitelist.html', 'smarty' );
?>
