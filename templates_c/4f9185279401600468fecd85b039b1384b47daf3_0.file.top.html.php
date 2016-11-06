<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:35:52
  from "/var/www/html/iyouhi.com/view/admin/html/admin/top.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e4268134857_98236110',
  'file_dependency' => 
  array (
    '4f9185279401600468fecd85b039b1384b47daf3' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/top.html',
      1 => 1463287379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e4268134857_98236110 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
<style type="text/css">

<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->

</style>
<link href="<?php echo @constant('STATIC_PATH');?>
css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="59" background="<?php echo @constant('ADMIN_IMG_PATH');?>
top.gif"><table width="99%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1%"><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
logo.gif" width="557" height="59" border="0" /></td>
        <td width="64%" align="right" style="font-size:12px;vertical-align:bottom;">当前项目：<?php echo $_smarty_tpl->tpl_vars['cProject']->value['title'];?>
 <a href="/admin/selectcproject.php" target="_parent" style="color:#0099FF;text-decoration:none;">切换项目</a></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php }
}
