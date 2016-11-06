<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditArticleList extends Base{
	const SYSID = 30;
	private $mArticle;
	private $cateTree;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['aid'] = $this->gpc->GetNum('aid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['aid'] = $this->gpc->PostNum('aid');
			$this->para['article'] = $this->gpc->PostArray('article');
			$this->para['content'] = $this->gpc->PostString('content');
		}
		$this->mArticle = Factory::create("model::mArticle");
		$this->cateTree = Factory::create("tools::CateTree");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mArticle->editArticle($this->para['aid'],$this->para['article'], $this->para['content']);
			if($re === true){
				showmessage("修改成功", "editarticle.php?aid=".$this->para['aid'], 1);
			}else{
				showmessage("修改失败", "addarticle.php?aid=".$this->para['aid'], 1);
			}
		}elseif($this->para['aid']){
			$article = $this->mArticle->getWholeArticleByAids($this->para['aid']);
			$this->output['article'] = $article[$this->para['aid']];
		}else{
			showmessage('操作有误');	
		}
		//获取分类树
		$this->output['category'] = $this->getCateTree($this->output['article']['cid']);
		return true;
	}
	public function getCateTree($cid){
		$categoryList = $this->mArticle->getCategoryList();
		$this->cateTree->CateTree($categoryList);
		$str = "<option value=\$cid \$selected>\$spacer\$cname</option>";
		$category = $this->cateTree->getTree(0,$str,$cid);
		return $category;
	}
}
new EditArticleList('admin/article/editarticle.html','smarty');
?>