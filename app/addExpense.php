<?php

include("init.php");

if(isset($_POST['amount'])){
    
    $SW->Template->setData('amount', $_POST['amount']);
    $SW->Template->setData('expenseCategory', $_POST['expenseCategory']);
    $SW->Template->setData('user_id', $_SESSION['user_id']);
    
    $errors='';
    $warnings='';
    
    if($SW->Template->getData('expenseCategory') == 'Choose category...'){
        $errors.= '<p>Please choose your category</p>'; 
     }else{
        $expenseCategory = filter_var($SW->Template->getData('expenseCategory'), FILTER_SANITIZE_STRING);   
     }
    
     if(empty($SW->Template->getData('amount'))){
         $errors.= '<p>Please enter amount</p>';  
      }else{
         if(!(is_numeric($SW->Template->getData('amount')))){
            $errors.= '<p>It is not a number!</p>';
         }else{
             if($SW->Template->getData('amount')>0){
                 $expenseAmount = round($SW->Template->getData('amount'), 2);
                 $expenseAmount = filter_var($expenseAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
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
        $SW->Template->load('core/views/v_forms/v_addExpense.php'); 
        echo'<script>$.colorbox.resize();</script>';
        exit;
    }
    
    $profit_expense = "expense";
    $date = date('Y-m-d');
    
    $profit_expense = $SW->Auth->prepareVariables($profit_expense);
    $date = $SW->Auth->prepareVariables($date);
    $expenseCategory = $SW->Auth->prepareVariables($expenseCategory);
    $expenseAmount = $SW->Auth->prepareVariables($expenseAmount);
    $user_id = $SW->Auth->prepareVariables($SW->Template->getData('user_id'));
    
    
    if($SW->Actions->addRecord($user_id, $profit_expense, $expenseCategory, $expenseAmount, $date) == TRUE){
        $SW->Template->setAlert("There was an issue inserting the new record in the database!", 'danger');
        
        $SW->Template->load('core/views/v_forms/v_addExpense.php'); 
        echo'<script>$.colorbox.resize();</script>';
    }else{

        
        echo'<script>
            $.colorbox.close();
            window.location.href = "http://localhost/SMART_WALLET_APP/app/core/views/v_pages/v_users.php";
        </script>';
    }
    
}else{
    $SW->Template->load('core/views/v_forms/v_addExpense.php');  
}
