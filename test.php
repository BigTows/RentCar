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
$var = new User($DBConnect,"BigTows","test");
echo $var->isLoggin();

echo $var->havePerm("adminpanel");