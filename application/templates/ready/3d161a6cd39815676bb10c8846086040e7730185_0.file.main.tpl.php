<?php
/* Smarty version 3.1.30, created on 2017-04-27 10:30:45
  from "/var/www/html/cars/application/templates/adminpanel/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_59019e25258544_86157100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d161a6cd39815676bb10c8846086040e7730185' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/main.tpl',
        1 => 1493278239,
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
    function content_59019e25258544_86157100(Smarty_Internal_Template $_smarty_tpl)
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

<div id="info">

</div>
<div class="panel panel-default">
    <div class="panel-heading">Главная страница</div>

    <div class="panel-body">
        <div class="row">
            <?php echo '<script'; ?>
            src="../media/JavaScript/Chart.min.js"><?php echo '</script'; ?>
            >
            <?php echo '<script'; ?>
            src="../media/JavaScript/Statistic.js"><?php echo '</script'; ?>
            >
            <canvas id="order" width="400" height="400"></canvas>
            <?php echo '<script'; ?>
            >
            new Statistic({
            chart: document.getElementById("order"),
            info: document.getElementById("info")
            }, {
            action: "count",
            item: "order"
            },
            "bar");
            <?php echo '</script'; ?>
            >
        </div>
        <div class="panel-footer">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['footer']; ?>

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
