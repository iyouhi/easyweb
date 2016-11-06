<?php
include_once (dirname ( dirname ( __FILE__ ) ) . '/Base.php');
class FluxLog extends Base {
	private $mFlux;
	public function checkPara() {
		$this->para['url'] = $this->gpc->GetString('url');
		$this->mFlux = Factory::create("model::mFlux");
		return true;
	}
	public function action() {
		$fluxInfo['ip'] = ip2long(get_ip());	
		$fluxInfo['vtime'] = date("Y-m-d H:i:s", time());	
		$fluxInfo['script'] = $this->para['url'];
		$re = $this->mFlux->addFlux($fluxInfo); 
		var_dump($re);
		exit;
		return true;
	}
}
new FluxLog ( );
