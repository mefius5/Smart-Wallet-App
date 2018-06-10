<?php

class SW_Core {
    
    public $Template, $Auth, $Database, $Actions;
    
    function __construct($server, $user, $pass, $db_name){
        $this->Database = new mysqli($server, $user, $pass, $db_name);
        //$this->Database->set_charset('utf8');
        
//        template object
        include(APP_PATH . "core/models/m_template.php");
        $this->Template = new Template();
        $this->Template->setAlertTypes(array('success' , 'warning' , 'danger'));
        
//        Authorization object
        include(APP_PATH . "core/models/m_auth.php");
        $this->Auth = new Auth();
        
//        Action object
        include(APP_PATH . "core/models/m_actions.php");
        $this->Actions = new Actions();
        
        session_start();
    }
    
    function __destruct(){
        $this->Database->close();
    }
    
    function head(){
//        if($this->Auth->checkLoginStatus()){
//            include (APP_PATH . "core/templates/t_head.php");
//        }
        if(isset($_GET['login'])){
            include (APP_PATH . "core/templates/t_login.php");
        }
        
        if(isset($_GET['signup'])){
            include (APP_PATH . "core/templates/t_signup.php");
        }
        
        if(isset($_GET['logout'])){
            $this->Auth->logout();
            $this->Template->redirect(SITE_PATH);
        }
        
        if(isset($_GET['addProfit'])){
            include (APP_PATH . "core/templates/t_addProfit.php");
        }
        
        if(isset($_GET['addExpense'])){
            include (APP_PATH . "core/templates/t_addExpense.php");
        }
        
        if(isset($_GET['editprofit'])){
            include (APP_PATH . "core/templates/t_editProfit.php");
        }
    }
    
    
    function login_link(){
             echo "<a href='?login'>Login <i class='fa fa-user'></i></a>"; 
         }
    
    function logout_link(){
             echo "<a href='?logout'>Logout <i class='fas fa-power-off'></i></a>"; 
         }
    
     function signup_link(){
        
            echo "<a href='?signup'>Signup <i class='fa fa-user-plus'></i></a>";
    }
    
     function addProfit_link(){
        echo "<a href='?addProfit'><button id='addProfit' class='btn btn-success btn-lg'><i class='fas fa-plus-circle'></i> Add Profit </button></a>";
    }
    
    function addExpense_link(){
        echo "<a href='?addExpense'><button id='addExpense' class='btn btn-danger btn-lg pull-right'><i class='fas fa-minus-circle'></i> Add Expense </button></a>";
    }
}


?>