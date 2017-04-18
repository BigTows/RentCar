<?php
/* Smarty version 3.1.30, created on 2017-04-16 00:01:19
  from "/var/www/html/cars/application/templates/site/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58f28a1f14bad7_62420287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43b170b1686209107a5205a9bc65195f754321ff' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/profile.tpl',
        1 => 1492289233,
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
    function content_58f28a1f14bad7_62420287(Smarty_Internal_Template $_smarty_tpl)
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

<div class="panel panel-default">
    <div class="panel-heading">
        Профиль: <?php echo $_smarty_tpl->tpl_vars['profile']->value->getFirstName(); ?>
        <?php echo $_smarty_tpl->tpl_vars['profile']->value->getSecondName(); ?>

    </div>
    <div class="panel-body">
        <div class="" id="profile">

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#default">Информация</a></li>
                    <li><a data-toggle="tab" href="#orders">Заказы</a></li>
                </ul>

                <div class="tab-content">
                    <div id="default" class="tab-pane fade in active">
                        <h3>Персональные данные</h3>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i>Имя</i>: <?php echo $_smarty_tpl->tpl_vars['profile']->value->getFirstName(); ?>
                            </li>
                            <li class="list-group-item">
                                <i>Фамилия</i>: <?php echo $_smarty_tpl->tpl_vars['profile']->value->getSecondName(); ?>
                            </li>
                            <li class="list-group-item">
                                <i>Паспорт</i>: <?php echo $_smarty_tpl->tpl_vars['profile']->value->getPassport(); ?>
                            </li>
                            <li class="list-group-item">
                                <i>Телефон</i>: <?php echo $_smarty_tpl->tpl_vars['profile']->value->getTelephone(); ?>
                            </li>
                            <li class="list-group-item">
                                <i>E-mail</i>: <?php echo $_smarty_tpl->tpl_vars['profile']->value->getEmail(); ?>
                            </li>

                        </ul>
                    </div>
                    <div id="orders" class="tab-pane fade">
                        <h3>Ваши заказы
                            <span style="font-size: 15px" data-toggle="tooltip"
                                  title="Показываются только актуальные заказа"
                                  class="glyphicon glyphicon-info-sign"></span>
                        </h3>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Номер заказа</th>
                                <th>Брэнд</th>
                                <th>Модель</th>
                                <th>Начальная дата</th>
                                <th>Дата конца</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value->getOrders(), 'foo');
                            if ($_from !== null) {
                                foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['foo']->value["id_order"]; ?>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['foo']->value["brand"]; ?>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['foo']->value["model"]; ?>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['foo']->value["date_begin"]; ?>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['foo']->value["date_end"]; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
                            ?>


                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
    $('[data-toggle="tooltip"]').tooltip();
    <?php echo '</script'; ?>
>
    <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:container.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
