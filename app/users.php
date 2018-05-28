<?php 
include ("init.php");


if($SW->Auth->checkLoginStatus() == FALSE){
    $SW->Template->setAlert('Brak dostępu', 'danger');
    $SW->Template->redirect('app/login.php');
}else{
    $SW->Template->redirect('core/views/v_pages/v_users.php');
}

?>