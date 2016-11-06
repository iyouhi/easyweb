<?php
function daddslashes($string, $force = 0, $strip = FALSE) {
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}

function getgpc($k, $var='R') {
	switch($var) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
	}
	return isset($var[$k]) ? $var[$k] : NULL;
}

function set_cookie($var, $value = '', $time = 0)
{
	$time = $time > 0 ? $time : ($value == '' ? PHP_TIME - 3600 : 0);
	$s = $_SERVER['SERVER_PORT'] == '443' ? 1 : 0;
	$var = COOKIE_PRE.$var;
	$_COOKIE[$var] = $value;
	if(is_array($value))
	{
		foreach($value as $k=>$v)
		{
			setcookie($var.'['.$k.']', $v, $time, COOKIE_PATH, COOKIE_DOMAIN, $s);
		}
	}
	else
	{
		setcookie($var, $value, $time, COOKIE_PATH, COOKIE_DOMAIN, $s);
	}
}

function get_cookie($var)
{
	$var = COOKIE_PRE.$var;
	return isset($_COOKIE[$var]) ? $_COOKIE[$var] : false;
}

function showmessage($msg, $url_forward='goback', $type=1, $ms=1250) {
	if($type){
		$templatefile = SMARTY_TPL_DIR . 'admin/showmessage.tpl.php';
	}else{
		$templatefile = SMARTY_TPL_DIR . 'showmessage.tpl.php';
	}
	include $templatefile;
    exit;
}

//获取在线IP
function get_ip($format=0) {
	
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$onlineip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$onlineip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$onlineip = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
	$tmpip = $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';
	
	if($format) {
		$ips = explode('.', $tmpip);
		for($i=0;$i<3;$i++) {
			$ips[$i] = intval($ips[$i]);
		}
		return sprintf('%03d%03d%03d', $ips[0], $ips[1], $ips[2]);
	} else {
		return $tmpip;
	}
}



