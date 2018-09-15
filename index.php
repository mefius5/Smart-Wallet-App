<?php include ("app/init.php") ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Wallet</title>
    
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="app/other/css/wallet2.css">
    
   <script
   src="http://code.jquery.com/jquery-2.2.4.min.js"
   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
   crossorigin="anonymous"></script>

   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


    <?php $SW->head();?>

</head>
<body>
 
 <nav class="navbar navbar-inverse">
  <div class="container">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Smart Wallet</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a  href="#"><i class="fas fa-home fa-lg"></i></a></li>
        <li><a href="app/core/views/v_pages/v_about.php"><i class="fas fa-question-circle fa-lg"></i></a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        
        <li><?php $SW->signup_link();?></li>
        <li><?php $SW->login_link();?></li>
       
      </ul>
    </div>
  </div>
</nav>
  
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
             <div id="content">
                  <h1>Smart Wallet</h1>
                  <hr>
                  <h3>Take Control Of Your Money</h3>
                  
                  
                  
             </div>
             
          </div>
      </div>
  </div>
  
</body>
</html>