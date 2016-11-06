<?php
/* Smarty version 3.1.29, created on 2016-06-25 16:53:37
  from "/var/www/html/iyouhi.com/view/zhuangxiu_1/html/list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e469139f721_45926497',
  'file_dependency' => 
  array (
    'c3aaecca94892a141fde7a119fa27ca54b07bab2' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/zhuangxiu_1/html/list.html',
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
function content_576e469139f721_45926497 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="cont-main">
	<h2><a href=""><?php echo $_smarty_tpl->tpl_vars['cateInfo']->value['cname'];?>
</a></h2>

<?php
$_from = $_smarty_tpl->tpl_vars['articleList']->value;
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
<div class="grids">
	<div class="grid">
	<a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
"><img src="<?php echo @constant('STATIC_PATH');?>
images/pic9.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"></a>
	<h4><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</h4>
	<?php if ($_smarty_tpl->tpl_vars['item']->value['memo']) {?>
	<p><?php echo $_smarty_tpl->tpl_vars['item']->value['memo'];?>
</p>
	<?php }?>
	<div class="btn-top"><a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
"><button class="btn btn-2 btn-2h">查看</button></a></div>
	</div>
</div>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>

<div class="clear"></div>
</div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
