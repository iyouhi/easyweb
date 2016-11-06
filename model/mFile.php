<?php
class mFile {
	//允许上传的类型
	protected $f_type = "txt|gif|png|jpg|doc|docx|pdf|xsl|xslx|ppt|pptx|zip|rar";
	//是否允许覆盖相同文件,1:允许,0:不允许 
	protected $overwrite = 0;
	//限制单个文件上传最大容量
	protected $file_size_max = 20971520;
	//存储文件路径
	protected $file_dir = UPLOAD_DIR;
	public function setDir($filePath){
		$this->file_dir = $filePath;
		return true;	
	}
	/*
	*上传文件
	*/
	public function upload($file, &$re = array()) {
		$re ['msg'] = '';
		if (! is_dir ( $this->file_dir )) {
			$re ['msg'] .= '目录配置错误';
			return false;
		}
		$f_input = "Files"; //设置上传域名称
		
		foreach ( $file [$f_input] ["error"] as $key => $error ) {
			$up_error = false;
			if ($error == UPLOAD_ERR_OK) {
				//获取上传源文件名
				$f_name = $file [$f_input] ['name'] [$key];
				$tmp_type = substr ( strrchr ( $f_name, "." ), 1 ); //获取文件扩展名
				$tmp_type = strtolower ( $tmp_type );
				if (! stristr ( $this->f_type, $tmp_type )) {
					$re ['msg'] .= "对不起,不能上传" . $tmp_type . "格式文件, " . $f_name . " 文件上传失败!";
					$up_error = true;
				}
				if ($file [$f_input] ['size'] [$key] > $this->file_size_max) {
					$re ['msg'] .= "对不起,你上传的文件 " . $f_name . " 容量为" . round ( $file [$f_input] ['size'] [$key] / 1024 ) . "Kb,大于规定的" . ($this->file_size_max / 1024) . "Kb,上传失败!";
					$up_error = true;
				}
				$string = 'abcdefghijklmnopgrstuvwxyz0123456789';
				$rand = '';
				for($x = 0; $x < 12; $x ++)
					$rand .= substr ( $string, mt_rand ( 0, strlen ( $string ) - 1 ), 1 );
				$t = date ( "ymdHis" ) . $rand;
				$attdir = $this->file_dir;
				$uploadfile = $attdir . $t . "." . $tmp_type;
				if (file_exists ( $uploadfile ) && ! $this->overwrite) {
					echo "<script>alert('对不起,文件 " . $f_name . " 已经存在,上传失败!')</script>";
					$up_error = true;
				}
				if (($up_error === false) and (move_uploaded_file ( $file [$f_input] ['tmp_name'] [$key], $uploadfile ))) {
					$re ['msg'] .= $f_name . '上传成功';
					$re ['filename'] = $uploadfile;
				} else {
					$result = copy ( $file [$f_input] ['tmp_name'] [$key], $uploadfile );
					if($result){
						$re ['msg'] .= $f_name . '上传成功';
						$re ['filename'] = $uploadfile;
					}else{
						$re ['msg'] .= $f_name . '上传失败';
					}
				}
			}
		
		}
		return true;
	}

}
?>
