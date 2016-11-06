<?php
class ArticleList extends Base {
	private $mArticle;
	public function checkPara() {
		$this->para ['cid'] = $this->gpc->GetNum ( 'cid' );
		$this->para ['page'] = $this->gpc->GetNum ( 'page' );
		$this->para ['pagesize'] = $this->gpc->GetNum ( 'pagesize' );
		$this->para ['cid'] = $this->para ['cid'] ? $this->para ['cid'] : 1;
		$this->para ['page'] = $this->para ['page'] ? $this->para ['page'] : 1;
		$this->para ['pagesize'] = $this->para ['pagesize'] ? $this->para ['pagesize'] : 20;
		$this->mArticle = Factory::create ( "model::mArticle" );
		$this->mHomePosition = Factory::create ( "model::mHomePosition" );
		return true;
	}
	public function action() {
		
		$articleList = $this->mArticle->getArticleBycid ( $this->para ['cid'], '', 1, $this->para['page'], $this->para['pagesize'] );
		$cateInfo = $this->mArticle->getCategoryByCid($this->para['cid']);
		//如果是单页面分类
		if ($cateInfo[$this->para['cid']]['single_page'] && !empty($articleList)){
			header("location:/article.php?aid=".$articleList[0]['aid']);
			exit;			
		}
		$total = $this->mArticle->getArticleTotalNum(1, $this->para['cid']);
		$pageObj = Factory::create("tools::Page");
		$url = BASE_DOMAIN. "article/list.php?cid=" . $this->para['cid'];
		$pageinfo = $pageObj->getPageInfo($url, $total, $this->para['page'], $this->para['pagesize']);
		$this->output['pageinfo'] = $pageinfo;
		$this->output ['articleList'] = $articleList;
		$this->output['cateInfo'] = $cateInfo[$this->para['cid']]; 
		
		/****
		 * 获取页面基本信息
		 */
		$categories = $this->mArticle->getCategoryList();
		$category_on_header = array();
		$category_on_other = array();
		
		foreach ($categories as $k => $v) {
			if (isset($v['show_on_header']) && $v['show_on_header']){
				$category_on_header[$k] = $v;
			}
			if (isset($v['show_on_other']) && $v['show_on_other']){
				$category_on_other[$k] = $v;
			}
		}
		
		//获取header上的一级和二级分类
		$topcategory_on_header = array();
		$subcategory_on_header = array();
		foreach ($category_on_header as $k => $v) {
			if (!$v['pcid']){
				$topcategory_on_header[$k] = $v;
			} else {
				$subcategory_on_header[$v['pcid']][$k] = $v;
			}
		}
		
		//获取其它位置的一级和二级分类
		$topcategory_on_other = array();
		$subcategory_on_other = array();
		foreach ($category_on_other as $k => $v) {
			if (!$v['pcid']){
				$topcategory_on_other[$k] = $v;
			} else {
				$subcategory_on_other[$v['pcid']][$k] = $v;
			}
		}
		
		
		$this->output['category_on_header'] = $category_on_header;
		$this->output['category_on_other'] = $category_on_other;
		
		$this->output['topcategory_on_header'] = $topcategory_on_header;
		$this->output['subcategory_on_header'] = $subcategory_on_header;
		
		$this->output['topcategory_on_other'] = $topcategory_on_other;
		$this->output['subcategory_on_other'] = $subcategory_on_other;
		
		//获取轮播图片
		$slider_article = $this->mArticle->getArticleByRecmd(2);
		$this->output['slider_article'] = $slider_article;

		//获取首页位置列表
		$home_position = $this->mHomePosition->getHomePositionList();
		//var_dump($home_position);exit;
		$this->output['home_position'] = $home_position;
		
		/****
		 * 页面基本信息结束
		 */
		
		
		return true;
	}
}
new ArticleList ( 'list.html', 'smarty' );
?>