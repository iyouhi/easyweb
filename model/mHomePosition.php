<?php
class mHomePosition{
	private $dHomePosition;
	private $mArticle;

	public function __construct() {
		$this->dHomePosition = Factory::create("data::dHomePosition");
		$this->mArticle = Factory::create("model::mArticle");
	}
	/**
	*获取首页位置列表
	*/
	public function getHomePositionList() {
		$home_positions = $this->dHomePosition->getHomePositionList();
		$cids = array();
		foreach ($home_positions as $v) {
			$cids[] = $v['cid'];
		}
		//获取首页各位置的分类信息	
		$category_info = array();
		$category_info = $this->mArticle->getCategoryByCid($cids);
		
		//每个分类下获取首页位置的10篇文章 
		$articles = array();
		foreach ($category_info as $cate) {
			$articles[$cate['cid']] = $this->mArticle->getArticleBycid($cate['cid'],1);
		}

		//格式化结果并返回
		$re = array();
		foreach ($home_positions as $value) {
			$re[$value['position_id']] = $value;
			$re[$value['position_id']]['category_info'] = $category_info[$value['cid']];
			$re[$value['position_id']]['articles'] = $articles[$value['cid']];
		}
		return $re;
	}

	/*
	*添加首页位置
	*/
	public function getHomePositionByIds($ids) {
		if (empty($ids) or !is_array($ids)) {
			return false;
		}
		//添加位置
		$home_positions = $this->dHomePosition->getHomePositionByIds($ids);
		$cids = array();
		foreach ($home_positions as $v) {
			$cids[] = $v['cid'];
		}
		//获取首页各位置的分类信息	
		$category_info = array();
		$category_info = $this->mArticle->getCategoryByCid($cids);
		//格式化结果并返回
		$re = array();
		foreach ($home_positions as $value) {
			$re[$value['position_id']] = $value;
			$re[$value['position_id']]['category_info'] = $category_info[$value['cid']];
		}
		return $re;
	}

	/*
	*添加首页位置
	*/
	public function addHomePosition($homePosition) {
		//添加位置
		$re = $this->dHomePosition->addHomePosition($homePosition);
		return $re;
	}
	/*
	*修改位置
	*/
	public function editHomePosition($id, $singlePage) {
		//修改位置
		$re = $this->dHomePosition->editHomePosition($id, $singlePage);
		return $re;
	}
	/*
	*删除位置
	*/
	public function delHomePosition($id) {
		if(empty($id))return false;
		$re = $this->dHomePosition->delHomePosition($id);
		return $re;
	}
}
?>