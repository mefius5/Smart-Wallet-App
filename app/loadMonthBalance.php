<?php
include ("init.php");

$SW->Template->setData('user_id', $_SESSION['user_id']);
$SW->Template->setData('profit_expense', $_POST['profit_expense']);



if($SW->Actions->loadMonthBalance($SW->Template->getData('user_id'), $SW->Template->getData('profit_expense')));

?>