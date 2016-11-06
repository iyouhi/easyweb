<?php
include_once (SLC_ROOT . 'control/Base.php');
class CategoryList extends Base{
	const SYSID = 31;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['status'] = $this->gpc->GetNum('status');
		$this->para['page'] = $this->gpc->GetNum('page');
		$this->para['pagesize'] = $this->gpc->GetNum('pagesize');
		$this->para['status'] = $this->para['status'] ? $this->para['status'] : 1;
		return true;
	}
	public function action(){
		$mArticle = Factory::create("model::mArticle");
		$cateTree = Factory::create("tools::CateTree");
		$categoryList = $mArticle->getCategoryList();
		$cateTree->CateTree($categoryList);
		$categoryList = $cateTree->getTreeArray(0);
		$this->output['categorylist'] = $categoryList;
		return true;
	}
}
new CategoryList('admin/article/categorylist.html','smarty');
