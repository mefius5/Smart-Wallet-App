<script>
    var record_id;

    function editRecord(e) {
        record_id = e.id
        console.log(record_id);
    };

    //    function deleteRecord() {
    //        console.log(id);
    //    }
    //
</script>


<?php include ("../../../init.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = $SW->Database->query($sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    $username = $row['username'];
    $email = $row['email']; 
}else{
    echo "There was an error retrieving the username and email from the database";   
}
            
        

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Account</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="../../../other/css/wallet2.css">

    <script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>



    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <?php $SW->head(); ?>

</head>

<body>



    <nav class="navbar navbar-inverse">
        <div class="container">
            <!--             Brand and toggle get grouped for better mobile display -->


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
                    <li><a href="v_users.php"><i class="fas fa-plus-circle"></i> Add <i class="fas fa-minus-circle"></i></a></li>
                    <li class="active"><a href="#">Summary</a></li>
                    <li><a href="v_myProfile.php">My Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <?php echo 'Logged as ' . $username;?>
                        </a>
                    </li>
                    <li>
                        <?php $SW->logout_link(); 
                        echo date('m');?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container container-statistics">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
              
              <div class="balance-header">
                <h3>Your account balance:</h3>
              </div>
              
               <h2><div id="balance-amount" class="balance-amount" >
              </div></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-summary col-md-6 col-md-push-3 col-title">
                <h3 class="col-title">Month Balance</h3>
                
                <div class="month-balance">
                    
                </div>
            </div>
            <div class="col-summary col-md-3 col-md-pull-6 ">
                <h3 class="col-title">Month profits</h3>
                
                <div id="month-profits" class="month-profits">
                    
                </div>
            </div>
            <div class="col-summary col-md-3 col-title">
                <h3 class="col-title">Month expenses</h3>
                
                <div id="month-expenses" class="month-expenses">
                    
                </div>
            </div>
         
        </div>
    </div>
        
              

    
    

    <script src="../../../other/javascript/loadrecords.js"></script>
    <script src="../../../other/javascript/loadsummary.js"></script>
</body>

</html>
