<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./media/style/main.css">
    <title>{$data.title}</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="alert alert-success">
    <strong><h1>Успешно!</h1></strong>
    <hr>Вы успешно вышли, через 3 секунды вас перенаправят на главную страницу.
</div>
<script>
    setTimeout(function () {
        window.location.assign("http://194.87.239.206/cars/");
    },3000);
</script>