<?php
include_once (SLC_ROOT . 'control/Base.php');
class CategoryList extends Base{
	const SYSID = 21;
	private $mSinglePage;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['id'] = $this->gpc->GetNum('id');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['pageinfo'] = $this->gpc->PostArray('pageinfo');
		}
		$this->mSinglePage = Factory::create("model::mSinglePage");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$this->para['id'] = $this->gpc->PostNum('id');
			$re = $this->mSinglePage->editSinglePage($this->para['id'],$this->para['pageinfo']);
			if($re === true){
				showmessage("修改成功", "editsinglepage.php?id=" . $this->para['id'], 1);
			}else{
				showmessage("修改失败", "editsinglepage.php?id=" . $this->para['id'], 1);
			}
		}
		$singlePageInfo = $this->mSinglePage->getSinglePageByIds($this->para['id']);
		//获取分类树
		$this->output['pageinfo'] = $singlePageInfo[$this->para['id']];
		return true;
	}
}
new CategoryList('admin/singlepage/editsinglepage.html','smarty');
?>