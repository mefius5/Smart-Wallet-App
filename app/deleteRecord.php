<?php
include ("init.php");

$SW->Template->setData('record_id', $_POST['record_id']);

if($SW->Actions->deleteRecord($SW->Template->getData('record_id'))==TRUE){
    $SW->Template->load('core/views/v_pages/v_addProfit.php');
}
else{
    $SW->Template->load('core/views/v_pages/v_addProfit.php');
}