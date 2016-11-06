<?php
/* Smarty version 3.1.29, created on 2016-06-25 19:33:36
  from "/var/www/html/iyouhi.com/view/zhuangxiu_1/html/right.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576e6c1068ba22_82821480',
  'file_dependency' => 
  array (
    'b35b3475e1a00d7b506efb1dbab620693f83b1f7' => 
    array (
      0 => '/var/www/html/iyouhi.com/view/zhuangxiu_1/html/right.html',
      1 => 1466854098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576e6c1068ba22_82821480 ($_smarty_tpl) {
?>
<div class="sidebar">

	<div class="sidebar-nav">
	<h4 style="color:rgb(18,101,103);text-transform:capitalize;font-size: 1.6em;">联系方式</h4>
	<nav>
		<ul>
			<li><img src="<?php echo @constant('STATIC_PATH');?>
images/arrow.png" alt=""><a>地址:<?php echo $_smarty_tpl->tpl_vars['project']->value['address'];?>
</a></li>
			<li><img src="<?php echo @constant('STATIC_PATH');?>
images/arrow.png" alt=""><a>电话:<?php echo $_smarty_tpl->tpl_vars['project']->value['phone'];?>
</a></li>
			<li><img src="<?php echo @constant('STATIC_PATH');?>
images/arrow.png" alt=""><a>手机:<?php echo $_smarty_tpl->tpl_vars['project']->value['mobile'];?>
</a></li>
			<li><img src="<?php echo @constant('STATIC_PATH');?>
images/arrow.png" alt=""><a>邮箱:<?php echo $_smarty_tpl->tpl_vars['project']->value['email'];?>
</a></li>
		</ul>
	</nav>
	</div>
</div>
<div class="sidebar1">
	<h4><?php echo $_smarty_tpl->tpl_vars['home_position']->value[5]['category_info']['cname'];?>
</h4>
	<img src="<?php echo @constant('STATIC_PATH');?>
images/pic3.jpg" width="195px" alt="">
	<nav>
		<ul>
			<?php
$_from = $_smarty_tpl->tpl_vars['home_position']->value[5]['articles'];
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
			<li><a href="/article.php?aid=<?php echo $_smarty_tpl->tpl_vars['item']->value['aid'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
			<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
		</ul>
	</nav>
</div>
<div class="clear"></div><?php }
}
