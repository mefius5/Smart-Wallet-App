<?php

include("init.php");

$user_id = $_SESSION['user_id'];
$newemail = $_POST['email'];

$errors = '';

if(empty($_POST['email'])){
    $errors .= '<p>Please enter a email</p>';  

}else{
    $$newemail = filter_var($newemail, FILTER_SANITIZE_EMAIL);
    if(!filter_var($$newemail, FILTER_VALIDATE_EMAIL)){
        $errors .= '<p>Please enter a valid email</p>';     
    }
}


if($SW->Auth->checkExistingEmail($_POST['email'])==FALSE){
    $errors .= '<p>This eamil is already exist!</p>';
    
}

if($errors!=''){
    $resultMessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultMessage;   
}else{
    $newemail = $SW->Auth->prepareVariables($newemail);
    $SW->Actions->updateEmail($newemail, $user_id)==TRUE;
}



?>