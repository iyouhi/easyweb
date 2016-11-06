<?php
/* Smarty version 3.1.29, created on 2016-06-25 19:33:36
  from "/var/www/html/iyouhi.com/view/zhuangxiu_1/html/index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e6c106364a4_75641993',
  'file_dependency' => 
  array (
    'c72fcb482333e3db77933ac05d8b7d53b52aae27' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/zhuangxiu_1/html/index.html',
      1 => 1466854098,
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
function content_576e6c106364a4_75641993 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="cont-main">
	<h2>欢迎来到<a href=""><?php echo $_smarty_tpl->tpl_vars['project']->value['title'];?>
</a></h2>
	<div class="grid-list">
		<h4><?php echo $_smarty_tpl->tpl_vars['home_position']->value[1]['category_info']['cname'];?>
</h4>
		<ul>
			<?php
$_from = $_smarty_tpl->tpl_vars['home_position']->value[1]['articles'];
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
			<li>
				<a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" width="280" height="100" alt=""></a>
				<p style=""><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</p>
			</li>
			<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>

		</ul>
		<div class="clear"></div>
		<div class="rd-more"><a href="/list.php?cid=<?php echo $_smarty_tpl->tpl_vars['home_position']->value[0]['category_info']['cid'];?>
"><button class="btn btn-2 btn-2h">More</button></a></div>
	</div>
	<div class="grid-list1">
		<h4><?php echo $_smarty_tpl->tpl_vars['home_position']->value[2]['category_info']['cname'];?>
</h4>
		<ul>
			<?php
$_from = $_smarty_tpl->tpl_vars['home_position']->value[2]['articles'];
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
			<li>
				<a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" width="280" height="100" alt=""></a>
				<p style=""><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</p>
			</li>
			<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
?>

		</ul>
		<div class="clear"></div>
		<div class="rd-more"><a href="/list.php?cid=<?php echo $_smarty_tpl->tpl_vars['home_position']->value[0]['category_info']['cid'];?>
"><button class="btn btn-2 btn-2h">More</button></a></div>
	</div>
	

	<div class="clear"></div>
	<div class="grid-list-main">
	<div class="grid-list-btm">
		<h4><?php echo $_smarty_tpl->tpl_vars['home_position']->value[3]['category_info']['cname'];?>
</h4>
		<p><?php echo $_smarty_tpl->tpl_vars['home_position']->value[3]['articles'][0]['memo'];?>
</p>
	<div class="readmore"><a href="/list.php?cid=<?php echo $_smarty_tpl->tpl_vars['home_position']->value[3]['category_info']['cid'];?>
"><button class="btn btn-2 btn-2h">More</button></a></div>
	</div>	
	<div class="grid-list-pic">
		<h4><?php echo $_smarty_tpl->tpl_vars['home_position']->value[4]['category_info']['cname'];?>
</h4>
		<ul>
			<?php
$_from = $_smarty_tpl->tpl_vars['home_position']->value[4]['articles'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_2_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_2_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
			<li><a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt=""></a></li>
			<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_2_saved_local_item;
}
if ($__foreach_item_2_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_2_saved_item;
}
?>
		</ul>
		
	</div>
	<div class="clear"></div>
	</div>
</div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
