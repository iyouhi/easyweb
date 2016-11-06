<?php
class mMessage {
	private $dFlux;
	public function __construct() {
		$this->dMessage = Factory::create ( "data::dMessage" );
	}
	/*
	*获取消息列表
	*/
	public function getMessageList($page = 1, $pagesize = 10) {
		$page = $page ? $page : 1;
		$pagesize = $pagesize ? $pagesize : 10;
		$start = ($page - 1) * $pagesize;
		$messageList = $this->dMessage->getMessageList ( $start, $pagesize );
		return $messageList;
	}
	/*
	*获取消息总数
	*/
	public function getMessageCount() {
		$count = $this->dMessage->getMessageCount ();
		return $count;
	}
	/*
	*回复消息
	*/
	public function reply($id, $reply) {
		if ( empty ( $id )) {
			return FALSE;
		}
		$re = $this->dMessage->reply ( $id, $reply );
		return $re;
	}
	/*
	 *删除消息 
	 */
	public function delete($messageid){
		$re = $this->dMessage->delete($messageid);
		return TRUE;
	}
	/*
	 *添加消息 
	 */
	public function add($author="",$content=""){
		if(empty($content))return false;
		$messageinfo = array(
			"author" => $author,
			"content" => str_replace(array('\r\n','\n',"'"),"",$content),
			"add_time" => date("Y-m-d H:i:s", time()),
			"ip" => ip2long(get_ip()),
		);
		$re = $this->dMessage->add($messageinfo);
		return $re;
	}
}

