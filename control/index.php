<?php
class Index extends Base {
	private $mProduct;
	public function checkPara() {
		$this->mProduct = Factory::create ( "model::mProject" );
		$this->mArticle = Factory::create ( "model::mArticle" );
		$this->mHomePosition = Factory::create ( "model::mHomePosition" );
		return true;
	}
	public function action() {
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
		$this->output['home_position'] = $home_position;

		return true;
	}
}
new Index ( 'index.html', 'smarty' );
