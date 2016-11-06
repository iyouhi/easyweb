<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:35:52
  from "/var/www/html/iyouhi.com/view/admin/html/admin/left.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e42682cce98_67272435',
  'file_dependency' => 
  array (
    'aa16c395a9fff7f493b7d2519804bce72f5c9078' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/left.html',
      1 => 1463287379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e42682cce98_67272435 ($_smarty_tpl) {
?>
<html>
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
	background-image: url(<?php echo @constant('ADMIN_IMG_PATH');?>
left.gif);
}
-->

</style>
<link href="<?php echo @constant('ADMIN_CSS_PATH');?>
css.css" rel="stylesheet" type="text/css" />
</head>

<SCRIPT language=JavaScript>
function tupian(idt){
    var nametu="xiaotu"+idt;
    var tp = document.getElementById(nametu);
    tp.src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico05.gif";//图片ico04为白色的正方形
	
	for(var i=1;i<30;i++)
	{
	  
	  var nametu2="xiaotu"+i;
	  if(i!=idt*1)
	  {
	    var tp2=document.getElementById('xiaotu'+i);
		if(tp2!=undefined)
	    {tp2.src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico06.gif";}//图片ico06为蓝色的正方形
	  }
	}
}

function list(idstr){
	var name1="subtree"+idstr;
	var name2="img"+idstr;
	var objectobj=document.all(name1);
	var imgobj=document.all(name2);
	
	
	//alert(imgobj);
	
	if(objectobj.style.display=="none"){
		for(i=1;i<10;i++){
			var name3="img"+i;
			var name="subtree"+i;
			var o=document.all(name);
			if(o!=undefined){
				o.style.display="none";
				var image=document.all(name3);
				//alert(image);
				image.src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico04.gif";
			}
		}
		objectobj.style.display="";
		imgobj.src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico03.gif";
	}
	else{
		objectobj.style.display="none";
		imgobj.src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico04.gif";
	}
}

</SCRIPT>

<body>
<table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01">
  <tr>
    <TD>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="207" height="55" background="<?php echo @constant('ADMIN_IMG_PATH');?>
nav01.gif">
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="25%" rowspan="2"><img src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico02.gif" width="35" height="35" /></td>
					<td width="75%" height="22" class="left-font01">您好，<span class="left-font02"><?php echo $_smarty_tpl->tpl_vars['cUserInfo']->value['name'];?>
</span></td>
				  </tr>
				  <tr>
					<td height="22" class="left-font01">
						[&nbsp;<a href="loginout.php" target="_top" class="left-font01">退出</a>&nbsp;]</td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table>
		<!--  用户管理开始    -->
		<?php
$_from = $_smarty_tpl->tpl_vars['menucate']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img8" id="img<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
');" ><?php echo $_smarty_tpl->tpl_vars['item']->value['caption'];?>
</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<?php
$_from = $_smarty_tpl->tpl_vars['item']->value['menu'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_me_1_saved_item = isset($_smarty_tpl->tpl_vars['me']) ? $_smarty_tpl->tpl_vars['me'] : false;
$_smarty_tpl->tpl_vars['me'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['me']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['me']->value) {
$_smarty_tpl->tpl_vars['me']->_loop = true;
$__foreach_me_1_saved_local_item = $_smarty_tpl->tpl_vars['me'];
?>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu<?php echo $_smarty_tpl->tpl_vars['me']->value;?>
" src="<?php echo @constant('ADMIN_IMG_PATH');?>
ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="<?php echo $_smarty_tpl->tpl_vars['menulist']->value[$_smarty_tpl->tpl_vars['me']->value]['link'];?>
" target="mainFrame" class="left-font03" onClick="tupian('<?php echo $_smarty_tpl->tpl_vars['me']->value;?>
');"><?php echo $_smarty_tpl->tpl_vars['menulist']->value[$_smarty_tpl->tpl_vars['me']->value]['title'];?>
</a></td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['me'] = $__foreach_me_1_saved_local_item;
}
if ($__foreach_me_1_saved_item) {
$_smarty_tpl->tpl_vars['me'] = $__foreach_me_1_saved_item;
}
?>
      </table>
	  <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
		<!--  /用户管理结束    -->

	  </TD>
  </tr>
  
</table>
</body>
</html>
<?php }
}
