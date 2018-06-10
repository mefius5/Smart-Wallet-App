<?php
include ("init.php");

$SW->Template->setData('user_id', $_SESSION['user_id']);


if($SW->Actions->loadsum($SW->Template->getData('user_id'), "expense")==TRUE){
    
    $sum1 = round($SW->Actions->loadsum($SW->Template->getData('user_id'), "expense"), 2);
    

    $sum2 = round($SW->Actions->loadsum($SW->Template->getData('user_id'), "profit"), 2);
    
    $acountBalance = $sum2 - $sum1;
    if($acountBalance>=0){
        echo "<div class='balance-amount-profit'>$acountBalance</div>";
    }else{
        echo "<div class='balance-amount-expense'>$acountBalance</div>";
    }
    
    
}












?>