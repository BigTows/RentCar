<?php
/* Smarty version 3.1.30, created on 2017-03-11 19:06:14
  from "/var/www/html/cars/application/templates/site/nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c42076f274e3_61007197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8a86bc8913bdc148191b67cf2a1f8a58d01fcd0' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/nav.tpl',
      1 => 1489241747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c42076f274e3_61007197 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Прокат</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['nav'], 'link', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['link']->value) {
?>
                <li><a href=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
    </div>
</nav><?php }
}
