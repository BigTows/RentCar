<?php
/* Smarty version 3.1.30, created on 2017-03-29 15:15:52
  from "/var/www/html/cars/application/templates/adminpanel/cars/brand.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58dba57842d881_27499352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9816b6ab586fb04b56e46508b5ee98195b23359' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/cars/brand.tpl',
        1 => 1490789751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
    function content_58dba57842d881_27499352(Smarty_Internal_Template $_smarty_tpl)
    {
?>
        <h2>Таблица: <i>Бренды</i></h2>
        <hr>
<table id="brandTable" class="table table-hover">

</table>

<?php echo '<script'; ?>
>
        new Table("Brands", document.getElementById("brandTable"));
<?php echo '</script'; ?>
><?php }
}
