<?php
$rootPath = $_SERVER['DOCUMENT_ROOT']."/cars/";
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*

$Result = $DBConnect->sendQuery("SELECT * FROM Brands WHERE name = :name",["name"=>"Hyundai"]);
while ($row=$Result->fetch()){
    echo $row['name'];
}*/
require $rootPath.'application/configs/database.connect.php';
require $rootPath.'application/classes/user.php';
require_once $rootPath . 'application/classes/data.checker.php';
//var = new User($DBConnect, "BigTows", "1");
//echo $var->isLoggin();

//echo $var->havePerm("adminpanel");


$test = new RegistrationData($DBConnect, [
    "email" => "dsd",
    "phone" => "12312321",
    "name" => "Asdds"]);
echo $test->getMessage();