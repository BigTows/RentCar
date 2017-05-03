<?php
/* Smarty version 3.1.30, created on 2017-04-27 10:52:20
  from "/var/www/html/cars/application/templates/adminpanel/head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_5901a334e0f643_86082127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b2d81ede0a8bb16120a6ee8c159c8351472d50a' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/head.tpl',
        1 => 1493279537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
    function content_5901a334e0f643_86082127(Smarty_Internal_Template $_smarty_tpl)
    {
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="../media/JavaScript/Binding.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../media/JavaScript/Table.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
    <title><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</title>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head><?php }
}
