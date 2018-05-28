<?php

define("SITE_PATH" , "http://localhost/SMART_WALLET_APP");
define("APP_PATH" , str_replace("\\" , "/", dirname(__FILE__)) . "/");
define("APP_OTHER" , "http://localhost/SMART_WALLET_APP/app/other/");

$server = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'smart_wallet';

require_once(APP_PATH . "core/core.php");

$SW = new SW_Core($server, $user, $pass, $db_name);