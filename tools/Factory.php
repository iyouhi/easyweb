<?php
class Factory {
	public static function create($classname) {
		$mpobject = self::createClass($classname);
		return $mpobject;
	}
	public static function createClass($str) {
		$ar = explode("::", $str);
		$class = array_pop($ar);
		if(!class_exists($class)) {
			$path = SLC_ROOT.implode('/', $ar).'/';
			$file = $path.$class.'.php';
			if(file_exists($file)){
				include_once($file);
			}else{
				exit("Class file [$file] not exists");
			}
		}
		if(!class_exists($class)) {
			return false;
		}
		$obj = new $class;
		return $obj;
	}
	
}
?>