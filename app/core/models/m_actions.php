<?php

    class Actions{
        
         function __construct(){
        }
        
         function loadRecords($user_id){
             global $SW;
             
              if($stmt = $SW->Database->prepare("SELECT * FROM operations WHERE     user_id = ? ORDER BY id DESC LIMIT 10")){
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
    }
        
        
            
        
    

?>
