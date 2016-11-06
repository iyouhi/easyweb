<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:35:58
  from "/var/www/html/iyouhi.com/view/admin/html/admin/project/projectlist.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e426e96ceb6_39183808',
  'file_dependency' => 
  array (
    '3ff1798dd8761dfde056cabaeb4ce2c01ba4b1ee' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/project/projectlist.html',
      1 => 1463287379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e426e96ceb6_39183808 ($_smarty_tpl) {
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

<link href="<?php echo @constant('STATIC_PATH');?>
css/css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo @constant('STATIC_PATH');?>
css/style.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 language="javascript" src="<?php echo @constant('STATIC_PATH');?>
js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" src="<?php echo @constant('STATIC_PATH');?>
js/common.js"><?php echo '</script'; ?>
>
</head>

<SCRIPT language=JavaScript>
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
<form name="fom" id="fom" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30">      
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="62" background="<?php echo @constant('STATIC_PATH');?>
images/nav04.gif">
            &nbsp;
		   <!--<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
			  <td width="24"><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico07.gif" width="20" height="18" /></td>
			  <td width="519"><select name="select2">
				    <option>按标题</option>
				    <option>按栏目</option>
					<option>按作者</option>
			      </select>
			   <input name="textfield" type="text" size="12" /> <span class="newfont06">分组</span>
			   <input name="textfield" type="text" size="12"/>	
			   <input name="Submit" type="button" class="right-button02" value="查 询" /></td>
			   <td width="679" align="left"><a href="#" onclick="sousuo()">
			     <input name="Submit" type="button" class="right-button07" value="高级搜索" />
			   </a></td>	
		    </tr>
          </table>-->
          </td>
        </tr>
    </table></td></tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          	 <tr>
				<td height="20"><span class="newfont07">选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a></span>
		           <input name="Submit" type="button" class="right-button08" value="删除所选项目" /> <input name="Submit" type="button" class="right-button08" value="添加项目" onclick="self.location='addproject.php';" />
	              </td>
			  </tr>
			  <tr><td>&nbsp;</td></tr>
              <tr>
                <td height="40" class="font42">
				<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
					<tr>
                    <td height="20" colspan="8" align="center" bgcolor="#EEEEEE" class="tablestyle_title">项目列表</td>
                    </tr>
                  <tr>
				    <td width="5%" align="center" bgcolor="#EEEEEE">选择</td>
					<td width="5%" height="20" align="center" bgcolor="#EEEEEE">项目编号</td>
                    <td width="20%" align="center" bgcolor="#EEEEEE">项目名称</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">项目logo</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">模板</td>
					<td width="15%" align="center" bgcolor="#EEEEEE">添加时间</td>
					<td width="20%" align="center" bgcolor="#EEEEEE">项目域名</td>
                    <td width="10%" align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>
				  <?php
$_from = $_smarty_tpl->tpl_vars['projectlist']->value;
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
					<td height="10" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
</td>
                    <td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                    <td bgcolor="#FFFFFF"><img width="50" height="50" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['logo'];?>
"></td>
                    <td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['item']->value['template'];?>
</td>
                    <td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['item']->value['atime'];?>
</td>
                    <td bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['item']->value['domain'];?>
</td>
                    <td bgcolor="#FFFFFF"><a href="editproject.php?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
">编辑</a>&nbsp;|&nbsp;<a href="delproject.php?pid=<?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
"  onclick="return delConfirm();">删除</a></td>
                  </tr>
				  <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
                </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
              <tr>
                <td width="50%">共 <span class="right-text09"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['totalpage'];?>
</span> 页 | 第 <span class="right-text09"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page'];?>
</span> 页</td>
                <td width="49%" align="right">[<?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['first']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['first'];?>
" class="right-font08">首页</a><?php } else { ?>首页<?php }?> | <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['previous']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['previous'];?>
" class="right-font08">上一页</a><?php } else { ?>上一页<?php }?> | <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next'];?>
" class="right-font08">下一页</a><?php } else { ?>下一页<?php }?> | <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['last']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['last'];?>
" class="right-font08">末页</a><?php } else { ?>末页<?php }?>] </td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
<?php }
}
