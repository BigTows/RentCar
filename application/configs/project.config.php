<?php
/**
 * @author BigTows
 * @version 1.0
 */

/**
 * @var string switch debug mode. (true == on, false == off);
 */
const DEBUG_MODE = true;
$DBName = "RollingCars";
$DBUser = "admin_car";
$DBPassword = "Car_Admin";
$DBHost = "localhost";
$DBDriver = "mysql";

/**
 * Then there is the function
 */
$DBDns = $DBDriver.":host=".$DBHost.";dbname=".$DBName;
