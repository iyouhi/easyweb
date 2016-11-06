<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:35:51
  from "/var/www/html/iyouhi.com/view/admin/html/admin/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e4267e2d752_74163811',
  'file_dependency' => 
  array (
    '69d4dc3d2e24bf16f932bb778484c95d1695c010' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/index.html',
      1 => 1463287379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e4267e2d752_74163811 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理系统</title>
</head>

<frameset rows="59,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo @constant('BASE_DOMAIN');?>
admin/top.php" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset cols="213,*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo @constant('BASE_DOMAIN');?>
admin/left.php" name="leftFrame" scrolling="no" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo @constant('BASE_DOMAIN');?>
admin/mainfra.php" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes></html>
<?php }
}
