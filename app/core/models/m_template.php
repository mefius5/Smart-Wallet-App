<?php

class Template {
    
    private $data;
    private $alertTypes;
    
    function __construct(){
        
    }
    
    function load($url){
        include($url);
    }

    function redirect($url){
        header("Location: $url");
    }
    
    function setData($name, $value){
        $this->data[$name] = htmlentities($value, ENT_QUOTES);
    }
    
    function setAlertTypes($types){
        $this->setAlertTypes = $types;
    }
    
    function setAlert($value, $type = null){
        if($type == ''){
            $type = $this->alertTypes[0];
        }
        $_SESSION[$type][] = $value;
    }
    
    function getAlerts(){
        $data = '';
        foreach($this->setAlertTypes as $alert){
            if(isset($_SESSION[$alert])){
                foreach($_SESSION[$alert] as $value){
                    $data .= '<ul class = "alert alert-' . $alert . '">' . $value . '</ul>';
                }
                unset($_SESSION[$alert]);
            }
        }
        return $data;
    }
    
    function getData ($name){
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
        else{
            return '';
        }
    }
    
    function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    
}