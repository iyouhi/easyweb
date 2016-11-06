<?php
session_start();
include_once(SLC_ROOT."tools/Request.php");
abstract class Base {
	protected $para;
	protected $output;
	protected $displayType;
	protected $smarty;
	protected $template;
	protected $gpc;
	protected $need_login = 0;	//需要检查登陆
	protected $project;
	public function __construct($template="", $displayType='smarty') {	
		$this->gpc = Request::getInstance();
		
		//判断用户是否登陆
		$mLogin = Factory::create("model::mLogin");
		if($this->need_login){
			$this->para['cUserInfo'] = $mLogin->isLogined();
			if($this->para['cUserInfo'] === false){
				header("content-type:text/html; charset=utf-8");
				header("Location:" . BASE_DOMAIN . "admin/login.php");
				exit;
			}
		}
				
		if(!empty($template)) {
			$this->template = $template;
		}
		
		//获取后台当前所选项目
		$white_list = array(
			'/admin/selectcproject.php',
			'/admin/login.php',
			'/admin/loginout.php',
			'/admin/project/addproject.php',
		);
		if($_SERVER['SERVER_NAME'] == ADMIN_DOMAIN && !in_array($_SERVER['REQUEST_URI'], $white_list)){
			if (!empty($_SESSION['cProject'])){
				$GLOBALS['cProject'] = $_SESSION['cProject'];			
			} else {
				header("Location:" . BASE_DOMAIN . "admin/selectcproject.php");				
			}
		}
		
		$this->displayType = $displayType;
		
		
		if($this->checkPara() !== false){
			$this->output['project'] = $GLOBALS['cProject'];
			$this->action();
		}
		
		//smarty
		if($this->displayType == 'smarty'){
            //var_dump($this->template,$this->output);exit;
			if(!empty($this->template)){
				$this->smarty = Factory::create("tools::SlcSmarty");
				
				$this->smarty->slcAssign($this->output);
				$this->smarty->display($this->template);
				
			}
		}elseif($this->displayType == 'json'){
			echo json_encode($this->output);
			exit;
		}
	}
	public function checkPara() {}
	public abstract function action();

}
?>
