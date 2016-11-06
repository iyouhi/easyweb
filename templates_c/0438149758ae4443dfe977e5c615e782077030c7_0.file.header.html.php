<?php
/* Smarty version 3.1.29, created on 2016-06-25 19:33:36
  from "/var/www/html/iyouhi.com/view/zhuangxiu_1/html/header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e6c1066d134_18883807',
  'file_dependency' => 
  array (
    '0438149758ae4443dfe977e5c615e782077030c7' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/zhuangxiu_1/html/header.html',
      1 => 1466854098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e6c1066d134_18883807 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo @constant('STATIC_PATH');?>
css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo @constant('STATIC_PATH');?>
css/coin-slider-styles.css" rel="stylesheet" type="text/css" media="all" />
	
	<?php echo '<script'; ?>
 src="<?php echo @constant('STATIC_PATH');?>
js/jquery-1.9.1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo @constant('STATIC_PATH');?>
js/jquery-ui-1.10.2.custom.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo @constant('STATIC_PATH');?>
js/coin-slider.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body>
<div class="wrap">
<div class="wrapper">
<div class="header">
<div class="header-left">
      <div class="logo">
        <a href="/"><img src="<?php echo $_smarty_tpl->tpl_vars['project']->value['logo'];?>
" alt=""></a>
      </div>
</div>
<div class="header-right">
<div class="contact-info">
					<p><img src="<?php echo @constant('STATIC_PATH');?>
images/c-icon.png" title="contact-info" />联系电话</p>
					<p><span><?php echo $_smarty_tpl->tpl_vars['project']->value['phone'];?>
</span></p>
				</div>
</div>
<div class="clear"></div>
<div class="top-nav">
		<ul>
			<li <?php if (!isset($_smarty_tpl->tpl_vars['cateInfo']->value)) {?>class="active"<?php }?>><a href="/">首页</a></li>
	        <?php
$_from = $_smarty_tpl->tpl_vars['topcategory_on_header']->value;
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
                <li <?php if (isset($_smarty_tpl->tpl_vars['cateInfo']->value) && $_smarty_tpl->tpl_vars['cateInfo']->value['cid'] == $_smarty_tpl->tpl_vars['item']->value['cid']) {?>class="active"<?php }?>><a href="/list.php?cid=<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['cname'];?>
</a></li>
            <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?> 
		<div class="clear"> </div>
		</ul>
</div>
</div> 
<div class="content"> 
	<!--图片轮换-->
	<div id="flexslider">
		<?php
$_from = $_smarty_tpl->tpl_vars['slider_article']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
		<a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
" target="_self">
			<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['slide_pic'];?>
" width="1024px" height="384px" border="0" style="display: none;">
		</a>
		<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
?>      			
	</div>



<div class="clear"></div>

<?php echo '<script'; ?>
 type="text/javascript" language="javascript">
    $('#flexslider').coinslider({ width: 786, height: 384, links: true});
<?php echo '</script'; ?>
>
<?php }
}
