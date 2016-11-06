<?php
require_once(SLC_ROOT . 'tools/smarty/libs/Smarty.class.php');
class SlcSmarty extends Smarty{
	public function __construct() {
	    parent::__construct();
		$this->setTemplateDir(SMARTY_TPL_DIR);
		$this->setCompileDir(SLC_ROOT . 'templates_c');
		$this->compile_check = true;
		$this->debugging = false;
		$this->caching = false;
		$this->cache_lifetime = 120;
		
	}
	public function slcAssign($output){
		if(is_array($output)) {
			foreach ($output as $key => $value ){
				$this->assign ( $key, $value );
			}
		}
	}
}
