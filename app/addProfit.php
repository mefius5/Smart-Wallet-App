<?php

include("init.php");

if(isset($_POST['amount'])){
    
    $SW->Template->setData('amount', $_POST['amount']);
    $SW->Template->setData('profitCategory', $_POST['profitCategory']);
    $SW->Template->setData('user_id', $_SESSION['user_id']);
    
    $errors='';
    $warnings='';
    
    if($SW->Template->getData('profitCategory') == 'Choose category...'){
        $errors.= '<p>Please choose your category</p>'; 
     }else{
        $profitCategory = filter_var($SW->Template->getData('profitCategory'), FILTER_SANITIZE_STRING);   
     }
    
     if(empty($SW->Template->getData('amount'))){
         $errors.= '<p>Please enter amount</p>';  
      }else{
         if(!(is_numeric($SW->Template->getData('amount')))){
            $errors.= '<p>It is not a number!</p>';
         }else{
             if($SW->Template->getData('amount')>0){
                 $profitAmount = round($SW->Template->getData('amount'), 2);
                 $profitAmount = filter_var($profitAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
             }
             else{
                 $warnings.= '<p>Amount must be greater than 0</p>';
             }
             
         }
      }
    
    if(($errors!='') || ($warnings!='')){
        if($errors!=''){
            $SW->Template->setAlert($errors, 'danger');
        }
        
        if($warnings!=''){
            $SW->Template->setAlert($warnings, 'warning');
        }
        $SW->Template->load('core/views/v_forms/v_addProfit.php'); 
        echo'<script>$.colorbox.resize();</script>';
        exit;
    }
    
    $profit_expense = "profit";
    $date = date('Y-m-d');
    
    $profit_expense = $SW->Auth->prepareVariables($profit_expense);
    $date = $SW->Auth->prepareVariables($date);
    $profitCategory = $SW->Auth->prepareVariables($profitCategory);
    $profitAmount = $SW->Auth->prepareVariables($profitAmount);
    $user_id = $SW->Auth->prepareVariables($SW->Template->getData('user_id'));
    
    
    if($SW->Actions->addRecord($user_id, $profit_expense, $profitCategory, $profitAmount, $date) == TRUE){
        $SW->Template->setAlert("There was an issue inserting the new record in the database!", 'danger');
        
        $SW->Template->load('core/views/v_forms/v_addProfit.php'); 
        echo'<script>$.colorbox.resize();</script>';
    }else{

        echo'<script>
            $.colorbox.close();
            window.location.href = "http://localhost/SMART_WALLET_APP/app/core/views/v_pages/v_users.php";
        </script>';
    }
    
}else{
    $SW->Template->load('core/views/v_forms/v_addProfit.php');  
}
