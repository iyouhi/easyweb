<?php
class Article extends Base {
	private $mArticle;
	public function checkPara() {
		$this->para ['aid'] = $this->gpc->GetNum ( 'aid' );
		$this->mArticle = Factory::create ( "model::mArticle" );
		$this->mHomePosition = Factory::create ( "model::mHomePosition" );
		
		$this->para ['xwzxCid'] = 1;
		$this->para ['jypxCid'] = 3;
		$this->para ['zbzsCid'] = 4;
		return true;
	}
	public function action() {		
		$article = $this->mArticle->getWholeArticleByAids ( $this->para ['aid'] );
		$this->output ['article'] = $article = $article [$this->para ['aid']];
		//$this->output ['title'] = $article ['title'];

		//获取文章所属category
		$cateInfo = $this->mArticle->getCategoryByCid($this->output ['article']['cid']);
		$this->output['cateInfo'] = $cateInfo[$this->output ['article']['cid']];
		
		/****
		 * 获取页面基本信息
		 */
		$categories = $this->mArticle->getCategoryList();
		$category_on_header = array();
		$category_on_other = array();
		
		foreach ($categories as $k => $v) {
			if ($v['show_on_header']){
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
new Article ( 'article.html', 'smarty' );
