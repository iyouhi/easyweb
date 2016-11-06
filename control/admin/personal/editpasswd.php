<?php
include_once (SLC_ROOT . 'control/Base.php');
class EditPasswd extends Base{
    protected $need_login = 1;
	public function checkPara(){
		$this->para['oldpasswd'] = $this->gpc->PostString('oldpasswd');
		$this->para['newpasswd'] = $this->gpc->PostString('newpasswd');
		$this->para['repasswd'] = $this->gpc->PostString('repasswd');
		return true;
	}
	public function action(){
		if(!empty($this->para['oldpasswd']) && !empty($this->para['newpasswd']) && !empty($this->para['repasswd'])){
			if($this->para['newpasswd'] <> $this->para['repasswd']){
				$this->output['msg'] = "两次密码输入不一致";
				return false;
			}
			$userobj = Factory::create("model::mUser");
			$re = $userobj->changePasswd($this->para['cUserInfo']['uid'], $this->para['oldpasswd'], $this->para['newpasswd']);
			if($re === false){
				$this->output['msg'] = "修改失败";
				return false;
			}elseif($re === 'E0001'){
				$this->output['msg'] = "旧密码错误";
				return false;
			}			
			$this->output['msg'] = "修改成功";
			return true;
		}
			return true;
	}
}
new EditPasswd('admin/personal/editpasswd.html','smarty');
?>
