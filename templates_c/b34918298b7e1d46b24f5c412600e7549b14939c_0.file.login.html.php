<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:33:01
  from "/var/www/html/iyouhi.com/view/admin/html/admin/login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e41bdb59556_49904045',
  'file_dependency' => 
  array (
    'b34918298b7e1d46b24f5c412600e7549b14939c' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/login.html',
      1 => 1466841592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e41bdb59556_49904045 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>国家首饰质量监督检验中心-后台管理系统</title>
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
<link href="<?php echo @constant('ADMIN_CSS_PATH');?>
css.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('ADMIN_JS_PATH');?>
jquery.js"><?php echo '</script'; ?>
>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="147" background="<?php echo @constant('ADMIN_IMG_PATH');?>
top02.gif"><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
top03.gif" width="776" height="147" /></td>
  </tr>
</table>
<table width="562" border="0" align="center" cellpadding="0" cellspacing="0" class="right-table03">
  <tr>
    <td width="221"><table width="95%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
      
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
          <tr>
            <td align="center"><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico13.gif" width="107" height="97" /></td>
          </tr>
          <tr>
            <td height="40" align="center">&nbsp;</td>
          </tr>
          
        </table></td>
        <td><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
line01.gif" width="5" height="292" /></td>
      </tr>
    </table></td>
    <td>
	<form action='<?php echo @constant('BASE_DOMAIN');?>
admin/login.php' method='post'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="31%" height="35" class="login-text02">用户名称：<br /></td>
        <td width="69%"><input name="username" type="text" size="30" /></td>
      </tr>
      <tr>
        <td height="35" class="login-text02">密　码：<br /></td>
        <td><input name="password" type="password" size="30" /></td>
      </tr>
      <tr>
        <td height="35" class="login-text02">验证图片：<br /></td>
        <td><span id="vcode" style='width:10px;'><img id="nowimg" src="aj_getvcode.php" width="75" height="20" /></span><a href="javascript:" class="login-text03">看不清楚，换张图片</a></td>
      </tr>
      <tr>
        <td height="35" class="login-text02">请输入验证码：</td>
        <td><input name="vcode" type="text" size="30" /></td>
      </tr>
      <tr>
        <td height="35">&nbsp;</td>
        <td><input name="issubmit" type="submit" class="right-button01" value="确认登陆" />
          <input name="Submit232" type="reset" class="right-button02" value="重 置" /></td>
      </tr>
      <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
	  <tr>
        <td height="35" colspan=2>&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</td>
        
      </tr>
      <?php }?>
    </table>
	</form>
	</td>
  </tr>
</table>
</body>
</html>

<?php echo '<script'; ?>
 type="text/javascript"> 
$(document).ready(function(){ 
	$(".login-text03").click(function(){ 
			var url="aj_getvcode.php?" + Math.random();
			$("#vcode").html('<img id="nowimg" src="'+url+'" width="75" height="20" />');
	});
});
<?php echo '</script'; ?>
>
<?php }
}