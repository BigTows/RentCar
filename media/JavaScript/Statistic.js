class Statistic {
    constructor(elements, stat, typeChart) {
        this.home = elements.chart;
        this.panel = elements.info;
        this.type = {
            chart: typeChart,
            stat: {
                action: stat.action,
                item: stat.item
            }
        };
        this.getData();
    }

    getData() {
        let self = this;
        var xhr = new XMLHttpRequest();
        var data = new FormData();
        data.append(this.type.stat.action, this.type.stat.item);
        xhr.open("POST", "/cars/application/requests/statistic.php");
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText);
                let responseJSON = JSON.parse(this.responseText);
                if (responseJSON.level == 0) {
                    self.viewChart(responseJSON.data);
                } else {
                    printResponse(responseJSON, self.panel);
                }
            }
        };
        xhr.send(data);
    }

    viewChart(jsonData) {
        var data = [];
        var labels = [];
        for (let key in jsonData) {
            labels[labels.length] = jsonData[key].date;
            data[data.length] = jsonData[key].count;
        }
        new Chart(this.home, {
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
                            stepSize: 1,
                            beginAtZero: false
                        }
                    }]
                }
            }
        });
    }
}