<?php

require '../classes/user.php';
require '../configs/database.connect.php';
require 'response.php';
$DBConnect->setDebug(false);
$user = new User($DBConnect, session_id());

if (isset($_GET[''])) {

}