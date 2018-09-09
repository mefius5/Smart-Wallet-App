<?php

include("init.php");

if(isset($_POST['submit'])){
    
    $SW->Template->setData('input_user', $_POST['username']);
    $SW->Template->setData('input_email', $_POST['email']);
    $SW->Template->setData('input_pass', $_POST['password']);
    $SW->Template->setData('input_pass2', $_POST['password2']);
    
   $errors='';
   $warnings='';
    
    if(empty($_POST['username'])){
        
        $errors .= '<p>Please enter a username</p>'; 
    }else{
        $username = filter_var($SW->Template->getData('input_user'), FILTER_SANITIZE_STRING); 
    }
    
    
    if(empty($_POST['email'])){
        $errors .= '<p>Please enter a email</p>';  
        
    }else{
        $email = filter_var($SW->Template->getData('input_email'), FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors .= '<p>Please enter a valid email</p>';     
        }
    }
    
    
    if(empty($SW->Template->getData('input_pass'))){
        $errors .= '<p>Please enter a password</p>';
         
        
    }else if(!(strlen($SW->Template->getData('input_pass'))>5)){
        $errors .= '<p>Your password should be at least 6 characters</p>';
       
          
    }else{ 
        $password = filter_var($SW->Template->getData('input_pass', FILTER_SANITIZE_STRING)); 
        
        if(empty($SW->Template->getData('input_pass2'))){
            $errors .= '<p>Please confirm your password</p>';
             
            
        }else{
            $password2 = filter_var($SW->Template->getData('input_pass2'), FILTER_SANITIZE_STRING);
            
            if($password !== $password2){
                $errors .= '<p>Passwords dont match!</p>';
                
            }
        }
    }
    
    if($SW->Auth->checkExistingUsername($SW->Template->getData('input_user'))==FALSE){
        $warnings .= '<p>This username is already exist!</p>';
    }
    
    if($SW->Auth->checkExistingEmail($SW->Template->getData('input_email'))==FALSE){
        $warnings .= '<p>This eamil is already exist!</p>';
    }
    
    
    
    
    
    if(($errors!='') || ($warnings!='')){
        if($errors!=''){
            $SW->Template->setAlert($errors, 'danger');
        }
        
        if($warnings!=''){
            $SW->Template->setAlert($warnings, 'warning');
        }
        $SW->Template->load('core/views/v_forms/v_signup.php'); 
        echo'<script>$.colorbox.resize();</script>';
        exit;
    }
    
    $username = $SW->Auth->prepareVariables($username);
    $email = $SW->Auth->prepareVariables($email);
    $password = $SW->Auth->prepareVariables($password);
    
    $password = hash('sha256', $password);
    
    
//    $Database = new mysqli($server, $user, $pass, $db_name); 
    
   
    
//    $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
//    $result = mysqli_query($Database, $sql);
//    
//    if(!$result){
//    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
//    exit;
//    }
    
    
    if($SW->Auth->addUser($username, $email, $password)){
        
        $SW->Template->setAlert("Thank for your registring! Now you can log in", 'success');
        
        $SW->Template->load('core/views/v_forms/v_signup.php'); 
        echo'<script>$.colorbox.resize();</script>';
        
        
    }
    else{
        $SW->Template->setAlert('Thank for your registering! Now you can log in', 'success');
        
        $SW->Template->load('core/views/v_forms/v_login.php'); 
        echo'<script>$.colorbox.resize();</script>';
        //echo'<script>$.colorbox.close();</script>';  
        //$SW->Template->redirect('core/templates/t_signupsuccess.php'); 
    }
    
//   $SW->Auth->addUser($username, $email, $password);
//        $SW->Template->setAlert('There was an error inserting the user into database!' , 'danger');
//        $SW->Template->load('core/views/v_signup.php'); 
//        echo'<script>$.colorbox.resize();</script>';
//        exit;
//    }else{
//        $SW->Template->setAlert("Thank for your registring! Now you can log in", 'success');
//        $SW->Template->load('core/views/v_signup.php'); 
//        echo'<script>$.colorbox.resize();</script>';
//   }
//    
//    
//    if($SW->Auth->addUser($username, $email, $password)){
//       $SW->Template->setAlert("Thank for your registring! Now you can log in", 'success');
//        $SW->Template->load('core/views/v_signup.php'); 
//        echo'<script>$.colorbox.resize();</script>';
//    }
//    
   
    
    
   
    
    
    
    
    
    //echo'<script>$.colorbox.close();</script>';
    
    
  
    
    
    
    
}else{
    $SW->Template->load('core/views/v_forms/v_signup.php');  
}