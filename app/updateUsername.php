<?php

include("init.php");

//$SW->Template->setData('user_id', $_SESSION['user_id']);
//$SW->Template->setData('username', $_SESSION['username']);


$user_id = $_SESSION['user_id'];

//Get username sent through Ajax
$username = $_SESSION['username'];

if($SW->Actions->updateUsername($username, $user_id)==TRUE){
    $SW->Actions->updateUsername($username, $user_id);
};
