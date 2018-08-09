<?php

    class Actions{
        
         function __construct(){
        }
        
    // ADD PAGE  
        
         function loadRecords($user_id){
             global $SW;
             
              if($stmt = $SW->Database->prepare("SELECT * FROM operations WHERE user_id = ? ORDER BY id DESC LIMIT 10")){
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->store_result();
                  
                if($stmt->num_rows >0){
                    $stmt->close();
                    return TRUE;
                }
                else{
                    $stmt->close();
                    return FALSE;
                }
            }
         }
        
        function showRecords($user_id){
            
            global $SW;
            
            $sql="SELECT * FROM operations WHERE user_id ='$user_id' ORDER BY id DESC LIMIT 10";
            $result = $SW->Database->query($sql);
                    
            while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
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
        
        function addRecord($user_id, $profit_expense, $category, $amount, $date){
            global $SW;
            if($stmt = $SW->Database->prepare("INSERT INTO operations (user_id, profit_expense, category, amount, date) VALUES (?, ?, ?, ?, ?)")){
                $stmt->bind_param('issds', $user_id, $profit_expense, $category, $amount, $date);
                $stmt->execute();
                $stmt->store_result();
                $stmt->close();
            }
        }
        
        function deleteRecord($record_id){
            global $SW;
            if($stmt = $SW->Database->prepare("DELETE FROM operations WHERE id = ?")){
                $stmt->bind_param('i', $record_id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->close();
            }
                
        }
        
        function loadsum($user_id, $profit_expense){
             global $SW;
            $sql="SELECT SUM(amount) FROM operations WHERE user_id='$user_id' AND profit_expense='$profit_expense'";
            
            $result = $SW->Database->query($sql);
            
            while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
                
                    return $row['SUM(amount)'];
                
                
                
            }
        }
        
        
        
        
        
// Summary PAGE
        
        function loadMonthSummary($user_id, $profit_expense){
            global $SW;
            if($stmt = $SW->Database->prepare("
            SELECT category, SUM(amount) AS amount 
            FROM operations 
            WHERE user_id = ? 
            AND profit_expense =? 
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
                    
                    echo "<div class = ' row record-header record-$profit_expense'>
                            
                            <div class='row'>
                                <div class = 'record pull-left'>$category</div>
                                <div class = 'record pull-right'>$amount</div>
                            </div>
                    
                        </div>";
                    
                }
                
            }
        }
        
        
        
        
        
// My Profile PAGE
        
        
        function updateUsername($username, $user_id){
            global $SW;
           $sql = "UPDATE users SET username='$username' WHERE user_id='$user_id'";
            
            $result = $SW->Database->query($sql);
            
            if(!$result){
                echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}
            }
        
        
        
        
                
        function getAccountSettings($user_id){
            global $SW;
                
                $sql = "SELECT * FROM users WHERE user_id='$user_id'";
                $result = $SW->Database->query($sql);

                $count = mysqli_num_rows($result);

                if($count == 1){
                    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
                    return $row['username'];
                    return $row['email']; 
                 }else{
                        echo "There was an error retrieving the username and email from the database";   
                    }
            
        }
        
        function updatePassword($password, $user_id){
            global $SW;
            if($stmt = $SW->Database->prepare("UPDATE users SET password = ? WHERE user_id = ?")){
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
            if($stmt = $SW->Database->prepare("UPDATE users SET email = ? WHERE user_id = ?")){
                $stmt->bind_param('ss', $email, $user_id);
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
        
        
        
        
        
        
    }
        
        
            
        
    

?>