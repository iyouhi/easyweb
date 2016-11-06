<?php
class VCode
{
	/**
	 * ��֤��ͼƬ���
	 *
	 */
	const IM_WIDTH = 50;

	/**
	 * ��֤��ͼƬ�߶�
	 *
	 */
	const IM_HEIGHT = 20;

	/**
	 * ��ȡ��֤������
	 *
	 * @return string ������֤
	 */
	public static function getVCode()
	{
		if(!isset($_SESSION))session_start();
		return @$_SESSION['VCODE'];
	}

	/**
	 * ���������֤��
	 *
	 * @return string ����4λ���ֵ���֤��
	 */
	public static function setVCode()
	{
		if(!isset($_SESSION))session_start();
		$_SESSION['VCODE'] = strval(rand(1000, 9999));
		return $_SESSION['VCODE'];
	}

	/**
	 * �����֤��session
	 *
	 * @return bool ����Ƿ�ɹ�
	 */
	public static function delVCode()
	{
		if(!isset($_SESSION))session_start();
		$_SESSION['VCODE'] = '';
		return !session_is_registered('VCODE');
	}

	/**
	 * ������֤��ͼƬ
	 *
	 * @param bool $isNew �Ƿ�Ҫ���»�ȡ�µ���֤��
	 * @return void
	 */
	public static function createVCode($isNew = false)
	{
		$nmsg = VCode::getVCode();
		if(!$nmsg || $isNew)
		{
			$nmsg = VCode::setVCode();
		}
		$im = @imagecreatetruecolor(VCode::IM_WIDTH, VCode::IM_HEIGHT) or die("����ͼ��ʧ��");
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
	 * �����֤���Ƿ���ȷ
	 *
	 * @param string $vcode ����֤������
	 * @return bool true ��֤ͨ�� OR false ��֤ʧ��
	 */
	public static function checkVCode($vcode)
	{
		$nmsg = VCode::getVCode();
		$result = $nmsg && $vcode && $nmsg == $vcode;
		return $result;
	}
}
?>
