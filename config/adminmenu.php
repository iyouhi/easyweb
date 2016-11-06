<?php
$menuCate = array(
	1 => array(
		'caption' => '我的项目',
		'menu' => array(72),
	),
	2 => array(
		'caption' => '内容管理',
		'menu' => array(32,31,30),
	),
	3 => array(
		'caption' => '帐号管理',
		'menu' => array(60),
	),
	/*
	1 => array(
		'caption' => '用户管理',
		'menu' => array(10,11),
	),
	2 => array(
		'caption' => '单页面管理',
		'menu' => array(20,21),
	),
	4 => array(
		'caption' => '留言板管理',
		'menu' => array(40),
	),
	5 => array(
		'caption' => '访问量统计',
		'menu' => array(50),
	),
	7 => array(
		'caption' => '下载管理',
		'menu' => array(70,71),
	),
	*/

);
$menuList = array(
	//用户管理
	10 => array(
		'title'	=>	'用户列表',
		'link'	=>	BASE_DOMAIN . 'admin/user/userlist.php',
	),
	11 => array(
		'title'	=>	'用户组列表',
		'link'	=>	BASE_DOMAIN . 'admin/user/usergroup.php',
	),
	//单页面管理
	20 => array(
		'title'	=>	'添加页面',
		'link'	=>	BASE_DOMAIN . 'admin/singlepage/addsinglepage.php',
	),
	21 => array(
		'title'	=>	'管理单页面',
		'link'	=>	BASE_DOMAIN . 'admin/singlepage/singlepagelist.php',
	),
	//内容管理
	30 => array(
		'title'	=>	'内容列表',
		'link'	=>	BASE_DOMAIN . 'admin/article/articlelist.php',
	),
	31 => array(
		'title'	=>	'栏目列表',
		'link'	=>	BASE_DOMAIN . 'admin/article/categorylist.php',
	),
	32 => array(
		'title'	=>	'首页位置',
		'link'	=>	BASE_DOMAIN . 'admin/homeposition/homepositionlist.php',
	),
	//留言板管理
	40 => array(
		'title'	=>	'留言板',
		'link'	=>	BASE_DOMAIN . 'admin/message/messagelist.php',
	),
	//访问量统计
	50 => array(
		'title'	=>	'查看访问量',
		'link'	=>	BASE_DOMAIN . 'admin/flux/fluxlist.php',
	),
	//个人管理
	60 => array(
		'title'	=>	'修改密码',
		'link'	=>	BASE_DOMAIN . 'admin/personal/editpasswd.php',
	),
	//个人管理
	70 => array(
		'title'	=>	'下载管理',
		'link'	=>	BASE_DOMAIN . 'admin/download/downloadlist.php',
	),
	71 => array(
		'title'	=>	'添加下载',
		'link'	=>	BASE_DOMAIN . 'admin/download/adddownload.php',
	),
	72 => array(
		'title'	=>	'项目列表',
		'link'	=>	BASE_DOMAIN . 'admin/project/projectlist.php',
	),
);
?>
