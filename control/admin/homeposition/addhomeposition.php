<?php
include_once (SLC_ROOT . 'control/Base.php');
class AddHomePosition extends Base{
	const SYSID = 32;
	private $mHomePosition;
	private $mArticle;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['cid'] = $this->gpc->GetNum('cid');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['homeposition'] = $this->gpc->PostArray('homeposition');
		}
		$this->mHomePosition = Factory::create("model::mHomePosition");
		$this->mArticle = Factory::create("model::mArticle");
		return true;
	}
	public function action(){
		if($this->para['issubmit']){
			$re = $this->mHomePosition->addHomePosition($this->para['homeposition']);
			if($re === true){
				showmessage("添加成功", "homepositionlist.php", 1);
			}else{
				showmessage("添加失败", "homepositionlist.php", 1);
			}
		}
		//获取分类树
		$this->output['category'] = $this->mArticle->getCateTree($this->para['cid']);
		return true;
	}
}
new AddHomePosition('admin/homeposition/addhomeposition.html','smarty');
?>