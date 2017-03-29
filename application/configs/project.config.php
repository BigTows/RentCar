<?php
/**
 * @author BigTows
 * @version 1.0
 */

/**
 * @var string switch debug mode. (true == on, false == off);
 */
const DEBUG_MODE = true;
$DBName = ""; //Data Base name
$DBUser = ""; // Name user in Data Base
$DBPassword = ""; // User password
$DBHost = ""; // Host Data Base
$DBDriver = ""; //Driver

/**
 * Then there is the function
 */
$DBDns = $DBDriver.":host=".$DBHost.";dbname=".$DBName;
