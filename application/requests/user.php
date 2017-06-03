<?php

session_start();

require '../classes/user.php';
require '../classes/data.checker.php';
require '../configs/database.connect.php';
require 'response.php';
$DBConnect->setDebug(false);
$user = new User($DBConnect, session_id());
if (isset($_POST['getProfile'])) {
    if ($user->havePerm("view_profile")) {
        $querySQL = "SELECT * FROM Profile WHERE id_user = :id";
        $statement = $DBConnect->sendQuery($querySQL, [
            "id" => $user->getId()
        ]);
        if ($DBConnect->hasError()) {
            $response = new Response("Произошла ошибка", $statement->errorInfo(), [], 2);
        } else {
            $response = new Response("Данные профиля переданны.", "", $statement->fetchAll(PDO::FETCH_OBJ), 0);
        }
    } else {
        $response = new Response("У вас нет прав для просмотра профиля!", "", [], 2);
    }
} else if (isset($_POST['getFreeCars'])) {
    if ($user->havePerm("view_free_cars")) {
        $QuerySQL = "SELECT Rolling_Cars.id_rolling_car, Cars.cost_per_day, Brands.name as name_brand, Cars.model, Colors.name as name_color, Colors.hex as hex_color, Brands.id_brand, Colors.id_color, Locations.longitude, Locations.latitude, Locations.address FROM (SELECT DISTINCT id_rolling_car as id_car, (SELECT HL.id_location FROM History_locations as HL WHERE HL.id_rolling_car = id_car ORDER bY HL.date DESC LIMIT 1) as id_location FROM History_locations) as relevant_location INNER JOIN Rolling_Cars on Rolling_Cars.id_rolling_car = relevant_location.id_car INNER JOIN Colors on Colors.id_color = Rolling_Cars.id_color INNER JOIN Cars on Cars.id_car = Rolling_Cars.id_car INNER JOIN Brands on Brands.id_brand = Cars.id_brand INNER JOIN Locations on Locations.id_location = relevant_location.id_location WHERE Rolling_Cars.id_status=1";
        $statement = $DBConnect->sendQuery($QuerySQL);
        if ($DBConnect->hasError()) {
            $response = new Response("Произошла ошибка", $statement->errorInfo(), [], 2);
        } else {
            $response = new Response("Данные от таблицы были переденны.", "", $statement->fetchAll(PDO::FETCH_OBJ), 0);
        }
    } else {
        $response = new Response("У вас нет прав для просмотра свободных машин!", "", [], 2);
    }
} else if (isset($_POST['order'])) {
    if ($user->havePerm("create_order")) {
        $input = "";
        $values = "";
        $valuesArray = [];
        $valuesArray += array("id_user" => $user->getId());
        $dataArray = json_decode($_POST['data'], true);
        foreach ($dataArray as $item => $key) {
            $values = $values . ":" . $item . ",";
            $valuesArray += array($item => $key);
        }
        $input = rtrim($input, ",");
        $values = rtrim($values, ",");
        $statement = $DBConnect->sendQuery("call Rent (:id_user," . $values . ")", $valuesArray);
        if ($DBConnect->hasError()) {
            $response = new Response("Данная машина занята.", "Видимо эту машину уже кто-то выбрал, обновите страницу и попробуйте заново!", [], 2);
        } else {
            $response = new Response("Заказ обработан!", "", [$valuesArray, $values], 0);
        }
    } else {
        $response = new Response("У вас нет прав для создания заказа!", "", [], 2);
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