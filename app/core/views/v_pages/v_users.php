<script src="../../../other/javascript/getRecordId.js"></script>

<?php include ("../../../init.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>

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
                    <li class="active"><a href="#"><i class="fas fa-plus-circle fa-lg"></i> <i class="fas fa-minus-circle fa-lg"></i></a></li>
                    <li><a href="v_summary.php"><i class="fas fa-chart-pie fa-lg"></i></a></li>
                    <li><a href="v_findRecord.php"><i class="fas fa-search fa-lg"></i></a></li>
                    <li><a href="v_myProfile.php"><i class="fas fa-cogs fa-lg"></i></a></li>
                    <li><a href="v_contact.php"><i class="fas fa-envelope fa-lg"></i></a></li>
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

    <div class="container container-users">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
              
              <div class="balance-header">
                <h3>Your account balance:</h3>
              </div>
              
               <h2><div id="balance-amount" class="balance-amount" >
              </div></h2>
               
                <div class="buttons">
                    
                    <?php $SW->addProfit_link(); ?>
                    
                    <?php $SW->addExpense_link(); ?>

                </div>
                <div id="records" class="records">
                    
                </div>

            </div>


        </div>


    </div>
    
<!--    Delete form-->
   
     
        <div class="modal" id="deleteModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Are you sure to delete this record?
                  </h4>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger pull-left delete" name="delete" type="submit" data-dismiss="modal"> Delete</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      
    
    

    <script src="../../../other/javascript/loadrecords.js"></script>
</body>

</html>
