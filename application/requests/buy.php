<?php

session_start();

require '../classes/user.php';
require '../classes/data.checker.php';
require '../configs/database.connect.php';
require 'response.php';
$DBConnect->setDebug(false);
$user = new User($DBConnect, session_id());
if (isset($_POST['getFreeCars'])) {
    if ($user->havePerm("view_free_cars")) {
        $QuerySQL = "SELECT * FROM freeCars";
        $statement = $DBConnect->sendQuery($QuerySQL);
        if ($DBConnect->hasError()) {
            $response = new Response("Произошла ошибка", $statement->errorInfo(), [], 2);
        } else {
            $response = new Response("Данные от таблицы были переденны.", "", $statement->fetchAll(PDO::FETCH_OBJ), 0);
        }
    } else {
        $response = new Response("У вас нет прав для просмотра свободных машин!", "", [], 2);
    }
} else {
    $response = new Response("Method not found", "", [], 1);
}
$response->execute();

/**
 *
 * CREATE VIEW freeCars as SELECT Brands.name as name_brand,Cars.model,Colors.name as name_color,Cars.id_brand,Rolling_Cars.id_color,Rolling_Cars.id_rolling_car FROM Cars
 * INNER JOIN Rolling_Cars on Rolling_Cars.id_car=Cars.id_car
 * INNER JOIN Colors on Rolling_Cars.id_color=Colors.id_color
 * INNER JOIN Brands on Brands.id_brand =Cars.id_brand
 * INNER JOIN History_locations on History_locations.id_rolling_car=Rolling_Cars.id_rolling_car;
 * WHERE Rolling_Cars.id_status = 1
 */