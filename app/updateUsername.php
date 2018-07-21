<?php

include("init.php");

//$SW->Template->setData('user_id', $_SESSION['user_id']);
//$SW->Template->setData('username', $_SESSION['username']);


$id = $_SESSION['user_id'];

//Get username sent through Ajax
$username = $_POST['username'];

//Run query and update username
$sql = "UPDATE users SET username='$username' WHERE user_id='$id'";
$result = $SW->Database->query($sql);

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}

?>
