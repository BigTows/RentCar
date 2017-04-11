<?php
/**
 * It simulation page for processing orders
 * PS This page poorly written
 */

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="jumbotron" style="padding: 20px; border-radius: 20px;">
            <h1>Ваш заказ</h1>
            <p>Машина <?php echo $_GET['car'] ?> С <?php echo $_GET['dateB'] ?> по <?php echo $_GET['dateE'] ?></p>
            <p><a class="btn btn-primary btn-lg" id="buy" role="button">Купить</a></p>
            <script>
                var carID = <?php echo $_GET['carID'] ?>;
                var dateB = "<?php echo $_GET['dateB'] ?>";
                var dateE = "<?php echo $_GET['dateE'] ?>";
            </script>
            <script>
                document.getElementById("buy").addEventListener("click", function () {
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "application/requests/buy.php");
                    var data = new FormData();
                    data.append("order", "");
                    data.append("data", JSON.stringify({
                        "id_rolling_car": carID,
                        "date_begin": dateB,
                        "date_end": dateE
                    }));
                    xhr.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                        }
                    };
                    xhr.send(data);
                });
            </script>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
</body>
</html>
