<?php
/* Smarty version 3.1.29, created on 2016-09-28 21:26:16
  from "/var/www/html/iyouhi.com/view/admin/html/admin/project/addproject.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ebc4f8e0fe45_11178686',
  'file_dependency' => 
  array (
    '9918d8682d48bd0662734ca4e9c1efcab83e610b' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/admin/html/admin/project/addproject.html',
      1 => 1463287379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ebc4f8e0fe45_11178686 ($_smarty_tpl) {
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
      <th class="tablestyle_title" >添加项目</th>
  </tr>
  <tr>
    <td class="CPanel">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		<tr><td align="left">
		<input type="button" name="Submit" value="添加" class="button" onclick="from1.submit();"/>　
			
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
		</td></tr>
		</TABLE>
	 </td>
  </tr>
  <TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>添加项目</legend>
					  <table border="0" cellpadding="5" cellspacing="1" style="width:100%">
					   <tr>
                        <td nowrap="nowrap" align="right">项目名称:</td>
					    <td><span class="red">
                          <input name="project[title]" type="text" class="text" style="width:354px" value="" />
					      *</span></td>
					  </tr>
					  
					  <tr>
                        <td nowrap="nowrap" align="right">模板:</td>
					    <td><span class="red">
                          <input name="project[template]" type="text" class="text" style="width:154px" value="" />
					      </span></td>
					  </tr>
                      <tr>
                        <td nowrap="nowrap" align="right">添加日期:</td>
                        <td><span class="red">
                          <input name="project[atime]" type="text" class="text" style="width:154px" value="<?php echo date('Y-m-d H:i:s',time());?>
" />
                        </span></td>
                      </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">项目域名:</td>
					    <td><span class="red">
                          <input name="project[domain]" type="text" class="text" style="width:354px" value="" />
					      </span></td>
					  </tr>
					  <tr>
                        <td nowrap="nowrap" align="right">项目logo:</td>
					    <td><span class="red">
                          <input type="text" name="project[logo]" readonly id="filename" size="50" value=""/>&nbsp;&nbsp; <input type="button" onclick="showDialog('filename');" value="上传图片"></span></td>
					  </tr>
					  <tr>
						<td nowrap="nowrap" align="right">项目描述:</td>
						<td><span class="red">  
							<?php echo '<script'; ?>
 type="text/javascript">
							<!--
							var oFCKeditor = new FCKeditor( 'project[description]' ) ;
							oFCKeditor.BasePath = '/plugins/fckeditor/';
							oFCKeditor.ToolbarSet = 'Basic';
							oFCKeditor.Height	= 200 ;
							oFCKeditor.Width	= '100%' ;
							oFCKeditor.Value	= '';
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
							oFCKeditor.ToolbarSet = 'Basic';
							oFCKeditor.Height	= 200 ;
							oFCKeditor.Width	= '100%' ;
							oFCKeditor.Value	= '<?php echo $_smarty_tpl->tpl_vars['project']->value['contact'];?>
';
							oFCKeditor.Create() ;
							-->
							<?php echo '</script'; ?>
>
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
			<input type="submit" name="issubmit" value="添加" class="button"/>　
			
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
