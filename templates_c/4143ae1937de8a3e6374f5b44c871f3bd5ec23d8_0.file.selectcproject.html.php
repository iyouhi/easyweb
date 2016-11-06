<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:36:05
  from "/var/www/html/iyouhi.com/view/admin/html/admin/selectcproject.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e42757cc8b2_03962673',
  'file_dependency' => 
  array (
    '4143ae1937de8a3e6374f5b44c871f3bd5ec23d8' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/selectcproject.html',
      1 => 1463287379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e42757cc8b2_03962673 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理系统</title>
<link rel="stylesheet" rev="stylesheet" href="<?php echo @constant('STATIC_PATH');?>
css/style.css" type="text/css" media="all" />
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
      <th class="tablestyle_title" >选择项目</th>
  </tr>
  
  <TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>选择项目</legend>
					  <table border="0" cellpadding="5" cellspacing="1" style="width:100%">
					  
					  <tr>
					    <td><span class="red">
					     <?php
$_from = $_smarty_tpl->tpl_vars['projects']->value;
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
                         <input type="radio" name="projectid" value=<?php echo $_smarty_tpl->tpl_vars['item']->value['pid'];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
&nbsp;&nbsp;
                         <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
					      </span></td>
					  </tr>
					  <tr>
                        <td colspan=2 ><span class="red"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</span></td>
					  </tr>
					  </table>
			  <br />
				</fieldset>			
				</TD>
			
		</TR>
		<TR>
			<TD colspan="2" align="center" height="50px">
			<input type="submit" name="issubmit" value="确定" class="button"/>			
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
