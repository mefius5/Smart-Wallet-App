
<?php include ("../../../init.php");

$user_id = $_SESSION['user_id'];



if($stmt = $SW->Database->prepare("
SELECT email
FROM users
WHERE user_id = ?")){
    $stmt->bind_param('s', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while($row = $result->fetch_array(MYSQL_ASSOC)){
        $email = $row['email'];
        $_SESSION['email']=$email;
    }  
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Help</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
   
    <link rel="stylesheet" type="text/css" href="../../../other/css/wallet2.css">
    
   <script
   src="http://code.jquery.com/jquery-2.2.4.min.js"
   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
   crossorigin="anonymous"></script>

   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>



    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <?php $SW->head(); ?>

</head>

<body>
    
    

    <nav class="navbar navbar-inverse">
        <div class="container">
<!--             Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
               
                <a class="navbar-brand" href="#">Smart Wallet</a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="v_users.php"><i class="fas fa-plus-circle fa-lg"></i> <i class="fas fa-minus-circle fa-lg"></i></a></li>
                    <li><a href="v_summary.php"><i class="fas fa-chart-pie fa-lg"></i></a></li>
                    <li><a href="v_findRecord.php"><i class="fas fa-search fa-lg"></i></a></li>
                    <li><a href="v_myProfile.php"><i class="fas fa-cogs fa-lg"></i></a></li>
                    <li class="active"><a href="#"><i class="fas fa-question-circle fa-lg"></i></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            Logged as <b><?php echo $_SESSION['username'];?></b>
                        </a>
                    </li>
                    <li>
                        <?php $SW->logout_link(); ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-contact">
       <div class="row">
           <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
               <div class="contact-header">
                   <h2>Contact Me:</h2>
               </div>
               <div class="contact-content">
                  
                   <form action="" method="post" id="contact-message">
                       <div class="form-group">
                           
                           <textarea class="form-control" name="message" id="message" cols="30" value="" rows="10"></textarea>
                       </div>
                       
                       <div class="form-group"> 
                            <button class="btn btn-primary btn-lg send-message-form " name="send-message" id="send-message" type="submit">Send Message</button>
                        </div>
                   </form>
                   
               </div>
               
               <div id="contact-alert"></div>
               
               
           </div>
           
           
           
       </div>
        


    </div>
<script src="../../../other/javascript/sendMessage.js"></script> 
    

</body>

</html>
