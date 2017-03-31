<?php
/* Smarty version 3.1.30, created on 2017-03-29 15:16:22
  from "/var/www/html/cars/application/templates/adminpanel/cars/colors.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58dba596296ba2_50027824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8561b1ca64e4ee9258ae850b5fc9a983ada47b30' => 
    array (
        0 => '/var/www/html/cars/application/templates/adminpanel/cars/colors.tpl',
        1 => 1490789772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
    function content_58dba596296ba2_50027824(Smarty_Internal_Template $_smarty_tpl)
    {
?>
        <h2>Таблица: <i>Классификация машин</i></h2>
<hr>
<table id="ClassificationСarsTable" class="table table-hover">

</table>

<?php echo '<script'; ?>
>
        new Table("Classification_cars", document.getElementById("ClassificationСarsTable"));
<?php echo '</script'; ?>
><?php }
}
