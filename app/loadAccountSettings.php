<?php
include ("init.php");

//$SW->Template->setData('user_id', $_SESSION['user_id']);


$user_id = $_SESSION['user_id'];
$username = '';
$email ='';
$SW->Actions->getAccountSettings($user_id)==TRUE;

echo $username;





?>