<?php

include("init.php");

if(isset($_POST['username'])){
    
    $SW->Template->setData('input_user', $_POST['username']);
    $SW->Template->setData('input_pass', $_POST['password']);
    
    $errors='';
    
    if(empty($_POST['username'])){
        $errors .= '<p>Please enter a username</p>'; 
     }else{
        $username = filter_var($SW->Template->getData('input_user'), FILTER_SANITIZE_STRING);   
     }
    
    if(empty($SW->Template->getData('input_pass'))){
        $errors .= '<p>Please enter a password</p>'; 
    }else{ 
        $password = filter_var($SW->Template->getData('input_pass', FILTER_SANITIZE_STRING)); 
     }
         
         
//    if (((($_POST['username'])!='')&&(($SW->Template->getData('input_pass'))!=''))&&($SW->Auth->validateLogin($SW->Template->getData('input_user'), $SW->Template->getData('input_pass')) == FALSE)){
//        $errors .= '<p>Incorrect login or password</p>';    
//    }
    
    if($errors!=''){
            $SW->Template->setAlert($errors, 'danger');
            $SW->Template->load('core/views/v_forms/v_login.php'); 
            echo'<script>$.colorbox.resize();</script>';
            exit;
    }
        
    $username = $SW->Auth->prepareVariables($username);
    $password = $SW->Auth->prepareVariables($password);
    
    $password = hash('sha256', $password);
    
    if (($SW->Auth->validateLogin($username, $password) == FALSE)){
        $SW->Template->setAlert("Wrong login or password", 'danger');
        $SW->Template->load('core/views/v_forms/v_login.php'); 
        echo'<script>$.colorbox.resize();</script>';
    }else{
       $_SESSION['username'] = $SW->Auth->saveRow($username, $password, 'username');
       $_SESSION['user_id'] = $SW->Auth->saveRow($username, $password, 'user_id');
        //$_SESSION['username'] = $SW->Template->getData('input_user');
        $_SESSION['loggedin'] = TRUE;
      
//        echo'<script>$.colorbox.close();</script>';
        $SW->Template->load(APP_PATH . "core/views/v_forms/v_loggingin.php"); 
    }     
}else{
    $SW->Template->load('core/views/v_forms/v_login.php');  
}
