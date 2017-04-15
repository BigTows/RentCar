<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'smarty.config.php';
$smarty->template_dir = $rootPath . 'application/templates/site';
require 'database.connect.php';
require $rootPath . 'application/classes/user.php';
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
    ];

    $pagesWithAccess = [
        "buy" => "buy.tpl",
        "profile" => "profile.tpl"
    ];

    $response['temp'] = $response['temp'] ?? "index";
    if ($user->isLoggin() && $response['temp'] == "auth") {
        return "profile.tpl";
    } else
        if ($pagesWithAccess[$response['temp']] ?? false) {
            return ($user->havePerm("page_" . $response['temp'])) ? $pagesWithAccess[$response['temp']] : "permissions.tpl";
        }
    return $pages[$response['temp']] ?? "404.tpl";
}


?>