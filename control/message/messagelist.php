<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class MessageList extends Base {
	private $mArticle;
	public function checkPara() {
		$this->para['page'] = $this->gpc->GetNum('page');
		$this->para['pagesize'] = $this->gpc->GetNum('pagesize');
		$this->para['page'] = $this->para['page'] ? $this->para['page'] : 1;
		$this->para['pagesize'] = $this->para['pagesize'] ? $this->para['pagesize'] : 10;
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
		
		
		$mMessage = Factory::create("model::mMessage");
		$messageList = $mMessage->getMessageList($this->para['page'], $this->para['pagesize']);		
		$total = $mMessage->getMessageCount();		
		$this->output['messageList'] = $messageList;
		$this->output['total'] = $total;
		
		//分页
		$pageObj = Factory::create("tools::Page");
		$url = "";
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['pageinfo'] = $pageinfo;
		return true;
	}
}
new MessageList ( 'message/messagelist.html', 'smarty' );
?>
