<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditHomePosition extends Base{
	const SYSID = 32;
	public function checkPara(){
		if(!mLogin::checkPower(self::SYSID)){
			showmessage("没有权限");
		}
		$this->para['position_id'] = $this->gpc->GetNum('position_id');
		$this->para['issubmit'] = $this->gpc->PostString('issubmit');
		if($this->para['issubmit']){	
			$this->para['homeposition'] = $this->gpc->PostArray('homeposition');
		}
		return true;
	}
	public function action(){
		$mHomePosition = $this->mHomePosition = Factory::create("model::mHomePosition");
		if($this->para['issubmit']){
			$this->para['position_id'] = $this->gpc->PostNum('position_id');
			$re = $mHomePosition->editHomePosition($this->para['position_id'], $this->para['homeposition']);
			if($re === true){
				showmessage("修改成功", "edithomeposition.php?position_id=" . $this->para['position_id'], 1);
			}else{
				showmessage("修改失败", "edithomeposition.php?position_id=" . $this->para['position_id'], 1);
			}
		}
		$homePosition = $mHomePosition->getHomePositionByIds(array($this->para['position_id']));
		//var_dump($homePosition,$this->para['position_id']);
		$this->output['homeposition'] = $homePosition[$this->para['position_id']];
		//获取分类树
		$mArticle = Factory::create("model::mArticle");
		$this->output['category'] = $mArticle->getCateTree($this->output['homeposition']['cid']);
		return true;
	}
}
new EditHomePosition('admin/homeposition/edithomeposition.html','smarty');
