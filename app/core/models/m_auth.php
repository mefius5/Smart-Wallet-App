<?php

class Auth{
    
    function __construct(){
        
    }
    
    function validateLogin($user, $password){
        global $SW;
        
        
        if($stmt = $SW->Database->prepare("
        SELECT * 
        FROM users 
        WHERE username = ? 
        AND password = ?")){
            $stmt->bind_param("ss", $user, $password);
            $stmt->execute();
            $stmt->store_result();
            
            if($stmt->num_rows == 1){
                $stmt->close();
                return TRUE;
            }
            else{
                $stmt->close();
                return FALSE;
            }
        }
        else{
            die();
        }
        
    }
    
    function saveRow($username, $password, $column){
        
        global $SW; 
        if($stmt = $SW->Database->prepare("
        SELECT * 
        FROM users 
        WHERE username = ? 
        AND password = ?")){
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $row = $result->fetch_array(MYSQL_ASSOC);
            
            if($result->num_rows !==1){
                echo '<div class="alert alert-danger">Wrong username or Password</div>';
            }else{
                return $row[$column];
            }
            
            
        }
    }
    
    
    
    function checkExistingUsername($username){
        global $SW;
        if($stmt = $SW->Database->prepare("
        SELECT * 
        FROM users 
        WHERE username = ?")){
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
        
            if($stmt->num_rows > 0){
                $stmt->close();
                return FALSE;
            }
            else{
                $stmt->close();
                return TRUE;
            }
        }else{
            die();
        }
        
    }
    
     function checkExistingEmail($email){
        global $SW;
        if($stmt = $SW->Database->prepare("
        SELECT * 
        FROM users 
        WHERE email = ?")){
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
        
            if($stmt->num_rows > 0){
                $stmt->close();
                return FALSE;
            }
            else{
                $stmt->close();
                return TRUE;
            }
        }else{
            die();
        }
        
    }
    
    function prepareVariables ($variable){
        global $SW;
        return $SW->Database->real_escape_string($variable);
        
    }
    
    function addUser($username, $email, $password){
        global $SW;
         if($stmt = $SW->Database->prepare("
         INSERT INTO users (username, email, password) 
         VALUES (?, ?, ?)")){
            $stmt->bind_param('sss', $username, $email, $password);
            $stmt->execute();
            $stmt->store_result();
             if($stmt->num_rows > 0){
                 $stmt->close();
                 return FALSE;
             }else{
                 $stmt->close();
                 return TRUE;
             }
         }else{
             die();
         }
    }     
    
    function checkLoginStatus(){
        if(isset($_SESSION['loggedin'])){
            return TRUE;
        }
        else{
            return FALSE;
        }
        
    }
    
    function logout(){
        session_destroy();
        session_start();
    }
    
}