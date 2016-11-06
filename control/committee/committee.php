<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class Committee extends Base {
	private $mArticle;
	private $mDownload;
	public function checkPara() {
		$this->para ['aid'] = $this->gpc->GetNum ( 'aid' );
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

		$article = $this->mArticle->getWholeArticleByAids ( $this->para ['aid'] );
		$this->output ['article'] = $article = $article [$this->para ['aid']];
		$this->output ['title'] = $article ['title'];
		return true;
	}
}
new Committee ( 'committee/committee.html', 'smarty' );
?>
