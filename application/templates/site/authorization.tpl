<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
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
                        <input type="text" name="user" id="user" class="form-control">
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
                        <label for="user">Имя пользователя</label>
                        <input type="text" name="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="passport">Паспорт</label>
                        <input type="text" name="passport" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Телефон</label>
                        <input type="tel" name="telephone" class="form-control">
                    </div>
                    <button class="btn btn-success">Регистрация</button>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <script>
        var btn = document.getElementById("auth");
        btn.addEventListener("click", function () {
            new Binding({
                url: "application/requests/index.php",
                action: "Auth",
                responsePanel: document.getElementById("infoAuth"),
                data: [document.getElementById("user"), document.getElementById("password")]
            }, function () {
                location.reload();
            });
        });
    </script>
{/capture}
{include 'container.tpl'}
</body>
</html>