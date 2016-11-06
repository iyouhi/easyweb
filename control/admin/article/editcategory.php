<?php
include_once (SLC_ROOT . 'control/Base.php');
class CategoryList extends Base{
	const SYSID = 31;
	private $mArticle;
	private $cateTree;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['cid'] = $this->gpc->GetNum('cid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['cate'] = $this->gpc->PostArray('cate');
		}
		$this->mArticle = Factory::create("model::mArticle");
		$this->cateTree = Factory::create("tools::CateTree");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$this->para['cid'] = $this->gpc->PostNum('cid');
			$re = $this->mArticle->editCategory($this->para['cid'],$this->para['cate']);
			if($re === true){
				showmessage("修改成功", "editcategory.php?cid=" . $this->para['cid'], 1);
			}else{
				showmessage("修改失败", "editcategory.php?cid=" . $this->para['cid'], 1);
			}
		}
		$catinfo = $this->mArticle->getCategoryByCid($this->para['cid']);
		//获取分类树
		$this->output['catinfo'] = $catinfo[$this->para['cid']];
		$this->output['category'] = $this->getCateTree($this->output['catinfo']['pcid']);
		return true;
	}
	public function getCateTree($cid){
		$categoryList = $this->mArticle->getCategoryList();
		$this->cateTree->CateTree($categoryList);
		$str = "<option value=\$cid \$selected>\$spacer\$cname</option>";
		$category = $this->cateTree->getTree(0,$str, $cid);
		return $category;
	}
}
new CategoryList('admin/article/editcategory.html','smarty');
?>