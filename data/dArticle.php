<?php
include_once SLC_ROOT . 'data/dBase.php';
class dArticle extends dBase{
	/*
	*获取内容列表
	*/
	public function getArticleList($status, $start=0,$offset=10) {
		$sql = "SELECT * FROM `article` WHERE `status`='$status' AND `pid`={$GLOBALS['cProject']['pid']} ORDER BY `aid` LIMIT $start, $offset";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取文章总数
	*/
	public function getArticleTotalNum($status, $cid = ''){
		$sql = "SELECT COUNT(*) FROM `article` WHERE `status`='$status' AND `pid`={$GLOBALS['cProject']['pid']}";
		if($cid){			
			$sql .= " AND `cid`='$cid'";
		}
		$re = $this->db->result_first($sql);
		return intval($re);
	}
	/*
	*根据aid获取文章
	*/
	public function getArticleByAids($aids) {
		if(!is_array($aids)) return false;
		$qstr = join(",", $aids);
		$sql = "SELECT * FROM `article` WHERE `aid` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*根据aid获取文章内容
	*/
	public function getArticleContentByAids($aids) {
		if(!is_array($aids)) return false;
		$qstr = join(",", $aids);
		$sql = "SELECT * FROM `article_content` WHERE `aid` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取分类列表
	*/
	public function getCategoryList() {
		$sql = "SELECT * FROM `article_category` WHERE `pid`={$GLOBALS['cProject']['pid']} ORDER BY `cid`";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取分类列表
	*/
	public function getCategoryByCid($cids) {
		if(!is_array($cids)) return false;
		$qstr = join(",", $cids);
		$sql = "SELECT * FROM `article_category` WHERE `cid` IN ($qstr)";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*添加分类
	*/
	public function addCategory($cate){
		if (!isset($cate['pid'])){
			$cate['pid'] = $GLOBALS['cProject']['pid'];
		}
		
		$sql1 = $sql2 = $s = '';
		foreach($cate as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql = "INSERT INTO `article_category` ($sql1) VALUES ($sql2)";
		$this->db->query($sql);
		return true;
	}
	/*
	*修改分类
	*/
	public function editCategory($cid, $cate){
		if (!isset($cate['pid'])){
			$cate['pid'] = $GLOBALS['cProject']['pid'];
		}
		$sqlstr = $s = '';
		foreach($cate as $key=>$value)
		{
			$sqlstr .= $s.$key."='" . $value . "'";
			$s = ',';
		}
		$sql="UPDATE `article_category` SET $sqlstr WHERE cid = $cid";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;
	}
	/*
	*删除分类
	*/
	public function delCategory($cid){
		$sql = "DELETE FROM `article_category` WHERE `cid`='$cid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*删除文章
	*/
	public function delArticle($aid){
		$sql = "DELETE FROM `article` WHERE `aid`='$aid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*删除文章内容
	*/
	public function delArticleContent($aid){
		$sql = "DELETE FROM `article_content` WHERE `aid`='$aid'";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*是否有子分类
	*/
	public function isParentCategory($cid){
		$sql = "SELECT COUNT(*) FROM `article_category` WHERE `pcid`='$cid'";
		$re = $this->db->result_first($sql);
		return intval($re);
	}
	/*
	*添加文章
	*/
	public function addArticle($article){
		if (!isset($article['pid'])){
			$article['pid'] = $GLOBALS['cProject']['pid'];
		}
		$sql1 = $sql2 = $s = '';
		foreach($article as $key=>$value)
		{
			$sql1 .= $s . '`' . $key . '`';
			$sql2 .= $s . "'" . $value . "'";
			$s = ',';
		}
		$sql1 .= ",`atime`,`etime`";
		$time = date('Y-m-d H:i:s', time());
		$sql2 .= ",'" . $time . "', '" . $time . "'" ;
		$sql = "INSERT INTO `article` ($sql1) VALUES ($sql2)";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return $this->db->insert_id();
	}
	/*
	*添加文章内容
	*/
	public function addArticleContent($aid, $content){
		$sql = "INSERT INTO `article_content` (`aid`, `content`) VALUES ('$aid', '$content')";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*修改文章
	*/
	public function editArticle($aid, $article){
		if (!isset($article['pid'])){
			$article['pid'] = $GLOBALS['cProject']['pid'];
		}
		$sqlstr = $s = '';
		foreach($article as $key=>$value)
		{
			$sqlstr .= $s.$key."='".$value."'";
			$s = ',';
		}
		$sqlstr .=", etime = '" . date('Y-m-d H:i:s', time()) . "'";
		$sql="UPDATE `article` SET $sqlstr WHERE aid = $aid";
		$re = $this->db->query($sql);
		if(!$re)return false;
		return true;
	}
	/*
	*修改文章内容
	*/
	public function editArticleContent($aid, $content){
		$sql = "REPLACE INTO `article_content` (`aid`, `content`) VALUES ('" . $aid. "', '" . $content . "')";
		$re = $this->db->query($sql);
		return $re;
	}
	/*
	*获取分类下的文章数
	*/
	public function getArticleNumBycid($cid){
		$sql = "SELECT COUNT(*) FROM `article` WHERE `cid`='$cid'";
		$re = $this->db->result_first($sql);
		return intval($re);
	}
	/*
	*获取分类下的文章
	*/
	public function getArticleBycid($cids,$recmd=0,$status=1,$start=0,$offset=10){
		if(empty($cids) || !is_array($cids))return false;
		$cidstr = join(",",$cids);
		if($recmd === ''){
			$sql = "SELECT * FROM `article` WHERE `status`='$status' AND `cid` IN ($cidstr) ORDER BY `aid` LIMIT $start, $offset";
		}else{
			$sql = "SELECT * FROM `article` WHERE `status`='$status' AND `recmd`='$recmd' AND `cid` IN ($cidstr) ORDER BY `aid` LIMIT $start, $offset";
		}
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取推荐位文章
	*/
	public function getArticleByRecmd($pos=1,$count=5,$order='etime') {
		$sql = "SELECT * FROM `article` WHERE `pid`={$GLOBALS['cProject']['pid']} AND `status`=1 AND `recmd`='$pos' ORDER BY `$order` DESC";
		$re = $this->getData($sql);
		return $re;
	}
	/*
	*获取单级页面文章内容
	*/
	public function getSinglePageAidByCid($cid) {
		$sql = "SELECT aid FROM `article` WHERE `cid`='$cid'";
		$re = $this->db->result_first($sql);
		return intval($re);
	}
}
?>