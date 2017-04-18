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

    </div>
    <div class="panel-body">
        <div class="row">
            <script src="../media/JavaScript/Chart.min.js"></script>
            <canvas id="order" width="400" height="400"></canvas>
            <script>
                var orderChart = document.getElementById("order");

                var xhr = new XMLHttpRequest();
                var data = new FormData();
                data.append('count', "order");
                xhr.open("POST", "/cars/application/requests/statistic.php");
                xhr.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        var responseJSON = JSON.parse(this.responseText);
                        if (responseJSON.level == 0) {
                            var data = [];
                            var labels = [];
                            for (var key in responseJSON.data) {
                                labels [labels.length] = responseJSON.data[key].date;
                                data [data.length] = responseJSON.data[key].count;
                            }
                            new Chart(orderChart, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Количество заказов по дате',
                                        data: data,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: false,
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        }
                        console.log(this.responseText);
                    }
                };
                xhr.send(data);
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