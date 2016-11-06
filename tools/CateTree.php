<?php
/**
* 通用的树型类，可以生成任何树型结构
*/
class CateTree
{
	/**
	* 生成树型结构所需要的2维数组
	* @var array
	*/
	var $arr = array();
	var $rearr = array();
	/**
	* 生成树型结构所需修饰符号，可以换成图片
	* @var array
	*/
	var $icon = array('│','├','└');

	/**
	* @access private
	*/
	var $ret = '';

	/**
	* 构造函数，初始化类
	* @param array 2维数组，例如：
	* array(
	*      1 => array('id'=>'1','pcid'=>0,'name'=>'一级栏目一'),
	*      2 => array('id'=>'2','pcid'=>0,'name'=>'一级栏目二'),
	*      3 => array('id'=>'3','pcid'=>1,'name'=>'二级栏目一'),
	*      4 => array('id'=>'4','pcid'=>1,'name'=>'二级栏目二'),
	*      5 => array('id'=>'5','pcid'=>2,'name'=>'二级栏目三'),
	*      6 => array('id'=>'6','pcid'=>3,'name'=>'三级栏目一'),
	*      7 => array('id'=>'7','pcid'=>3,'name'=>'三级栏目二')
	*      )
	*/
	function CateTree($arr=array(),$idstr='cid',$pidstr='pcid',$namestr='cname')
	{
       $this->arr = $arr;
	   $this->ret = "";
	   $this->idstr = $idstr;
	   $this->pidstr = $pidstr;
	   $this->namestr = $namestr;
	   return is_array($arr);
	}

    /**
	* 得到父级数组
	* @param int
	* @return array
	*/
	function get_parent($myid)
	{
		$newarr = array();
		if(!isset($this->arr[$myid])) return false;
		$pid = $this->arr[$myid][$this->pidstr];
		$pid = $this->arr[$pid][$this->pidstr];
		if(is_array($this->arr))
		{
			foreach($this->arr as $cid => $a)
			{
				if($a[$this->pidstr] == $pid) $newarr[$cid] = $a;
			}
		}
		return $newarr;
	}

    /**
	* 得到子级数组
	* @param int
	* @return array
	*/
	function getChild($myid)
	{
		$a = $newarr = array();
		if(is_array($this->arr))
		{
			foreach($this->arr as $cid => $a)
			{
				if($a[$this->pidstr] == $myid) $newarr[$cid] = $a;
			}
		}
		return $newarr ? $newarr : false;
	}

    /**
	* 得到当前位置数组
	* @param int
	* @return array
	*/
	function get_pos($myid,&$newarr)
	{
		$a = array();
		if(!isset($this->arr[$myid])) return false;
        $newarr[] = $this->arr[$myid];
		$pid = $this->arr[$myid][$this->pidstr];
		if(isset($this->arr[$pid]))
		{
		    $this->get_pos($pid,$newarr);
		}
		if(is_array($newarr))
		{
			krsort($newarr);
			foreach($newarr as $v)
			{
				$a[$v[$this->idstr]] = $v;
			}
		}
		return $a;
	}

    /**
	* 得到树型结构
	* @param int ID，表示获得这个ID下的所有子级
	* @param string 生成树型结构的基本代码，例如："<option value=\$cid \$selected>\$spacer\$name</option>"
	* @param int 被选中的ID，比如在做树型下拉框的时候需要用到
	* @return string
	*/
	function getTree($myid,$str,$sid=0,$adds='')
	{
		$number=1;
		$child = $this->getChild($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $cid=>$a)
			{
				$j=$k='';
				if($number==$total){
					$j .= $this->icon[2];
				}else{
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds.$j : '';
				$selected = $cid==$sid ? "selected" : '';
				@extract($a);
				eval("\$nstr = \"$str\";");
				//echo $nstr;		
				$this->ret .= $nstr;
				$this->getTree($cid,$str,$sid,$adds.$k.'&nbsp;');
				$number++;
			}
		}
		return $this->ret;
	}

	function getTreeArray($myid,$adds='')
	{
		$number=1;
		$child = $this->getChild($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $cid=>$a)
			{
				$j=$k='';
				if($number==$total){
					$j .= $this->icon[2];
				}else{
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds.$j : '';
				
				@extract($a);
				$this->rearr[$cid] = $a;
				$this->rearr[$cid][$this->namestr] = $spacer . $cname ;
			
				$this->getTreeArray($cid,$adds.$k.'&nbsp;');
				$number++;
			}
		}
		return $this->rearr;
	}

	function get_all_child($myid)
	{
		$childids = "";
		$child = $this->getChild($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $cid=>$a)
			{
				$childids .= $cid . ",";
				$str = "";
				$str = $this->get_all_child($cid);
				if($str <> "") $childids .= $str;
			}
		}
		return $childids;
	}
	function get_top_pcid($myid)
	{
		if($this->arr[$myid][$this->pidstr]<>0)
			$top_pcid = $this->get_top_pcid($this->arr[$myid][$this->pidstr]);
		else
			$top_pcid = $myid;
			return $top_pcid;
	}
	
}
?>