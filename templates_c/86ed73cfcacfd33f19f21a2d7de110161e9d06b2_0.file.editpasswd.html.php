<?php
/* Smarty version 3.1.29, created on 2016-09-28 22:03:05
  from "/var/www/html/iyouhi.com/view/admin/html/admin/personal/editpasswd.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ebcd99344275_99619306',
  'file_dependency' => 
  array (
    '86ed73cfcacfd33f19f21a2d7de110161e9d06b2' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/personal/editpasswd.html',
      1 => 1466854098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ebcd99344275_99619306 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理系统</title>
<link rel="stylesheet" rev="stylesheet" href="<?php echo @constant('ADMIN_CSS_PATH');?>
style.css" type="text/css" media="all" />

<style type="text/css">

<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
-->

</style>
</head>

<body class="ContentBody">
  <form action="" method="post" enctype="multipart/form-data" name="form1">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >修改密码</th>
  </tr>
  <tr>
    <td class="CPanel">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		<tr><td align="left">
		<input type="button" name="Submit" value="修改" class="button" onclick="from1.submit();"/>　
			
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
		</td></tr>
		</TABLE>
	
	
	 </td>
  </tr>
  <TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>修改密码</legend>
					  <table border="0" cellpadding="5" cellspacing="1" style="width:100%">				    
					  <tr>
                        <td nowrap="nowrap" align="right">旧密码:</td>
					    <td><span class="red">
                          <input name="oldpasswd" type="password" class="text" style="width:154px" value="" />
					      *</span></td>
					  </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">新密码:</td>
					    <td><span class="red">
                          <input name="newpasswd" type="password" class="text" style="width:154px" value="" />
					      *</span></td>
					  </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">再输一遍:</td>
					    <td><span class="red">
                          <input name="repasswd" type="password" class="text" style="width:154px" value="" />
					      *</span></td>
					  </tr>
					  <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
					  <tr>
                        <td colspan=2 ><span class="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</span></td>
					  </tr>
					  <?php }?>
					  </table>
			  <br />
				</fieldset>			
				</TD>
			
		</TR>
		<TR>
			<TD colspan="2" align="center" height="50px">
			<input type="submit" name="Submit" value="保存" class="button"/>　
			
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/></TD>
		</TR>
		</TABLE>
	
	
	 </td>
  </tr>
  </table>

</div>
</form>
</body>
</html>
<?php }
}
