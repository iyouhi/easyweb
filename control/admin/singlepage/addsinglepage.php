<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddSinglePage extends Base{
	const SYSID = 20;
	private $mSinglePage;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['cid'] = $this->gpc->GetNum('cid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['pageinfo'] = $this->gpc->PostArray('pageinfo');
		}
		$this->mSinglePage = Factory::create("model::mSinglePage");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mSinglePage->addSinglePage($this->para['pageinfo']);
			if($re === true){
				showmessage("添加成功", "addsinglepage.php", 1);
			}else{
				showmessage("添加失败", "addsinglepage.php", 1);
			}
		}
		return true;
	}
}
new AddSinglePage('admin/singlepage/addsinglepage.html','smarty');
?>