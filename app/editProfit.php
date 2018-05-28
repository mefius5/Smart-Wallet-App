<?php

include("init.php");

if(isset($_POST['submit'])){
    
    $SW->Template->setData('record_id', $_POST['id']);
    
    $SW->Template->setAlert('error', 'danger');
    $SW->Template->load('core/views/v_forms/v_editProfit.php'); 
    echo'<script>$.colorbox.resize();</script>';
    
    
}else{
    $SW->Template->load('core/views/v_forms/v_editProfit.php');  
}
