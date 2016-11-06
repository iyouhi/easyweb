<?php
/**
 * 获取输入统一入口
 * @author wentian<wentian@staff.sina.com.cn>
 */
class Request
{
    private  $getdata;    //存储get的数据
    
    private  $postdata;   //存储post的数据
    
    private  $filedata;   //存储file数据
    
    private  $cookiedata; //存储cookie
    
    static 	 $_instance;  //本类的实例
    
    private function __construct()
    {
    	//控制层调整完后，将开启下边的注释，将$_GET,$_POST,$_FILES,$_COOKIE进行销毁
        $this->getdata    = self::formatData($_GET);
        //$_GET = array();
        $this->postdata   = self::formatData($_POST);
        //$_POST = array();
        $this->filedata   = self::formatData($_FILES);
        //$_FILES = array();
       	$this->cookiedata = self::formatData($_COOKIE);
        //$_COOKIE = array();
    }
    
	public static function getInstance() {
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
    
    /**
	 * 获取GET传递过来的数值变量
	 *
	 * @param string $key
	 * @return int or big int
	 */
	public	function GetNum($key)
	{
		if(!isset($this->getdata[$key]))return false;
		return $this->toNum($this->getdata[$key]);
	}
	
	/**
	 * 获取POST传递过来的数值变量
	 *
	 * @param string $key
	 * @return int or big int
	 */
	public	function PostNum($key)
	{
		if(!isset($this->postdata[$key]))return false;
		return $this->toNum($this->postdata[$key]);
	}
	
	/**
	 * 获取GET传递过来的字符串变量
	 *
	 * @param string $key
	 * @param boolen $isfilter 是否过滤
	 * @return string
	 */
	public	function GetString($key,$isfilter=true)
	{
		if(!isset($this->getdata[$key]))return false;
		if($isfilter){
			return $this->filterString($this->getdata[$key]);
		}else {
			return $this->getdata[$key];
		}
	}
	
	/**
	 * 获取POST传递过来的字符串变量
	 *
	 * @param string $key
	 * @param boolen $isfilter 是否过滤
	 * @return string
	 */
	public	function PostString($key,$isfilter=true)
	{
		if(!isset($this->postdata[$key]))return false;
		if($isfilter)
		{
			return $this->filterString($this->postdata[$key]);
		}else {
			return $this->postdata[$key];
		}
	}
	/*
	*获取get数组
	*/
	public	function GetArray($key,$isfilter=true)
	{
		if(!isset($this->getdata[$key]))return false;
		if($isfilter)
		{
			return $this->filterArray($this->getdata[$key]);
		}else {
			return $this->getdata[$key];
		}
	}
	/*
	*获取post数组
	*/
	public	function PostArray($key,$isfilter=true)
	{
		if(!isset($this->postdata[$key]))return false;
		if($isfilter)
		{
			return $this->filterArray($this->postdata[$key]);
		}else {
			return $this->postdata[$key];
		}
	}
	/**
	 * 获取GET传递过来的字符串变量
	 *
	 * @param string $key
	 * @param boolen $isfilter 是否过滤
	 * @return string
	 */
	public	function GetCookieString($key,$isfilter=true)
	{
		if(!isset($this->cookiedata[$key]))return false;
		if($isfilter){
			return $this->filterString($this->cookiedata[$key]);
		}else {
			return $this->cookiedata[$key];
		}
	}
	
	/**
	 * 格式化数据,将数据转存
	 *
	 * @param array $data
	 */
	private	function formatData($data)
	{
		$result = array();
        reset($data);
        while(list($key, $value) = each($data))
        {
            $result[$key] = $value;
        }
        return $result;
	}
	/**
	 * 转换为数字
	 *
	 * @param string $num
	 * @return int or big int or false
	 */
	private function toNum($num)
	{
		if(is_numeric($num))
		{
			return intval($num);
		}else{
			return false;
		}
	}
	/**
	 * 转换过滤字符串
	 *
	 * @param string $string
	 * @return string
	 */
	private function filterString($string)
	{
		if($string===NULL)
		{
			return false;
		}
		return trim($string);
	}

	/**
	 * 转换过滤字符串
	 *
	 * @param string $string
	 * @return string
	 */
	private function filterArray($arr)
	{
		if(!is_array($arr))
		{
			return false;
		}
		foreach($arr as &$v){
			if(is_string($v)){
				$v = trim($v);
			}elseif(is_numeric($v)){
				$v = intval($v);	
			}
		}
		return $arr;
	}
}
?>