<?php

class Auth{
    
    function __construct(){
        
    }
    
    function validateLogin($user, $password){
        global $SW;
        
        
        if($stmt = $SW->Database->prepare("SELECT * FROM users WHERE username = ? AND password = ?")){
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
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($SW->Database, $sql);
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if(mysqli_num_rows($result) !== 1){
            echo '<div class="alert alert-danger">Wrong username or Password</div>';
                
        }else{
            return $row[$column]; 
        }
        
        
        
        
//        global $SW; 
//        $stmt = $SW->Database->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
//        $stmt->bind_param("ss", $username, $password);
//        
//        $row = mysqli_fetch_array($stmt, MYSQLI_ASSOC);
//        
//        return $row[$column]; 
    }
    
    
    
    function checkExistingUsername($username){
        global $SW;
        if($stmt = $SW->Database->prepare("SELECT * FROM users WHERE username = ?")){
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
        if($stmt = $SW->Database->prepare("SELECT * FROM users WHERE email = ?")){
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
         if($stmt = $SW->Database->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)")){
            $stmt->bind_param('sss', $username, $email, $password);
            $stmt->execute();
            $stmt->store_result();
            $stmt->fetch();
            $stmt->close();
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