<?php
include_once (SLC_ROOT . 'control/Base.php');
class CategoryList extends Base{
	const SYSID = 30;
	private $mArticle;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['aid'] = $this->gpc->GetNum('aid');
		return true;
	}
	public function action(){
		$this->mArticle = Factory::create("model::mArticle");
		if(!$this->para['aid']){
			showmessage("操作有误");
		}else{
			$re = $this->mArticle->delArticle($this->para['aid']);
		}
		if($re === true){
			showmessage("删除成功");
		}else{
			showmessage('删除失败');
		}
		return true;
	}
}
new CategoryList();
?>