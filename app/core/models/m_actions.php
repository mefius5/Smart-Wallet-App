<?php

    class Actions{
        
         function __construct(){
        }
        
    // ADD PAGE  
        
         function loadRecords($user_id){
             global $SW;
             
              if($stmt = $SW->Database->prepare("
              SELECT * 
              FROM operations 
              WHERE user_id = ? 
              ORDER BY id 
              DESC LIMIT 10")){
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                  
                if($result->num_rows >0){
                    while($row = $result->fetch_array(MYSQL_ASSOC)){
                        $record_id = $row['id'];
                        $category = $row['category'];
                        $amount = $row['amount'];
                        $date = $row['date'];
                        $profit_expense = $row['profit_expense'];

                        echo "<div id='$record_id' class='record-header record-$profit_expense' onclick='editRecord(this)' data-target='#deleteModal' data-toggle='modal'data-backdrop='static' data-keyboard='false'>
                                <div class='record record-content'>$category</div>
                                <div class='record record-amount'>$amount</div>
                                <div class='record record-date '>$date</div>
                              </div>"; 
                    }
                    
                }
                else{
                    echo '<div class="alert alert-warning">You have not created any notes yet!</div>'; 
                }
            }
         }
        
        function addRecord($user_id, $profit_expense, $category, $amount, $date){
            global $SW;
            if($stmt = $SW->Database->prepare("
            INSERT INTO operations (user_id, profit_expense, category, amount, date) 
            VALUES (?, ?, ?, ?, ?)")){
                $stmt->bind_param('issds', $user_id, $profit_expense, $category, $amount, $date);
                $stmt->execute();
                $stmt->store_result();
                $stmt->close();
            }
        }
        
        function deleteRecord($record_id){
            global $SW;
            if($stmt = $SW->Database->prepare("
            DELETE 
            FROM operations 
            WHERE id = ?")){
                $stmt->bind_param('i', $record_id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->close();
            }
                
        }
        
        function loadsum($user_id, $profit_expense){
             global $SW;
            if($stmt = $SW->Database->prepare("
            SELECT SUM(amount) 
            FROM operations 
            WHERE user_id = ? 
            AND profit_expense = ?")){
                $stmt->bind_param('is', $user_id, $profit_expense);
                $stmt->execute();
                $result=$stmt->get_result();
                
                while($row = $result->fetch_array(MYSQL_ASSOC)){
                    return $row['SUM(amount)'];
                }
            }
        }
        
        
        
        
        
// Summary PAGE
        
        function loadMonthSummary($user_id, $profit_expense){
            global $SW;
            if($stmt = $SW->Database->prepare("
            SELECT category, SUM(amount) AS amount 
            FROM operations 
            WHERE user_id = ? 
            AND profit_expense = ? 
            AND MONTH(date) = MONTH(CURRENT_DATE()) 
            AND YEAR(date) = YEAR(CURRENT_DATE()) 
            GROUP BY category
            ORDER BY amount DESC")){
                $stmt->bind_param('is', $user_id, $profit_expense);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_array(MYSQL_ASSOC)){
                    
                     $category = $row['category'];
                     $amount = $row['amount'];
                    
                    echo "<div class = ' row month-record-summary record-header record-$profit_expense'>
                            
                            <div class='row'>
                                <div class = 'record record-summary pull-left'>$category</div>
                                <div class = 'record record-summary pull-right'>$amount</div>
                            </div>
                    
                        </div>";
                    
                }
                
            }
        }
        
        function loadMonthBalance($user_id, $profit_expense){
            global $SW;
            if($stmt = $SW->Database->prepare("
            SELECT SUM(amount) AS amount
            FROM operations
            WHERE user_id = ?
            AND profit_expense = ?
            AND MONTH(date) = MONTH(CURRENT_DATE()) 
            AND YEAR(date) = YEAR(CURRENT_DATE()) ")){
                $stmt->bind_param('is', $user_id, $profit_expense);
                $stmt->execute();
                $result = $stmt->get_result();
                
                while($row = $result->fetch_array(MYSQL_ASSOC)){
        
                    $amount = $row['amount'];
                    echo $amount; 
                }
            }
        }
        
// My Profile PAGE
        
        function updateUsername($username, $user_id){
            global $SW;
            if($stmt = $SW->Database->prepare("
            UPDATE users
            SET username = ?
            WHERE user_id = ?")){
                $stmt->bind_param('si', $$username, $user_id);
                $stmt->execute();
                $resut = $stmt->get_result();
                
                while($row = $result->fetch_array(MYSQL_ASSOC)){
                    echo $row['username'];
                }
            }
        }     
                
        function getAccountSettings($user_id){
            global $SW;
            
            if($stmt = $SW->Database->prepare("
            SELECT *
            FROM users
            WHERE user_id = ?")){
                $stmt->bind_param('i', $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if($result->num_rows==1){
                    while($row = $result->fetch_array(MYSQL_ASSOC)){
                        return $row['username'];
                        return $row['email'];
                    }
                }
            }
        }
        
        function updatePassword($password, $user_id){
            global $SW;
            if($stmt = $SW->Database->prepare("
            UPDATE users 
            SET password = ? 
            WHERE user_id = ?")){
                $stmt->bind_param('si', $password, $user_id);
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
        }
        
         function updateEmail($email, $user_id){
            global $SW;
            if($stmt = $SW->Database->prepare("
            UPDATE users 
            SET email = ? 
            WHERE user_id = ?")){
                $stmt->bind_param('si', $email, $user_id);
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
        }
        
        function findRecord($user_id, $profit_expense, $category, $date){
            global $SW;
            if($stmt = $SW->Database->prepare("
            SELECT *
            FROM operations
            WHERE user_id = ?
            AND profit_expense = ?
            AND category = ?
            AND date = ?
            ORDER BY amount DESC")){
                $stmt->bind_param('isss', $user_id, $profit_expense, $category, $date);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if($result->num_rows > 0){
                    
                    while($row = $result->fetch_array(MYSQL_ASSOC)){
                        $record_id = $row['id'];
                        $category = $row['category'];
                        $amount = $row['amount'];
                        $date = $row['date'];

                        echo "<div id='$record_id' class='record-header record-find record-$profit_expense' onclick='editRecord(this)' data-target='#deleteModal' data-toggle='modal'data-backdrop='static' data-keyboard='false'>
                            <div class='record record-content'>$category</div>
                            <div class='record record-amount'>$amount</div>
                            <div class='record record-date '>$date</div>
                          </div>"; 
                    }
                }else{
                    echo '<div class="alert alert-danger alert-find-record">There is no record on this date!</div>';
                }
                
                
                
                
            }
        }
        
        function sendMessage($email, $message){
            global $SW;
            if($stmt = $SW->Database->prepare("
            INSERT INTO messages (email, message)
            VALUES (?, ?)")){
                $stmt->bind_param('ss', $email, $message);
                $stmt->execute();
                $stmt->store_result();
                $stmt->close();
            }
        }
        
        
        
        
        
        
    }
        
        
            
        
    

?>