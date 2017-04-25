<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'smarty.config.php';
$smarty->template_dir = $rootPath . 'application/templates/site';
require 'database.connect.php';
require $rootPath . 'application/classes/user.php';
require $rootPath . 'application/classes/profile.php';
$user = new User($DBConnect, session_id());
$data = [
    "title" => "Прокат автомобилей",
    "nav" => [
        "Главная" => "/cars"
    ]
];
$data["nav"] += ($user->isLoggin()) ? ["Профиль" => "/cars/profile",
    "Заказать" => "/cars/buy"] : ["Авторизация" => "/cars/auth"];
$smarty->assign("data", $data);

/**
 * @param $response
 * @return mixed|string
 */
function getPage($response)
{

    global $user;
    $pages = [
        "index" => "main.tpl",
        "add" => "add.tpl",
        "test" => "test.tpl",
        "auth" => "authorization.tpl",
        "buy" => "buy.tpl",
        "profile" => "profile.tpl"
    ];
    $response['temp'] = $response['temp'] ?? "index";
    /**
     * @TODO Add Catalog on main page
     */
    if ($user->havePerm("not_" . $response['temp'])) {
        return $pages["index"];
    } else if (needPerm($response['temp'])) {
        if ($user->havePerm("page_" . $response['temp'])) {
            assign($response['temp']);
            return $pages[$response['temp']] ?? "404.tpl";
        } else {
            return "permissions.tpl";
        }
    } else {
        return $pages[$response['temp']] ?? "404.tpl";
    }

}

function needPerm($page)
{
    global $DBConnect;
    return $DBConnect->sendQuery("SELECT * FROM Roles_perm WHERE perm = :perm", [
        "perm" => "page_" . $page
    ])->rowCount();

}

function assign($page)
{
    global $smarty;
    global $user;
    global $DBConnect;
    switch ($page) {
        case "profile": {
            $smarty->assign("profile", new Profile($user, $DBConnect));
            break;
        }

    }
}

?>