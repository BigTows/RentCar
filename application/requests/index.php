<?php

session_start();
/**
 * This php Listener POST Request
 */
require '../classes/user.php';
require '../configs/database.connect.php';
require 'response.php';
$DBConnect->setDebug(false);
$user = new User($DBConnect, session_id());
if (isset($_POST['Auth'])) {
    $_POST['name'] = $_POST['name'] ?? null;
    $_POST['password'] = $_POST['password'] ?? null;
    if ($user->auth($_POST['name'], $_POST['password'], session_id())) {
        $response = new Response("Авторизация пройдена!", "", [], 0);
    } else {
        $response = new Response("Данные от аккаунта неверны!", "Проверьте введенные данные.", [], 2);
    }
    $response->execute();
} else if (isset($_POST['registration'])) {
    if (!$user->havePerm("not_registration")){
        $user->registration($_POST['username'], $_POST['password'], $_POST['email'], $_POST['']);
    }else{
        $response = new Response("Вы не можете зарегистрироваться!", "", [], 2);
    }

} else if (isset($_POST['getTable'])) {
    if ($user->havePerm("view_" . strtolower($_POST['getTable']))) {
        $statement = $DBConnect->sendQuery("SELECT * FROM " . $_POST['getTable']);
        if ($DBConnect->hasError()) {
            $response = new Response("Произошла ошибка", $statement->errorInfo(), [], 2);
        } else {
            $response = new Response("Данные от таблицы были переденны.", "", $statement->fetchAll(PDO::FETCH_OBJ), 0);
        }
    } else {
        $response = new Response("У вас нет прав на таблицу: " . $_POST['getTable'] . "!", "", [], 2);
    }
    $response->execute();
} else if (isset($_POST['addRecord'])) {
    if ($user->havePerm("insert_" . strtolower($_POST['addRecord']))) {
        $input = "";
        $values = "";
        foreach ($_POST as $item => $key) {
            if ($item != "addRecord") {
                $input = $input . "`" . $item . "`,";
                $values = $values . "'" . $key . "',";
            }
        }
        $input = rtrim($input, ",");
        $values = rtrim($values, ",");

        $querySQL = "INSERT INTO " . $_POST['addRecord'] . " (" . $input . ") VALUES (" . $values . ")";
        $statement = $DBConnect->sendQuery($querySQL);
        if ($DBConnect->hasError()) {
            $response = new Response("Произошла ошибка", $statement->errorInfo(), [], 2);
        } else {
            $response = new Response("Запись добавлена!", "", [], 0);
        }

    } else {
        $response = new Response("У вас нет прав на таблицу: " . $_POST['addRecord'] . "!", "", [], 2);
    }
    $response->execute();
} else {
    $res = new Response("Method not found", "", [], 1);
    $res->execute();
}

/**
 * add:
 *
 *
 */