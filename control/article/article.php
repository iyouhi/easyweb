<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Article extends Base {
	private $mArticle;
	public function checkPara() {
		$this->para ['aid'] = $this->gpc->GetNum ( 'aid' );
		$this->mArticle = Factory::create ( "model::mArticle" );
		
		$this->para ['xwzxCid'] = 1;
		$this->para ['jypxCid'] = 3;
		$this->para ['zbzsCid'] = 4;
		return true;
	}
	public function action() {		
		$xwzxList = $this->mArticle->getArticleBycid ( $this->para ['xwzxCid'], "", 1, 1, 10 );
		$jypxList = $this->mArticle->getArticleBycid ( $this->para ['jypxCid'], "", 1, 1, 10 );
		$zbzsList = $this->mArticle->getArticleBycid ( $this->para ['zbzsCid'], "", 1, 1, 10 );
		
		$this->output ['xwzxList'] = $xwzxList;
		$this->output ['jypxList'] = $jypxList;
		$this->output ['zbzsList'] = $zbzsList;
		
		$article = $this->mArticle->getWholeArticleByAids ( $this->para ['aid'] );
		$this->output ['article'] = $article = $article [$this->para ['aid']];
		$this->output ['title'] = $article ['title'];
		return true;
	}
}
new Article ( 'article/article.html', 'smarty' );
?>