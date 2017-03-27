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

<script>
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
</script>