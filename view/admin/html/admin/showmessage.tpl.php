<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> 提示信息 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">         
<meta http-equiv="cache-control" content="no-cache">  

<style type="text/css">
<!--
*{
margin:0;
padding:0;
}
body {
text-align:center;
background-color:#E6EFF8;
}
td{
	font-size: 12px;
	line-height:150%;
	}
h1{
height:20px;
line-height:20px;
font-size:12px;
text-align:center;
background-color:#f1f1f1;
color:#CC0000;
}
.box_border{
margin:50px auto;
border:1px solid #dcdcdd;
width:450px;
}
a:link {
	color: #0000FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #003399;
}
a:hover {
	text-decoration: underline;
	color: #0066FF;
}
a:active {
	text-decoration: none;
	color: #0066FF;
}
-->
</style>
</head>
<body>
<div class="box_border">
<h1>提示信息</h1>
<table width="100%" cellspacing="5" cellpadding="0" bgcolor="#f5f5f5">
  <tr>
    <td align="center" bgcolor="#FFFFFF">
<br/>
<?php echo $msg;?>
<br/>
<?php
if ($url_forward=='goback' || $url_forward=='') {
?> 
<br/><a href="javascript:history.back(-1);" >[点这里返回上一页]</a>
<?php
} elseif ($url_forward=="close") {
?> 
<br/><input type="button" name="close" value=" 关闭 " onClick="window.close();">
<?php
} elseif ($url_forward) {
?> 
<br/><a href="<?php echo $url_forward;?>">如果您的浏览器没有自动跳转，请点击这里</a>
<script language="javascript">
    setTimeout("location.href('<?php echo $url_forward;?>');",<?php echo $ms;?>);
</script>
<?php
}
?>
    </td>
  </tr>
</table>
</div>
</body>
</html>
