<?php
include ("init.php");

if(isset($_POST['date'])){
    
    $SW->Template->setData('select_profit_expense', $_POST['select-profit-expense']);
    $SW->Template->setData('profit_category', $_POST['select-profit-category']);
    $SW->Template->setData('expense_category', $_POST['select-expense-category']);
    $SW->Template->setData('date', $_POST['date']);
    
    $SW->Template->setData('user_id', $_SESSION['user_id']);
    
    
    
    if($SW->Template->getData('select_profit_expense') == 'profit'){
         if($SW->Template->validateDate($SW->Template->getData('date'), 'Y-m-d') == FALSE){
            echo '<div class="alert alert-danger alert-find-record">Invalid date format!</div>';
        }else{
            $select_profit_expense = 'profit'; 
            $profit_expense = filter_var($select_profit_expense, FILTER_SANITIZE_STRING);
            $profitCategory = filter_var($SW->Template->getData('profit_category'), FILTER_SANITIZE_STRING);
            $date = $SW->Template->getData('date');
             
            $profit_expense = $SW->Auth->prepareVariables($profit_expense);
            $date = $SW->Auth->prepareVariables($date);
            $profitCategory = $SW->Auth->prepareVariables($profitCategory);
            $user_id = $SW->Auth->prepareVariables($SW->Template->getData('user_id'));
             
             $SW->Actions->findRecord($user_id, $profit_expense, $profitCategory, $date);
            
             
         }
        
       
        
    }else{
        $select_profit_expense = 'expense';  
        $profit_expense = filter_var($select_profit_expense, FILTER_SANITIZE_STRING);
        $expenseCategory = filter_var($SW->Template->getData('expense_category'), FILTER_SANITIZE_STRING);
    }
    
    
    
  

    
    
}