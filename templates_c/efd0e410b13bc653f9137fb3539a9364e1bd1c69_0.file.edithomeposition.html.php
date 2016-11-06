<?php
/* Smarty version 3.1.29, created on 2016-06-25 21:28:22
  from "/var/www/html/iyouhi.com/view/admin/html/admin/homeposition/edithomeposition.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e86f6bbf559_72916690',
  'file_dependency' => 
  array (
    'efd0e410b13bc653f9137fb3539a9364e1bd1c69' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/homeposition/edithomeposition.html',
      1 => 1466854098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e86f6bbf559_72916690 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理系统</title>
<link rel="stylesheet" rev="stylesheet" href="<?php echo @constant('ADMIN_CSS_PATH');?>
style.css" type="text/css" media="all" />
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('BASE_DOMAIN');?>
plugins/fckeditor/fckeditor.js"><?php echo '</script'; ?>
>
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
			<th class="tablestyle_title" >修改首页位置</th>
		</tr>
		<tr>
			<td class="CPanel">
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
					<tr>
						<td align="left">
							<input type="button" name="Submit" value="修改" class="button" onclick="from1.submit();"/>　
							<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
						</td>
					</tr>
				</TABLE>
			</td>
		</tr>
		<TR>
			<TD width="100%">
				<fieldset style="height:100%;">
					<legend>修改首页位置</legend>
					<table border="0" cellpadding="5" cellspacing="1" style="width:100%">
						<tr>
							<td nowrap="nowrap" align="right">位置:</td>
							<td>
								<span class="red">
									<input name="homeposition[position_id]" type="text" class="text" style="width:154px" value="<?php echo $_smarty_tpl->tpl_vars['homeposition']->value['position_id'];?>
" />*
								</span>
							</td>
						</tr>
						<tr>
	                        <td nowrap="nowrap" align="right">选择分类:</td>
						    <td><span class="red">
	                          <select name="homeposition[cid]">
								<?php echo $_smarty_tpl->tpl_vars['category']->value;?>

							  </select>
							  </span>
							</td>					
					  	</tr>
						
					</table>
					<br />
				</fieldset>			
			</TD>
		</TR>
		<TR>
			<TD colspan="2" align="center" height="50px">
				<input type="hidden" name="position_id" value="<?php echo $_smarty_tpl->tpl_vars['homeposition']->value['position_id'];?>
"/>　
				<input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['homeposition']->value['pid'];?>
"/>　
				<input type="submit" name="issubmit" value="修改" class="button"/>　
				<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
			</TD>
		</TR>
	</TABLE>
</div>
</form>
</body>
</html>
<?php }
}
