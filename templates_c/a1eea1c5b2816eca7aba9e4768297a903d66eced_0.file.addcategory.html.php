<?php
/* Smarty version 3.1.29, created on 2016-06-25 21:28:49
  from "/var/www/html/iyouhi.com/view/admin/html/admin/article/addcategory.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e8711ee2c50_38463513',
  'file_dependency' => 
  array (
    'a1eea1c5b2816eca7aba9e4768297a903d66eced' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/article/addcategory.html',
      1 => 1466841592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e8711ee2c50_38463513 ($_smarty_tpl) {
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
			<th class="tablestyle_title" >添加分类</th>
		</tr>
		<tr>
			<td class="CPanel">
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
					<tr>
						<td align="left">
							<input type="button" name="Submit" value="添加" class="button" onclick="from1.submit();"/>　
							<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<TR>
			<TD width="100%">
				<fieldset style="height:100%;">
					<legend>添加分类</legend>
					<table border="0" cellpadding="5" cellspacing="1" style="width:100%">
						<tr>
							<td nowrap="nowrap" align="right">所属分类:</td>
							<td>
								<span class="red">
									<select name="cate[pcid]">
										<option value=0>顶级分类</option>
										<?php echo $_smarty_tpl->tpl_vars['category']->value;?>

									</select>
								</span>
							</td>
						</tr>
						<tr>
							<td nowrap="nowrap" align="right">分类名称:</td>
							<td>
								<span class="red">
									<input name="cate[cname]" type="text" class="text" style="width:154px" value="" />*
								</span>
							</td>
						</tr>
						<tr>
							<td nowrap="nowrap" align="right">分类说明:</td>
							<td>
								<span class="red">
									<textarea name="cate[memo]" rows="5" cols="65"></textarea>
								</span>
							</td>
						</tr>
						<tr>
							<td nowrap="nowrap" align="right">目录名:</td>
							<td>
								<span class="red">
									<input name="cate[cdir]" type="text" class="text" style="width:154px" value="" />*不允许更改
								</span>
							</td>
						</tr>
						<tr>
							<td nowrap="nowrap" align="right">是否是单页面:</td>
							<td>
								<span class="red">
									<input type="radio" name="cate[single_page]" value=1 >是&nbsp;&nbsp;<input type="radio" name="cate[single_page]" value=0 checked>否&nbsp;&nbsp;
								</span>
							</td>
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
				<input type="submit" name="issubmit" value="添加" class="button"/>　
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
