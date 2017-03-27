<?php
$rootPath = $_SERVER['DOCUMENT_ROOT']."/cars/";
require_once $rootPath.'application/classes/database.php';
$DBConnect = new DataBase($DBDns,$DBUser,$DBPassword);
?>