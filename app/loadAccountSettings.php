<?php

$SW->Template->setData('user_id', $_SESSION['user_id']);


 if($stmt = $SW->Database->prepare("
    SELECT username, email
    FROM users
    WHERE user_id = ?")){
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows ==1){
            while($row = $result->fetch_array(MYSQL_ASSOC)){
                $username = $row['username'];
                $email = $row['email'];
                $_SESSION['email'] = $email;
            }
        }else{
            echo "There was an error retrieving the username and email from the database";
        }
    }



?>