<?php
/* Smarty version 3.1.30, created on 2017-03-14 23:22:59
  from "/var/www/html/cars/application/templates/adminpanel/404.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c85123d93642_91964695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86e78e686f63f82996e4a3165c5701436fe6ce76' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/404.tpl',
      1 => 1489522978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_58c85123d93642_91964695 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<h1 class="text-center">Страница не найдена<hr>
    <img src="./../media/other/404.png" alt="404">
    <br>
</h1>
<h1 class="text-center"><a href="/cars/admin">404</a></h1>
</body>
</html><?php }
}
