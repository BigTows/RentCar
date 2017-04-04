<?php
/**
 * @author BigTows
 * @version 1.0
 */

/**
 * @var string switch debug mode. (true == on, false == off);
 */
const DEBUG_MODE = true;
$DBName = "RollingCars"; //Data Base name
$DBUser = "admin_car"; // Name user in Data Base
$DBPassword = "Car_Admin2"; // User password
$DBHost = "localhost"; // Host Data Base
$DBDriver = "mysql"; //Driver

/**
 * Then there is the function
 */
$DBDns = $DBDriver.":host=".$DBHost.";dbname=".$DBName;
