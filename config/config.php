<?php
//site commen config
define('BASE_DOMAIN', "http://" . $_SERVER['SERVER_NAME'] . "/");
define('ADMIN_DOMAIN', "admin.iyouhi.com");
define('IMG_DOMAIN', "http://www.njc.com.cn/");
define('CHARSET', 'utf-8'); //
//smart config
//define('SMARTY_TPL_DIR', SLC_ROOT . "view/");
define('UPLOAD_DIR', SLC_ROOT . "userfiles/");
define('UPLOAD_DOMAIN_PATH', BASE_DOMAIN . "userfiles/")
;
//define('CSS_PATH', BASE_DOMAIN . "view/template/public/css/");
//define('JS_PATH', BASE_DOMAIN . "view/template/public/js/");
//define('IMG_PATH', BASE_DOMAIN . "view/template/public/images/");

define('ADMIN_CSS_PATH', BASE_DOMAIN . "view/template/admin/public/css/");
define('ADMIN_JS_PATH', BASE_DOMAIN . "view/template/admin/public/js/");
define('ADMIN_IMG_PATH', BASE_DOMAIN . "view/template/admin/public/images/");

define('AUTH_KEY', 'vMgGBOomLbTVoSPlCNQy'); //Cookie
define('PASSWORD_KEY','');					//

//Cookie
define('COOKIE_DOMAIN', ''); //Cookie 
define('COOKIE_PATH', '/'); //Cookie 
define('COOKIE_PRE', 'SKgAyyKvVQ'); //Cookie 
define('COOKIE_TTL', 0); //Cookie 

/***********************************************************************/

?>
