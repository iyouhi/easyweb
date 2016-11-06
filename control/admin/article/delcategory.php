<?php
include_once (SLC_ROOT . 'control/Base.php');
class CategoryList extends Base{
	const SYSID = 31;
	private $mArticle;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['cid'] = $this->gpc->GetNum('cid');
		return true;
	}
	public function action(){
		$this->mArticle = Factory::create("model::mArticle");
		if(!$this->para['cid']){
			showmessage("操作有误");
		}else{
			$re = $this->mArticle->delCategory($this->para['cid']);
		}
		if($re === true){
			showmessage("删除成功");
		}else{
			if(isset($re['msg'])){
				showmessage($re['msg']);
			}
			showmessage('删除失败');
		}
		return true;
	}
}
new CategoryList();
?>