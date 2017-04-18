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
            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                var ctx = document.getElementById("myChart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
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