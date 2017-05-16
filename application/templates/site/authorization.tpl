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
                        <input type="text" name="name" id="userRegistration" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="passwordRegistration">Пароль</label>
                        <input type="password" name="password" id="passwordRegistration" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstNameRegistration">Ваше имя</label>
                        <input type="text" name="firstName" id="firstNameRegistration" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="secondNameRegistration">Ваша фамилия</label>
                        <input type="text" name="secondName" id="secondNameRegistration" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="emailRegistration">Почта</label>
                        <input type="email" name="email" id="emailRegistration" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="passportRegistration">Паспорт</label>
                        <input type="text" name="passport" id="passportRegistration" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phoneRegistration">Телефон</label>
                        <input type="tel" name="telephone" id="phoneRegistration" required class="form-control">
                    </div>
                    <div id="infoRegistration"></div>
                    <button id="registration" class="btn btn-success">Регистрация</button>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <script>
        var btnAuth = document.getElementById("auth");
        btnAuth.addEventListener("click", function () {
            new Binding({
                url: "application/requests/index.php",
                action: "auth",
                responsePanel: document.getElementById("infoAuth"),
                data: ["user", "password"]
            }, function () {
                location.href = "/cars/";
            });
        });

        var btnReg = document.getElementById("registration");
        btnReg.addEventListener("click", function () {
            new Binding({
                url: "application/requests/index.php",
                action: "registration",
                responsePanel: document.getElementById("infoRegistration"),
                data: ["userRegistration", "passwordRegistration",
                    "emailRegistration", "passportRegistration", "phoneRegistration", "firstNameRegistration", "secondNameRegistration"]
            }, function () {
                // location.reload();
            });
        });
    </script>
{/capture}
{include 'container.tpl'}
</body>
</html>