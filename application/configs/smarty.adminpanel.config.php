<?php
session_start();
require 'smarty.config.php';
require $rootPath.'application/classes/user.php';
require $rootPath . 'application/classes/controlCars.php';
require 'database.connect.php';
$smarty->template_dir = $rootPath.'application/templates/adminpanel';
$user = new User($DBConnect,session_id());
$data =[
    "title"=>"Прокат автомобилей",
    "name"=>[
        "nav"=>"Админ панель"
    ],
    "nav"=>[
        "Главная" => "/cars/admin",
        "Контроль машин" => "/cars/admin/control"
    ],
    "tables" => [
        "Машины"=>"/cars/admin/cars",
        "Метоположения"=>"/cars/admin/locations",
        "Пользователи" => "/cars/admin/users",
        "Прочее"=>"/cars/admin/other"
    ],
    "view_tables" => [
        "Все машины"=>"/cars/admin/allcars"
    ],
    "footer" => "RentCar system by <a href='https://github.com/BigTows/'>@BigTows</a>"
];

$smarty->assign("data",$data);

/**
 * @param $response
 * @return mixed|string
 * @TODO Add Permission denied page
 */
function getPage($response){
    $pages = [
        "index"=>"main.tpl",
        "add"=>"add.tpl",
        "view"=>"view.tpl",
        "auth"=>"login.tpl",
        "cars" => "cars.tpl",
        "other"=>"other.tpl",
        "locations"=>"locations.tpl",
        "users"=>"users.tpl",
        "control" => "control.tpl",
        "allcars"=>"view/allcars.tpl"
    ];
    global $user;
    if (!$user->havePerm("adminpanel")){
        $response['temp'] = 'auth';
    }else {
        $response['temp'] = $response['temp'] ?? 'index';
        assign($response['temp']);
    }
    return $pages[$response['temp']] ?? "404.tpl";
}

function assign($page)
{
    global $smarty;
    global $user;
    global $DBConnect;
    switch ($page) {
        case "control": {
            $smarty->assign("control", new ControlCars($DBConnect, $user));
            break;
        }

    }
}

