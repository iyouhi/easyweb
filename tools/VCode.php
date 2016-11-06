<?php
class VCode
{
	/**
	 * 验证码图片宽度
	 *
	 */
	const IM_WIDTH = 50;

	/**
	 * 验证码图片高度
	 *
	 */
	const IM_HEIGHT = 20;

	/**
	 * 获取验证码数字
	 *
	 * @return string 返回验证
	 */
	public static function getVCode()
	{
		if(!isset($_SESSION))session_start();
		return @$_SESSION['VCODE'];
	}

	/**
	 * 生成随机验证码
	 *
	 * @return string 返回4位数字的验证码
	 */
	public static function setVCode()
	{
		if(!isset($_SESSION))session_start();
		$_SESSION['VCODE'] = strval(rand(1000, 9999));
		return $_SESSION['VCODE'];
	}

	/**
	 * 清除验证码session
	 *
	 * @return bool 清除是否成功
	 */
	public static function delVCode()
	{
		if(!isset($_SESSION))session_start();
		$_SESSION['VCODE'] = '';
		return !session_is_registered('VCODE');
	}

	/**
	 * 生成验证码图片
	 *
	 * @param bool $isNew 是否要重新获取新的验证码
	 * @return void
	 */
	public static function createVCode($isNew = false)
	{
		$nmsg = VCode::getVCode();
		if(!$nmsg || $isNew)
		{
			$nmsg = VCode::setVCode();
		}
		$im = @imagecreatetruecolor(VCode::IM_WIDTH, VCode::IM_HEIGHT) or die("建立图像失败");
		imagefill($im, 0, 0, imagecolorallocate($im, 255, 255, 255));
		imagerectangle($im, 0, 0, 49, 19, imagecolorallocate($im, 200, 200, 200));
		for ($i = 1; $i <= 100; $i++)
		{
			imagesetpixel($im, mt_rand(0, VCode::IM_WIDTH), mt_rand(0, VCode::IM_HEIGHT), imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255)));
		}
		imageline($im, 0, rand(0, 5), VCode::IM_WIDTH, rand(14, 19), imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255)));
		imageline($im, 0, rand(14, 19), VCode::IM_WIDTH, rand(0, 5), imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255)));
		$font_size=12;
		for($i=0;$i<strlen($nmsg);$i++)
		{
			$x = $i ===  0 ? rand(2, 5) : $x + $font_size-1 + rand(0, 1);
			$y = rand(1, 5);
			imagechar($im, $font_size, $x, $y, $nmsg[$i], imagecolorallocate($im, rand(50, 180), rand(50, 180), rand(50, 180)));
		}
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		header("Last-Modified: Sat, 26 Jul 1997 05:00:00 GMT", true, 200 );
		header("Content-type: image/png");
		imagegif($im);
		imagedestroy($im);
	}

	/**
	 * 检查验证码是否正确
	 *
	 * @param string $vcode 被验证的数据
	 * @return bool true 验证通过 OR false 验证失败
	 */
	public static function checkVCode($vcode)
	{
		$nmsg = VCode::getVCode();
		$result = $nmsg && $vcode && $nmsg == $vcode;
		return $result;
	}
}
?>
