<?php
include ("init.php");

$SW->Template->setData('user_id', $_SESSION['user_id']);

if($SW->Actions->loadRecords($SW->Template->getData('user_id'))==TRUE){
  $SW->Actions->showRecords($SW->Template->getData('user_id'));   
}else{
     echo '<div class="alert alert-warning">You have not created any notes yet!</div>'; 
     exit;
}






?>