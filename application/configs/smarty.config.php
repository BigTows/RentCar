<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . "/cars/";


require $rootPath . 'application/libs/Smarty.class.php';


$smarty = new Smarty();
$smarty->compile_dir = $rootPath . 'application/templates/ready';
$smarty->config_dir = $rootPath . 'application/configs';
$smarty->cache_dir = $rootPath . 'application/templates/cache';

