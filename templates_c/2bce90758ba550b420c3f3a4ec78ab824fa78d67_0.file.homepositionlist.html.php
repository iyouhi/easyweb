<?php
/* Smarty version 3.1.29, created on 2016-06-25 19:33:29
  from "/var/www/html/iyouhi.com/view/admin/html/admin/homeposition/homepositionlist.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e6c09804a71_09963913',
  'file_dependency' => 
  array (
    '2bce90758ba550b420c3f3a4ec78ab824fa78d67' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/homeposition/homepositionlist.html',
      1 => 1466854098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e6c09804a71_09963913 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>项目管理系统</title>
<style type="text/css">

<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tabfont01 {	
	font-family: "宋体";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "宋体";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "宋体";
	font-size: 14px;
	height: 37px;
}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->

</style>

<link href="<?php echo @constant('ADMIN_CSS_PATH');?>
css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo @constant('ADMIN_CSS_PATH');?>
style.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 language="javascript" src="<?php echo @constant('ADMIN_JS_PATH');?>
jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" src="<?php echo @constant('ADMIN_JS_PATH');?>
common.js"><?php echo '</script'; ?>
>
</head>

<SCRIPT language=JavaScript>
function sousuo(){
	window.open("gaojisousuo.htm","","depended=0,alwaysRaised=1,width=800,height=510,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
function selectAll(){
	var obj = document.fom.elements;
	for (var i=0;i<obj.length;i++){
		if (obj[i].name == "delid"){
			obj[i].checked = true;
		}
	}
}

function unselectAll(){
	var obj = document.fom.elements;
	for (var i=0;i<obj.length;i++){
		if (obj[i].name == "delid"){
			if (obj[i].checked==true) obj[i].checked = false;
			else obj[i].checked = true;
		}
	}
}

function link(){
    document.getElementById("fom").action="yuangong.htm";
   document.getElementById("fom").submit();
}

</SCRIPT>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="30">      
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td height="62" background="<?php echo @constant('ADMIN_IMG_PATH');?>
nav04.gif">
					&nbsp;
				  </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="20">
									<span class="newfont07">
										选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a>
									</span>
									<input name="Submit" type="button" class="right-button08" value="删除所选" /> 
									<input name="Submit" type="button" class="right-button08" value="添加" onclick="self.location='addhomeposition.php';" />
								</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td height="40" class="font42">
									<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
										<tr>
										<td height="20" colspan="7" align="center" bgcolor="#EEEEEE" class="tablestyle_title">推荐列表</td>
										</tr>
									  <tr>
										<td width="6%" align="center" bgcolor="#EEEEEE">选择</td>
										<td width="9%" align="center" bgcolor="#EEEEEE">位置</td>
										<td width="9%" align="center" bgcolor="#EEEEEE">栏目</td>
										<td width="10%" align="center" bgcolor="#EEEEEE">操作</td>
									  </tr>
									  <?php
$_from = $_smarty_tpl->tpl_vars['homePositionList']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
									  <tr>
										<td bgcolor="#FFFFFF"><input type="checkbox" name="delid"/></td>
										<td bgcolor="#FFFFFF">位置<?php echo $_smarty_tpl->tpl_vars['item']->value['position_id'];?>
</td>
										<td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_info']['cname'];?>
</td>
										<td bgcolor="#FFFFFF"><a href="edithomeposition.php?position_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['position_id'];?>
">编辑</a>&nbsp;|&nbsp;<a href="delhomeposition.php?position_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['position_id'];?>
"  onclick="return delConfirm();">删除</a></td>
									  </tr>
									  <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html><?php }
}
