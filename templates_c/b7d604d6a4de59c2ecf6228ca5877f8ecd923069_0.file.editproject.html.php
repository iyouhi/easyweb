<?php
/* Smarty version 3.1.29, created on 2016-09-28 21:54:12
  from "/var/www/html/iyouhi.com/view/admin/html/admin/project/editproject.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ebcb84ddae59_12674385',
  'file_dependency' => 
  array (
    'b7d604d6a4de59c2ecf6228ca5877f8ecd923069' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/project/editproject.html',
      1 => 1466841592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ebcb84ddae59_12674385 ($_smarty_tpl) {
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
      <th class="tablestyle_title" >修改项目信息</th>
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
				<legend>修改项目</legend>
					  <table border="0" cellpadding="5" cellspacing="1" style="width:100%">
					   <tr>
                        <td nowrap="nowrap" align="right">项目名称:</td>
					    <td><span class="red">
                          <input name="project[title]" type="text" class="text" style="width:354px" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['title'];?>
" />
					      *</span></td>
					  </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">模板:</td>
					    <td><span class="red">
                          <input name="project[template]" type="text" class="text" style="width:154px" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['template'];?>
" />
					      </span></td>
					  </tr>
					   <tr>
                        <td nowrap="nowrap" align="right">修改时间:</td>
					    <td><span class="red">
                          <input name="project[etime]" type="text" class="text" style="width:154px" value="<?php echo date('Y-m-d H:i:s',time());?>
" />
					      </span></td>
					  </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">项目域名:</td>
					    <td><span class="red">
                          <input name="project[domain]" type="text" class="text" style="width:354px" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['domain'];?>
" />
					      </span></td>
					  </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">项目logo:</td>
					    <td><span class="red">
                          <input type="text" name="project[logo]" readonly id="filename" size="50" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['logo'];?>
"/>&nbsp;&nbsp; <input type="button" onclick="showDialog('filename');" value="上传图片"></span></td>
					  </tr>
					  <tr>
						<td nowrap="nowrap" align="right">项目描述:</td>
						<td><span class="red">                      
							<?php echo '<script'; ?>
 type="text/javascript">
							<!--
							var oFCKeditor = new FCKeditor( 'project[description]' ) ;
							oFCKeditor.BasePath = '/plugins/fckeditor/';
							//oFCKeditor.ToolbarSet = 'Basic';
							oFCKeditor.Height	= 200 ;
							oFCKeditor.Width	= '100%' ;
							oFCKeditor.Value	= "<?php echo daddslashes($_smarty_tpl->tpl_vars['project']->value['description']);?>
";
							oFCKeditor.Create() ;
							-->
							<?php echo '</script'; ?>
>
					      </span></td>
					  </tr>
					  <tr>
						<td nowrap="nowrap" align="right">联系方式:</td>
						<td><span class="red">
							<?php echo '<script'; ?>
 type="text/javascript">
							<!--
							var oFCKeditor = new FCKeditor( 'project[contact]' ) ;
							oFCKeditor.BasePath = '/plugins/fckeditor/';
							//oFCKeditor.ToolbarSet = 'Basic';
							oFCKeditor.Height	= 200 ;
							oFCKeditor.Width	= '100%' ;
							oFCKeditor.Value	= "<?php echo daddslashes($_smarty_tpl->tpl_vars['project']->value['contact']);?>
";
							oFCKeditor.Create() ;
							-->
							<?php echo '</script'; ?>
>
					      </span></td>
					  </tr>
					  
					  </table>
			  <br />
				</fieldset>			
				</TD>
			
		</TR>
		<TR>
			<TD colspan="2" align="center" height="50px">
			<input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['pid'];?>
"/>
			<input type="submit" name="issubmit" value="修改" class="button"/>			
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/></TD>
		</TR>
		</TABLE>
	 </td>
  </tr>
  </table>

</div>
</form>

<SCRIPT language=javascript>
<!--
function showDialog(str){
	window.open('/admin/uploadpic.php?textid='+str,"uploadwindow","toolbar=no,location=no,statu=no,menubar=no,scrollbars=auto,width=405,height=360,resizable=no" );
}
-->
</SCRIPT>

</body>
</html>
<?php }
}
