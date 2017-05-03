<?php
/* Smarty version 3.1.30, created on 2017-04-27 15:14:57
  from "/var/www/html/cars/application/templates/site/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_5901e0c13468d1_94340460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b522d7b34acf489eef4ccacbf581130879f7abe9' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/main.tpl',
        1 => 1493295288,
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
    function content_5901e0c13468d1_94340460(Smarty_Internal_Template $_smarty_tpl)
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

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cars']->value->getCars(), 'foo');
if ($_from !== null) {
    foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
        ?>
        <div class="media">

            <div class="media-left">
                <img src="./media/images/cars/<?php echo $_smarty_tpl->tpl_vars['foo']->value["brand"]; ?>
_<?php echo $_smarty_tpl->tpl_vars['foo']->value["model"]; ?>
.png" width="220px" height="150px"
                     class="img-rounded">
            </div>
            <div class="media-body">
                <div class="media-heading"><h4><?php echo $_smarty_tpl->tpl_vars['foo']->value["brand"]; ?>
                    </h4></div>
                <p><?php echo $_smarty_tpl->tpl_vars['foo']->value["model"]; ?>
                </p>
            </div>
            <div class="media-right">
                <p><?php echo $_smarty_tpl->tpl_vars['foo']->value["description"]; ?>
                </p>
            </div>
        </div>
        <hr>
        <?php
    }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<ul class="pagination">
    <?php
    $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
    $_smarty_tpl->tpl_vars['foo']->step = 1;
    $_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['cars']->value->getCountCars() + 1 - (1) : 1 - ($_smarty_tpl->tpl_vars['cars']->value->getCountCars()) + 1) / abs($_smarty_tpl->tpl_vars['foo']->step));
    if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
        for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1; $_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total; $_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
            $_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;
            $_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total; ?>
            <?php if ($_smarty_tpl->tpl_vars['foo']->value == $_smarty_tpl->tpl_vars['cars']->value->getPage()) { ?>
                <li class="active"><a href="?page=<?php echo $_smarty_tpl->tpl_vars['foo']->value; ?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value; ?>
                    </a></li>
            <?php } else { ?>
                <li><a href="?page=<?php echo $_smarty_tpl->tpl_vars['foo']->value; ?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value; ?>
                    </a></li>
            <?php } ?>
        <?php }
    }
    ?>

</ul>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>


<?php $_smarty_tpl->_subTemplateRender("file:container.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
