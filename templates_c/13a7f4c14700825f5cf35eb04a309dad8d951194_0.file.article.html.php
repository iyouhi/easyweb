<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:53:54
  from "/var/www/html/iyouhi.com/view/zhuangxiu_1/html/article.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e46a2c65c90_28503993',
  'file_dependency' => 
  array (
    '13a7f4c14700825f5cf35eb04a309dad8d951194' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/zhuangxiu_1/html/article.html',
      1 => 1463370108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:right.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_576e46a2c65c90_28503993 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="cont-main">
	<h2><a href=""><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h2>
<div class="details">
	<!--
	<div class="det-pic">
		<img src="<?php echo @constant('STATIC_PATH');?>
images/det-pic.jpg" alt="">		
	</div>
	-->
	<div class="det-para">
		<p><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</p>
	</div>
	</div>
	<div class="clear"></div>
	</div>
</div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
