<?php
include ("init.php");

$SW->Template->setData('user_id', $_SESSION['user_id']);
$SW->Template->setData('username', $_SESSION['username']);

$SW->Actions->loadRecords($SW->Template->getData('user_id'));
?>