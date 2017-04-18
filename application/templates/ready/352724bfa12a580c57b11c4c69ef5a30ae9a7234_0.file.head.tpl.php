<?php
/* Smarty version 3.1.30, created on 2017-04-15 19:57:16
  from "/var/www/html/cars/application/templates/site/head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58f250ecb97a87_94785723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '352724bfa12a580c57b11c4c69ef5a30ae9a7234' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/head.tpl',
        1 => 1492275397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
    function content_58f250ecb97a87_94785723(Smarty_Internal_Template $_smarty_tpl)
    {
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="./media/style/main.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./media/JavaScript/Binding.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"><?php echo '</script'; ?>
        >
    <title><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</title>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head><?php }
}
