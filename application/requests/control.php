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
if (isset($_POST['changeStatus']){
    if ($user->havePerm("change_status_car")) {
            $statement = $DBConnect->sendQuery("UPDATE Rolling_Cars")
    }else{
        $response = new Response("Нет доступа!", "", [], 2);
    }
}else{
    $response = new Response("Метод не найден", "Проверьте введенные данные.", [], 1);
}
$response->execute();