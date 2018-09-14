<?php

include("init.php");
$errors ='';

if(empty($_POST["currentpassword"])){
    $errors.='<p>Please enter a current password</p>';  
}else{
    $currentPassword = $_POST["currentpassword"];
    $currentPassword = filter_var($currentPassword, FILTER_SANITIZE_STRING);
    $currentPassword = $SW->Auth->prepareVariables($currentPassword);
    $currentPassword = hash('sha256', $currentPassword);
    
    $user_id = $_SESSION["user_id"];
    
    if($stmt = $SW->Database->prepare("
    SELECT password
    FROM users
    WHERE user_id = ?")){
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows !==1){
            echo '<div class="alert alert-danger">There was a problem running the query</div>';
        }else{
            $row = $result->fetch_array(MYSQL_ASSOC);
            if($currentPassword != $row['password']){
                $errors .= '<p>The password entered is incorrect!</p>';
            }
        }
        
    }
}


if(empty($_POST["password"])){
    $errors .= '<p>Please enter a new Password!</p>';  
}else if(!(strlen($_POST["password"])>5)){
        $errors .= '<p>Your password should be at least 6 characters</p>';
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= '<p>Please confirm your password</p>';
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= '<p>Passwords don\'t match!</p>';
        }
    }
    
}

if($errors!=''){
    $resultMessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultMessage;   
}else{
    $password = $SW->Auth->prepareVariables($password);
    $password = hash('sha256', $password);
    
    if($SW->Actions->updatePassword($password, $user_id)==TRUE){
        echo "<div class='alert alert-success'>Your password has been updated successfully.</div>";
    }else{
        echo "<div class='alert alert-success'>Your password has been updated successfully.</div>";
    }
}


?>