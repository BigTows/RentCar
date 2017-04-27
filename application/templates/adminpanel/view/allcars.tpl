<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
    <div id="info">

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Представление: Все машины</div>

        <div class="panel-body">
            <hr>
            <table id="allCarsView" class="table table-hover">

            </table>

            <script>
                new Table("All_cars", document.getElementById("allCarsView"));
            </script>
        </div>
        <div class="panel-footer">
            {$data.footer}
        </div>
    </div>
{/capture}
{include 'container.tpl'}
</body>
</html>
