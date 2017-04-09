<?php
/* Smarty version 3.1.30, created on 2017-04-04 22:35:54
  from "/var/www/html/cars/application/templates/site/authorization.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
    'unifunc' => 'content_58e3f59acf2233_89558754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8153968eac612233af7c5ebb39bbc7fe7330b8a4' => 
    array (
      0 => '/var/www/html/cars/application/templates/site/authorization.tpl',
        1 => 1491334553,
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
    function content_58e3f59acf2233_89558754(Smarty_Internal_Template $_smarty_tpl)
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
            Аутентификация
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-5">
                    <h1>Авторизация</h1>
                    <div class="form-group">
                        <label for="user">Имя пользователя</label>
                        <input type="text" name="name" id="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div id="infoAuth"></div>
                    <button class="btn btn-success" id="auth">Войти</button>
                    <hr>
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-xs-12 col-sm-5">
                    <h1>Регистрация</h1>
                    <div class="form-group">
                        <label for="userRegistration">Имя пользователя (Логин)</label>
                        <input type="text" name="name" id="userRegistration" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="passwordRegistration">Пароль</label>
                        <input type="password" name="password" id="passwordRegistration" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstNameRegistration">Ваше имя</label>
                        <input type="text" name="firstName" id="firstNameRegistration" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="secondNameRegistration">Ваша фамилия</label>
                        <input type="text" name="secondName" id="secondNameRegistration" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="emailRegistration">Почта</label>
                        <input type="email" name="email" id="emailRegistration" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="passportRegistration">Паспорт</label>
                        <input type="text" name="passport" id="passportRegistration" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phoneRegistration">Телефон</label>
                        <input type="tel" name="telephone" id="phoneRegistration" class="form-control">
                    </div>
                    <div id="infoRegistration"></div>
                    <button id="registration" class="btn btn-success">Регистрация</button>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
var btnAuth = document.getElementById("auth");
btnAuth.addEventListener("click", function () {
new Binding({
url: "application/requests/index.php",
action: "auth",
responsePanel: document.getElementById("infoAuth"),
data: ["user", "password"]
}, function () {
location.reload();
});
});

var btnAuth = document.getElementById("registration");
btnAuth.addEventListener("click", function () {
new Binding({
url: "application/requests/index.php",
action: "registration",
responsePanel: document.getElementById("infoRegistration"),
data: ["userRegistration", "passwordRegistration",
"emailRegistration", "passportRegistration", "phoneRegistration", "firstNameRegistration", "secondNameRegistration"]
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
