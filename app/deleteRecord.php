<?php
include ("init.php");

$SW->Template->setData('record_id', $_POST['id']);

if($SW->Actions->deleteRecord($SW->Template->getData('record_id'))==TRUE){
    $SW->Template->load('core/views/v_pages/v_users.php');
    
}
else{
    $SW->Template->load('core/views/v_pages/v_users.php');
}