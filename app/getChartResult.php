<?php

$SW->Template->setData('user_id', $_SESSION['user_id']);

if($stmt = $SW->Database->prepare("
SELECT profit_expense, SUM(amount) AS amount
FROM operations
WHERE user_id = ?
AND MONTH(date) = MONTH(CURRENT_DATE()) 
AND YEAR(date) = YEAR(CURRENT_DATE()) 
GROUP BY profit_expense")){
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
}