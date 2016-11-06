<?php
class mArticle {
	private $dArticle;
	public function __construct() {
		$this->dArticle = Factory::create ( "data::dArticle" );
	}
	/*
	*获取文章列表
	*/
	public function getArticleList($status, $page = 1, $pagesize = 10) {
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$articleList = $this->dArticle->getArticleList ( $status, $start, $pagesize );
		return $articleList;
	}
	/*
	*获取文章总数
	*/
	public function getArticleTotalNum($status, $cid = '') {
		return $this->dArticle->getArticleTotalNum ( $status , $cid);
	}
	/*
	*获取分类列表
	*/
	public function getCategoryList() {
		$categoryList = $this->dArticle->getCategoryList ();
		$re = array ();
		foreach ( $categoryList as $v ) {
			$re [$v ['cid']] = $v;
		}
		return $re;
	}
	/*
	*根据分类id获取分类信息, 支持批量
	*/
	public function getCategoryByCid($cid) {
		if (empty($cid)){
			return array();
		}
		if (! is_array ( $cid )){
			$cid = array ($cid );
		}
		$categoryList = $this->dArticle->getCategoryByCid ( $cid );
		$re = array ();
		foreach ( $categoryList as $v ) {
			$re [$v ['cid']] = $v;
		}
		return $re;
	}
	/*
	*添加分类
	*/
	public function addCategory($cate) {
		//检查参数
		$ch = $this->checkParaForCategory ( $cate );
		if ($ch !== true)
			return $ch;
			//添加分类
		$re = $this->dArticle->addCategory ( $cate );
		return $re;
	}
	/*
	*修改分类
	*/
	public function editCategory($cid, $cate) {
		//检查参数
		$ch = $this->checkParaForCategory ( $cate );
		if ($ch !== true)
			return $ch;
			//添加分类
		$re = $this->dArticle->editCategory ( $cid, $cate );
		return $re;
	}
	/*
	*检查添加分类时的参数是否正确
	*/
	public function checkParaForCategory(&$cate) {
		if (! is_array ( $cate ) || empty ( $cate ))
			return false;
		if (! isset ( $cate ['cname'] ) || empty ( $cate ['cname'] )) {
			return array ('code' => 'PE0001', 'msg' => '分类名称错误' );
		}
		if (! isset ( $cate ['cdir'] ) || empty ( $cate ['cdir'] )) {
			return array ('code' => 'PE0002', 'msg' => '分类目录错误' );
		}
		if (! isset ( $cate ['single_page'] ) || ! in_array ( $cate ['single_page'], array (0, 1 ) )) {
			$cate ['single_page'] = 0;
		}
		if (! isset ( $cate ['pcid'] ) || ! is_numeric ( $cate ['pcid'] )) {
			$cate ['pcid'] = 0;
		}
		return true;
	}
	/*
	*删除分类
	*/
	public function delCategory($cid) {
		if (empty ( $cid ))
			return false;
		$haveChild = $this->dArticle->isParentCategory ( $cid );
		if ($haveChild)
			return array ('code' => 'NE0001', 'msg' => '此分类下有子分类,请先删除子分类' );
			//删除分类
		$re = $this->dArticle->delCategory ( $cid );
		return $re;
	}
	/*
	*添加文章
	*/
	public function addArticle($article, $content) {
		//检查参数
		$ch = $this->checkParaForArticle ( $article );
		if ($ch !== true)
			return $ch;
		$content = empty ( $content ) ? "" : $content;
		$content = str_replace ( array ("\r\n", "\n", "\r"), '', $content );
		//添加文章
		$aid = $this->dArticle->addArticle ( $article );
		if (! $aid)
			return false;
			//添加文章内容
		$re = $this->dArticle->addArticleContent ( $aid, $content );
		return $re;
	}
	/*
	*修改文章
	*/
	public function editArticle($aid, $article, $content) {
		//检查参数
		$ch = $this->checkParaForArticle ( $article );
		if ($ch !== true)
			return $ch;
		$content = empty ( $content ) ? "" : $content;
		$content = str_replace ( array ("\r\n", "\n", "\r"), '', $content);
		//添加文章
		$re = $this->dArticle->editArticle ( $aid, $article );
		if (! $re)
			return false;
			//添加文章内容
		$re = $this->dArticle->editArticleContent ( $aid, $content );
		return $re;
	}
	/*
	*检查添加文章时的参数是否正确
	*/
	public function checkParaForArticle(&$article) {
		if (! is_array ( $article ) || empty ( $article ))
			return false;
		if (! isset ( $article ['title'] ) || empty ( $article ['title'] )) {
			return array ('code' => 'PE0003', 'msg' => '文章标题错误' );
		}
		if (! isset ( $article ['cid'] ) || empty ( $article ['cid'] )) {
			$article ['cid'] = 1;
		}
		if (! isset ( $article ['author'] ) || empty ( $article ['author'] )) {
			$article ['author'] = $_SESSION ['admin'] ['name'];
		}
		return true;
	}
	/*
	*删除文章
	*/
	public function delArticle($aid) {
		if (empty ( $aid ))
			return false;
			//删除文章
		$re = $this->dArticle->delArticle ( $aid );
		if ($re) {
			$re = $this->dArticle->delArticleContent ( $aid ); //删除文章内容
			if (! $re)
				return false;
		} else {
			return false;
		}
		return true;
	}
	/*
	*根据文章id获取文章全内容
	*/
	public function getWholeArticleByAids($aids) {
		if (empty ( $aids ))
			return false;
		if (is_numeric ( $aids ))
			$aids = array ($aids );
			//获取文章信息
		$article = $this->getArticleByAids ( $aids );
		//获取文章内容
		$articleContent = $this->getArticleContentByAids ( $aids );
		//var_dump($article,$articleContent);exit;
		foreach ( $article as $k => $v ) {
			$article [$k] ['content'] = str_replace ( array ("\r\n", "\n", "\r" ), '', $articleContent [$k] ['content'] );
		}
		unset ( $articleContent );
		return $article;
	}
	/*
	*根据文章id获取文章信息
	*/
	public function getArticleByAids($aids) {
		if (empty ( $aids ))
			return false;
		if (is_numeric ( $aids ))
			$aids = array ($aids );
		$article = $this->dArticle->getArticleByAids ( $aids );
		$rearray = array ();
		foreach ( $article as $v ) {
			$v['pic'] = (strpos($v['pic'] , 'http')===0) ? $v['pic'] : UPLOAD_DOMAIN_PATH . $v['pic'];  
			$v['slide_pic'] = (strpos($v['slide_pic'] , 'http')===0) ? $v['slide_pic'] : UPLOAD_DOMAIN_PATH . $v['slide_pic'];  
			$rearray [$v ['aid']] = $v;
		}
		unset ( $article );
		return $rearray;
	}
	/*
	*根据文章id获取文章内容
	*/
	public function getArticleContentByAids($aids) {
		if (empty ( $aids ))
			return false;
		if (is_numeric ( $aids ))
			$aids = array ($aids );
		$content = $this->dArticle->getArticleContentByAids ( $aids );
		$rearray = array ();
		foreach ( $content as $v ) {
			$rearray [$v ['aid']] = $v;
		}
		unset ( $content );
		return $rearray;
	}
	/*
	*获取分类下的文章数
	*/
	public function getArticleNumBycid($cid) {
		if (empty ( $cid ))
			return false;
		$num = $this->dArticle->getArticleNumBycid ( $cid );
		return $num;
	}
	/*
	*获取分类下的文章
	*/
	public function getArticleBycid($cid, $pos = 0, $status = 1, $page = 1, $pagesize = 10) {
		if (empty ( $cid ))
			return false;
		if (! is_array ( $cid ))
			$cid = array ($cid );
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$articleList = $this->dArticle->getArticleBycid ( $cid, $pos, $status, $start, $pagesize );
		foreach ($articleList as $key => &$article) {
			$article['pic'] = (strpos($article['pic'] , 'http')===0) ? $article['pic'] : UPLOAD_DOMAIN_PATH . $article['pic'];  
		}
		return $articleList;
	}
	/*
	*获取指定推荐的文章
	*/
	public function getArticleByRecmd($pos = 1, $count = 5, $order = 'etime') {
		$articleList = $this->dArticle->getArticleByRecmd ( $pos, $count, $order );
		foreach ($articleList as $key => &$article) {
			$article['pic'] = (strpos($article['pic'] , 'http')===0) ? $article['pic'] : UPLOAD_DOMAIN_PATH . $article['pic'];  
			$article['slide_pic'] = (strpos($article['slide_pic'] , 'http')===0) ? $article['slide_pic'] : UPLOAD_DOMAIN_PATH . $article['slide_pic']; 
		}
		return $articleList;
	}
	
//	/*
//	*获取单级页面文章内容
//	*/
//	public function getSinglePageAidByCid($cid) {
//		if(empty($cid))return false;
//		$aid = $this->dArticle->getSinglePageAidByCid($cid);
//		return $aid;
//	}

	public function getCateTree($cid){
		$categoryList = $this->getCategoryList();
		$cateTree = Factory::create("tools::CateTree");
		$cateTree->CateTree($categoryList);
		$str = "<option value=\$cid \$selected>\$spacer\$cname</option>";
		$category = $cateTree->getTree(0,$str, $cid);
		return $category;
	}


}

