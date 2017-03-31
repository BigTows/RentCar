<?php
/* Smarty version 3.1.30, created on 2017-03-29 15:16:22
  from "/var/www/html/cars/application/templates/adminpanel/cars/type_transport.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58dba59628f677_75152973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '019aae28277048f9c0825f7eaf64c9247c2e82a8' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/cars/type_transport.tpl',
        1 => 1490789781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
    function content_58dba59628f677_75152973(Smarty_Internal_Template $_smarty_tpl)
    {
?>
        <h2>Таблица: <i>Тип транспорта</i></h2>
<hr>
<table id="typeTransportTable" class="table table-hover">

</table>

<?php echo '<script'; ?>
>

        new Table("Type_transport", document.getElementById("typeTransportTable"));

<?php echo '</script'; ?>
><?php }
}
