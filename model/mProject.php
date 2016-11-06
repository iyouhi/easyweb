<?php
class mProject {
	private $dProject;
	public function __construct() {
		$this->dProject = Factory::create ( "data::dProject" );
	}
	/**
	 * 
	 * 获取项目列表
	 * @param int $uid
	 * @param int $page
	 * @param int $pagesize
	 */
	 
	public function getProjectListByUid($uid, $page = 1, $pagesize = 10) {
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$re = array();
		$projectList = $this->dProject->getProjectListByUid ( $uid, $start, $pagesize );
		foreach ( $projectList as $v ) {
			$v['logo'] = (strpos($v['logo'] , 'http')===0) ? $v['logo'] : UPLOAD_DOMAIN_PATH . $v['logo']; 
			$re [$v ['pid']] = $v;
		}
		return $re;
	}
	
	/**
	 * 
	 * 获取项目总数
	 * @param int $uid
	 */
	public function getProjectTotalNumByUid($uid) {
		return $this->dProject->getProjectTotalNumByUid ($uid);
	}
	/**
	 * 
	 * 添加项目
	 * @param array $project
	 */
	public function addProject($project) {
		if (!isset($project['uid'])){
			$project['uid'] = $_SESSION['admin']['uid'];
		}
		//检查参数
		$ch = $this->checkParaForProject ( $project );
		if ($ch !== true)
			return $ch;
		//转义
		$project['description'] = empty($project['description']) ? "" : str_replace ( array ("\r\n", "\n", "\r"), '', $project['description']);
		$project['contact'] = empty($project['contact']) ? "" : str_replace ( array ("\r\n", "\n", "\r"), '', $project['contact']);
		//添加项目
		$pid = $this->dProject->addProject ( $project );
		return $pid;
	}
	/**
	 * 
	 * 修改项目
	 * @param int $pid
	 * @param array $project
	 * @param unknown_type $content
	 */
	public function editProject($pid, $project) {
		if (!isset($project['uid'])){
			$project['uid'] = $_SESSION['admin']['uid'];
		}
		//检查参数
		$ch = $this->checkParaForProject ( $project );
		if ($ch !== true)
			return $ch;

		//转义
		$project['description'] = empty($project['description']) ? "" : str_replace ( array ("\r\n", "\n", "\r"), '', $project['description']);
		$project['contact'] = empty($project['contact']) ? "" : str_replace ( array ("\r\n", "\n", "\r"), '', $project['contact']);
		//var_dump($project);exit;
		//添加项目
		$re = $this->dProject->editProject ( $pid, $project );
		return $re;
	}
	/**
	 * 
	 * 检查添加项目时的参数是否正确
	 * @param array $project
	 */
	public function checkParaForProject(&$project) {
		if (! is_array ( $project ) || empty ( $project ))
			return false;
		if (! isset ( $project ['title'] ) || empty ( $project ['title'] )) {
			return array ('code' => 'PE0003', 'msg' => '项目标题错误' );
		}
		if (! isset ( $project ['uid'] ) || empty ( $project ['uid'] )) {
			return array ('code' => 'PE0004', 'msg' => '项目uid错误' );
		}
		return true;
	}
	/**
	 *删除项目
	 */
	public function delProject($pid) {
		if (empty ( $pid ))
			return false;
			//删除项目
		$re = $this->dProject->delProject ( $pid );
		if (! $re)
			return false;
		return true;
	}
	/**
	 *根据项目id获取项目信息
	 */
	public function getProjectByPids($pids) {
		if (empty ( $pids ))
			return false;
		if (is_numeric ( $pids ))
			$pids = array ($pids );
		$project = $this->dProject->getProjectByPids ( $pids );
		$rearray = array ();
		foreach ( $project as $v ) {
			$v['logo'] = (strpos($v['logo'] , 'http')===0) ? $v['logo'] : UPLOAD_DOMAIN_PATH . $v['logo']; 
			$rearray [$v ['pid']] = $v;
		}
		unset ( $project );
		return $rearray;
	}
	/**
	 * 
	 * 根据项目domain获取项目信息
	 * @param string $domain
	 */
	public function getProjectByDomain($domain) {
		if (empty ( $domain ))
			return false;
		$project = $this->dProject->getProjectByDomain( $domain );
		$project['logo'] = (strpos($project['logo'] , 'http')===0) ? $project['logo'] : UPLOAD_DOMAIN_PATH . $project['logo']; 
		return $project;
	}
}
