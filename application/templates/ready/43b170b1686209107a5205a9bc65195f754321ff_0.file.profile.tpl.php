<?php
/* Smarty version 3.1.30, created on 2017-04-15 10:49:26
  from "/var/www/html/cars/application/templates/site/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58f1d086b0b698_19880708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43b170b1686209107a5205a9bc65195f754321ff' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/profile.tpl',
        1 => 1492242551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:container.tpl' => 1,
  ),
),false)) {
    function content_58f1d086b0b698_19880708(Smarty_Internal_Template $_smarty_tpl)
    {
?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'content', null, null);
?>

<div class="" id="profile">

</div>
<?php echo '<script'; ?>
src="../cars/media/JavaScript/Profile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
new Profile();
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

<?php $_smarty_tpl->_subTemplateRender("file:container.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
