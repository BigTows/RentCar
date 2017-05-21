<?php
session_start();
/**
 * This php Listener POST Request
 */
require '../classes/user.php';
require '../classes/data.checker.php';
require '../configs/database.connect.php';
require 'response.php';
$DBConnect->setDebug(false);
$user = new User($DBConnect, session_id());
if (isset($_POST['changeStatus'])){
    if ($user->havePerm("change_status_car")) {
            $statement = $DBConnect->sendQuery("UPDATE Rolling_Cars SET id_status=:status WHERE id_rolling_car=:id_car",[
                "status"=>$_POST['status'],
                "id_car"=>$_POST['changeStatus']
            ]);
            if ($DBConnect->hasError()){
                $response = new Response("Произошла ошибка!", "", [], 0);
            }else{
                $response = new Response("Статус машины изменен!", "", [], 0);
            }
    }else{
        $response = new Response("Нет доступа!", "", [], 2);
    }
} else if (isset($_POST['cancelOrder'])) {
    if ($user->havePerm("cancel_order")) {

        $statement = $DBConnect->sendQuery("DELETE FROM Orders WHERE id_order=:id", [
            "id" => $_POST['cancelOrder']
        ]);
        if ($DBConnect->hasError()) {
            $response = new Response("Произошла ошибка!", "", [], 0);
        } else {
            $statement = $DBConnect->sendQuery("UPDATE Rolling_Cars SET id_status=:status WHERE id_rolling_car=:id_car", [
                "status" => 1,
                "id_car" => $_POST['id_car']
            ]);
            if ($DBConnect->hasError()) {
                $response = new Response("Произошла ошибка!", "", [], 0);
            } else {
                $response = new Response("Заказ отменен!", "", [], 0);
            }
        }
    } else {
        $response = new Response("Нет доступа!", "", [], 2);
    }
} else {
    $response = new Response("Метод не найден", "Проверьте введенные данные.", [], 1);
}
$response->execute();