<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Intro extends Base {
	private $mArticle;
	public function checkPara() {
		$this->para ['aid'] = $this->gpc->GetNum ( 'aid' );
		$this->para ['aid'] = $this->para ['aid'] ? $this->para ['aid'] : 2;
		$this->mArticle = Factory::create ( "model::mArticle" );
		
		$this->para ['zxgkCid'] = 5;
		return true;
	}
	public function action() {		
		$zxgkList = $this->mArticle->getArticleBycid ( $this->para ['zxgkCid'], "", 1, 1, 10 );	
		$this->output ['zxgkList'] = $zxgkList;
		
		$article = $this->mArticle->getWholeArticleByAids ( $this->para ['aid'] );
		$this->output ['article'] = $article = $article [$this->para ['aid']];
		$this->output ['title'] = $article ['title'];
		return true;
	}
}
new Intro ( 'article/intro.html', 'smarty' );
?>