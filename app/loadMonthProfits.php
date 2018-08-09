<?php
include ("init.php");

$SW->Template->setData('user_id', $_SESSION['user_id']);

echo $SW->Template->getData('user_id');

if($SW->Actions->loadMonthSummary($SW->Template->getData('user_id'), "profit"));

?>