<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddArticleList extends Base{
	const SYSID = 30;
	private $mArticle;
	private $cateTree;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['cid'] = $this->gpc->GetNum('cid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['article'] = $this->gpc->PostArray('article');
			$this->para['content'] = $this->gpc->PostString('content');
		}
		$this->mArticle = Factory::create("model::mArticle");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mArticle->addArticle($this->para['article'], $this->para['content']);
			if($re === true){
				showmessage("添加成功");
			}else{
				showmessage("添加失败");
			}
		}
		//获取分类树
		$this->output['category'] = $this->mArticle->getCateTree($this->para['cid']);
		return true;
	}
}
new AddArticleList('admin/article/addarticle.html','smarty');
?>