<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
    <div id="info">

    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12">
    <h2>Таблица: <i>Пользователей</i></h2>
    <hr>
    <table id="usersTable" class="table table-hover">

    </table>
    <script>
        new Table("Users", document.getElementById("usersTable"));
    </script>
        </div>
    </div>
</div>
{/capture}
{include 'container.tpl'}
</body>
</html>