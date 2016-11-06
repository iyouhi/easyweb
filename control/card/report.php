<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Report extends Base {
	private $mCard;
	private $mArticle;
	public function checkPara() {
		$this->para ['ypcode'] = $this->gpc->GetString ( 'ypcode' );
		$this->para ['wtdw'] = $this->gpc->GetString ( 'wtdw' );
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
		
		
		$re = $this->mCard->queryReport($this->para['ypcode'], $this->para['wtdw']);
		//var_dump($re);exit;
		$this->output['reportInfo'] = $re[0];
		$this->output['title'] = "查询结果";
		return true;
	}
}
new Report ( 'card/report.html', 'smarty' );
?>