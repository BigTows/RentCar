<?php
/* Smarty version 3.1.30, created on 2017-04-05 13:24:35
  from "/var/www/html/cars/application/templates/adminpanel/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58e4c5e3bca442_82893166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc45f652993ecf2c319679684d00ba35734e6d72' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/login.tpl',
        1 => 1491336476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:container.tpl' => 1,
  ),
),false)) {
    function content_58e4c5e3bca442_82893166(Smarty_Internal_Template $_smarty_tpl)
    {
?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'content', null, null);
?>

<div class="row center-block">
    <div class="col-md-4 col-sm-4"></div>
    <div class="col-sm-4 col-md-4" style="margin-top: 200px">
        <div class="thumbnail">
            <div class="caption">
                <h4>Авторизация</h4>
                <div class="form-group">
                    <label for="name">Логин</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Логин">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                </div>
                <div id="info"></div>
                <button type="submit" id="auth" name="Auth" class="btn btn-default btn-primary center-block">Войти
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4"></div>
</div>
<?php echo '<script'; ?>
>
var btn = document.getElementById("auth");
btn.addEventListener("click", function () {
new Binding({
url: "../application/requests/index.php",
action: "auth",
responsePanel: document.getElementById("info"),
data: ["name", "password"]
}, function () {
location.reload();
});
});
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

<?php $_smarty_tpl->_subTemplateRender("file:container.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
