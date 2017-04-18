<?php

require '../classes/user.php';
require '../configs/database.connect.php';
require 'response.php';
$DBConnect->setDebug(false);
$user = new User($DBConnect, session_id());

if (isset($_POST['count'])) {
    if ($user->havePerm("stats_" . strtolower($_POST['count']))) {
        $response = new Response("У вас нет прав на статистику: " . $_POST['count'] . "!", "", [], 2);
    } else {
        if ($_POST['count'] == "car") {
            $DBConnect->sendQuery("SELECT * FROM ");
        } else if ($_POST['count'] == "order") {
            $statement = $DBConnect->sendQuery("SELECT COUNT(date_begin) as count ,date_begin as date FROM `Orders` GROUP BY date_begin", []);
            if ($DBConnect->hasError()) {
                $response = new Response("Произошла ошибка", $statement->errorInfo(), [], 2);
            } else {
                $response = new Response("Данные от таблицы были переденны.", "", $statement->fetchAll(PDO::FETCH_OBJ), 0);
            }

        } else {
            $response = new Response("Статистика не найдена", "Статистика Count: " . $_POST['count'] . " не найдена", [], 1);
        }
    }
    $response->execute();
} else if (isset($_POST['compare'])) {
    if ($_POST['compare'] == "order") {

    }
}