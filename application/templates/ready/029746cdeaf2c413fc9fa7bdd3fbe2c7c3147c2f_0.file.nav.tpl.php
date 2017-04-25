<?php
/* Smarty version 3.1.30, created on 2017-04-18 20:23:43
  from "/var/www/html/cars/application/templates/adminpanel/nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58f64b9f50b3e9_38591505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '029746cdeaf2c413fc9fa7bdd3fbe2c7c3147c2f' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/nav.tpl',
        1 => 1492536220,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
    function content_58f64b9f50b3e9_38591505(Smarty_Internal_Template $_smarty_tpl)
    {
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->tpl_vars['data']->value['name']['nav'];?>
</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['nav'], 'link', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['link']->value) {
?>
                    <li><a href=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <li class="dropdown">
                    <a class="dropdown-toggle" type="button" id="tables" data-toggle="dropdown">Таблицы
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="tables">
                        <?php
                        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['tables'], 'link', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['link']->value) {
?>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a></li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav><?php }
}
