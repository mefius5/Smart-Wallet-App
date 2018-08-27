<?php
include ("init.php");

if(isset($_POST['date'])){
    
    $SW->Template->setData('select_profit_expense', $_POST['select-profit-expense']);
    $SW->Template->setData('profit_category', $_POST['select-profit-category']);
    $SW->Template->setData('expense_category', $_POST['select-expense-category']);
    $SW->Template->setData('date', $_POST['date']);
    
    
    
}