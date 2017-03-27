<?php
/* Smarty version 3.1.30, created on 2017-03-11 21:00:11
  from "/var/www/html/cars/application/templates/adminpanel/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c43b2bd85236_66600601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc45f652993ecf2c319679684d00ba35734e6d72' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/login.tpl',
      1 => 1489255211,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:authform.tpl' => 1,
    'file:container.tpl' => 1,
  ),
),false)) {
function content_58c43b2bd85236_66600601 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'content', null, null);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:authform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

<?php $_smarty_tpl->_subTemplateRender("file:container.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
