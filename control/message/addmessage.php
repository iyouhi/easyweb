<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class AddMessage extends Base {
	public function checkPara() {
		$this->para['author'] = $this->gpc->PostString('author');
		$this->para['content'] = $this->gpc->PostString('content');
		if(empty($this->para['content'])){
			showmessage("留言内容不能为空", BASE_DOMAIN . "message/messagelist.php");
		}
		return true;
	}
	public function action() {		
		$mMessage = Factory::create("model::mMessage");
		$re = $mMessage->add($this->para['author'], $this->para['content']);
		if($re){	
			showmessage("感谢您的留言，我们会尽快回复您", BASE_DOMAIN . "message/messagelist.php");
		}else{
			showmessage("留言失败", BASE_DOMAIN . "message/messagelist.php");
		}
		return true;
	}
}
new AddMessage ();

