<?php
include_once (SLC_ROOT . 'control/Base.php');
class Top extends Base{
	public function checkPara(){
		return true;
	}
	public function action(){
		$this->output['cProject'] = $GLOBALS['cProject'];
		return true;
	}
}
new Top('admin/top.html','smarty');

