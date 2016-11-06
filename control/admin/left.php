<?php
include_once (SLC_ROOT . 'control/Base.php');
class Left extends Base{
	protected $need_login = 1;
	public function checkPara(){
		return true;
	}
	public function action(){
		include_once(SLC_ROOT . 'config/adminmenu.php');
		$this->output['cUserInfo'] = $_SESSION['admin'];
		if($_SESSION['admin']['gid'] !== '1'){
			$power = explode(",", $_SESSION['admin']['power']);
			
			foreach($menuCate as $key => &$value){
				foreach($value['menu'] as $k => $v){
					if(!in_array($v,$power)){
						unset($value['menu'][$k]);
					}
				}
				if(empty($value['menu'])) unset($menuCate[$key]);			
			}
		}
		$this->output['menucate'] = $menuCate;
		$this->output['menulist'] = $menuList;
		unset($menuCate,$menuList);
		return true;
	}
}
new Left('admin/left.html','smarty');