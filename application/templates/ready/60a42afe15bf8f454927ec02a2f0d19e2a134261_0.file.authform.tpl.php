<?php
/* Smarty version 3.1.30, created on 2017-03-15 13:03:23
  from "/var/www/html/cars/application/templates/adminpanel/authform.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c9116b490779_50698243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60a42afe15bf8f454927ec02a2f0d19e2a134261' => 
    array (
      0 => '/var/www/html/cars/application/templates/adminpanel/authform.tpl',
      1 => 1489570750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c9116b490779_50698243 (Smarty_Internal_Template $_smarty_tpl) {
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
            action: "Auth",
            responsePanel: document.getElementById("info"),
            data: ["name", "password"]
        },function () {
            location.reload();
        });
    });
<?php echo '</script'; ?>
><?php }
}
