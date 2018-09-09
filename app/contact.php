<?php

include("init.php");



if(isset($_POST['message'])){
    $SW->Template->setData('message', $_POST['message']);
    $SW->Template->setData('email', $_SESSION['email']);
    
    if(empty($SW->Template->getData('message'))){
        echo '<div class="alert alert-danger">The message field is empty!</div>';
    }else{
        $message = filter_var($SW->Template->getData('message'), FILTER_SANITIZE_STRING);  
        $email = filter_var($SW->Template->getData('email'), FILTER_SANITIZE_EMAIL);
        $message = $SW->Auth->prepareVariables($message);
        $email = $SW->Auth->prepareVariables($email);
        
        $SW->Actions->sendMessage($email, $message);
            echo '<div class="alert alert-success">The message has been sent</div>';
        
    }
    
}










?>