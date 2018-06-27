<?php

include("init.php");

//$SW->Template->setData('user_id', $_SESSION['user_id']);
//$SW->Template->setData('username', $_SESSION['username']);

$id = $_SESSION['user_id'];

//Get username sent through Ajax
$username = $_SESSION['username'];

$SW->Actions->updateUsername($username, $id);
    
    
    //$SW->Actions->updateUsername($SW->Template->getData('username'), $SW->Template->getData('user_id'));


