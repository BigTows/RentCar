<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
    <div id="info">

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Главная страница</div>

    <div class="panel-body">
        <div class="row">
            <script src="../media/JavaScript/Chart.min.js"></script>
            <script src="../media/JavaScript/Statistic.js"></script>
            <canvas id="order" width="400" height="400"></canvas>
            <script>
                new Statistic({
                        chart: document.getElementById("order"),
                        info: document.getElementById("info")
                    }, {
                        action: "count",
                        item: "order"
                    },
                    "bar");
            </script>
        </div>
        <div class="panel-footer">
            {$data.footer}
        </div>
    </div>
    </div>
{/capture}
{include 'container.tpl'}

</body>
</html>