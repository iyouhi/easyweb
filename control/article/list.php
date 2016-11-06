<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class ArticleList extends Base {
	private $mArticle;
	public function checkPara() {
		$this->para ['cid'] = $this->gpc->GetNum ( 'cid' );
		$this->para ['page'] = $this->gpc->GetNum ( 'page' );
		$this->para ['pagesize'] = $this->gpc->GetNum ( 'pagesize' );
		$this->para ['cid'] = $this->para ['cid'] ? $this->para ['cid'] : 1;
		$this->para ['page'] = $this->para ['page'] ? $this->para ['page'] : 1;
		$this->para ['pagesize'] = $this->para ['pagesize'] ? $this->para ['pagesize'] : 20;
		$this->mArticle = Factory::create ( "model::mArticle" );
		return true;
	}
	public function action() {
		$this->para ['xwzxCid'] = 1;
		$this->para ['jypxCid'] = 3;
		$this->para ['zbzsCid'] = 4;
		
		$xwzxList = $this->mArticle->getArticleBycid ( $this->para ['xwzxCid'], "", 1, 1, 10 );
		$jypxList = $this->mArticle->getArticleBycid ( $this->para ['jypxCid'], "", 1, 1, 10 );
		$zbzsList = $this->mArticle->getArticleBycid ( $this->para ['zbzsCid'], "", 1, 1, 10 );
		
		$this->output ['xwzxList'] = $xwzxList;
		$this->output ['jypxList'] = $jypxList;
		$this->output ['zbzsList'] = $zbzsList;
		
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
new ArticleList ( 'article/list.html', 'smarty' );
?>