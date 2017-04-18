<?php
/* Smarty version 3.1.30, created on 2017-04-15 22:57:28
  from "/var/www/html/cars/application/templates/site/buy.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58f27b2876a9b4_90065298',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcf6bca5a450d6d177c843f1c2d866ae746d4100' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/buy.tpl',
        1 => 1492286247,
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
    function content_58f27b2876a9b4_90065298(Smarty_Internal_Template $_smarty_tpl)
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

<?php echo '<script'; ?>
src="../cars/media/JavaScript/Order.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="../cars/media/style/datepicker.min.css">
<?php echo '<script'; ?>
src="../cars/media/JavaScript/datepicker.min.js"><?php echo '</script'; ?>
>
<div class="panel panel-default">
    <div class="panel-heading">
        Заказать
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="form-group">
                <div class="col-md-6 col-xs-12" id="orderPanel">

                    </div>
                <div class="col-md-6 col-xs-12">
                    <div id="map" style="width: auto; height: 400px"></div>
                    <?php echo '<script'; ?>
                    >

                    ymaps.ready(init);
                    var map;
                    function init() {
                    map = new ymaps.Map("map", {
                    center: [55.76, 37.64],
                    zoom: 10
                    });
                    }
                    new Order(document.getElementById("orderPanel"));
                    <?php echo '</script'; ?>
                    >
                </div>
            </div>

        </div>

    </div>
</div>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>


<?php $_smarty_tpl->_subTemplateRender("file:container.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
