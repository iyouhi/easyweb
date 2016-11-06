<?php
//phpinfo();exit;
//error_reporting(E_ALL);
ini_set('magic_quotes_runtime', 0);
define('IN_SLC', TRUE);
define('SLC_ROOT', dirname(__FILE__).'/');
define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
include_once(SLC_ROOT.'config/config.php');
include_once(SLC_ROOT.'config/dbconfig.php');
include_once(SLC_ROOT . "tools/common_func.php");
include_once(SLC_ROOT . "tools/Factory.php");    //加载工厂类
unset($GLOBALS, $_ENV, $HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS, $HTTP_SERVER_VARS, $HTTP_ENV_VARS);
$_GET		= daddslashes($_GET, 1, TRUE);
$_POST		= daddslashes($_POST, 1, TRUE);
$_COOKIE	= daddslashes($_COOKIE, 1, TRUE);
$_SERVER	= daddslashes($_SERVER);
$_FILES		= daddslashes($_FILES);
$_REQUEST	= daddslashes($_REQUEST, 1, TRUE);


//获取项目信息
$mProject = Factory::create ( "model::mProject" );
$cProject = $mProject->getProjectByDomain($_SERVER['SERVER_NAME']);
$GLOBALS['cProject'] = $cProject;
	
define('SMARTY_TPL_DIR', SLC_ROOT . "view/" . $cProject['template'] . "/html/");
define('STATIC_PATH', BASE_DOMAIN . "view/" . $cProject['template'] . "/");

include_once (SLC_ROOT . 'control/Base.php');
$url = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : "/index.php";
$control_file = SLC_ROOT . "control" . $url;
if(file_exists($control_file)){
	include_once($control_file);	//转到control层入理程序
} else {
	showmessage("file not exists");		//文件不存在
}
