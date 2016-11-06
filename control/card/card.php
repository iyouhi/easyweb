<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Card extends Base {
	private $mCard;
	private $mArticle;
	public function checkPara() {
		$this->para ['code'] = $this->gpc->GetString ( 'code' );
		$this->para ['jym'] = $this->gpc->GetString('jym');
		$this->mCard = Factory::create ( "model::mCard" );
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
		
		
		$re = $this->mCard->queryCard($this->para['code'], $this->para['jym']);
		$this->output['cardInfo'] = $re[0];
		$this->output['cardType'] = $re['type'];
		$this->output['title'] = "查询结果";
		return true;
	}
}
new Card ( 'card/card.html', 'smarty' );
